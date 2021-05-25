<?php

    $db = mysqli_connect("localhost", "root", "", "kosku");

    function query($query){
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function userRegister($data){
        global $db;

        $name = htmlspecialchars($data["name"]);
        $email = htmlspecialchars($data["email"]);
        $phone = htmlspecialchars($data["phone"]);
        $password = mysqli_real_escape_string($db, $data["password"]);
    
        //cek username sudah ada apa belum
        $result = mysqli_query($db, "SELECT `email` FROM user WHERE `email` = '$email'");
    
        if(mysqli_fetch_assoc($result)){
            echo "<script>
                        alert('Email telah terdaftar!!');
                  </script>";
            return false;
        }
    
        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        mysqli_query($db, "INSERT INTO user VALUES('','$name', '$email', '$phone', '$password')");
    
        return mysqli_affected_rows($db);
    
        //tambahkan userbaru ke database
    }

    function pemilikRegister($data){
        global $db;

        $name = htmlspecialchars($data["name"]);
        $email = htmlspecialchars($data["email"]);
        $phone = htmlspecialchars($data["phone"]);
        $password = mysqli_real_escape_string($db, $data["password"]);
        $address = htmlspecialchars($data["address"]);
        $regencies = htmlspecialchars($data["regencies"]);
        $zip_code = htmlspecialchars($data["zip_code"]);
        $birth_date = htmlspecialchars($data["birth_date"]);
    
        //cek username sudah ada apa belum
        $result = mysqli_query($db, "SELECT `email` FROM `pemilik_kos` WHERE `email` = '$email'");
    
        if(mysqli_fetch_assoc($result)){
            echo "<script>
                        alert('Email telah terdaftar!!');
                  </script>";
            return false;
        }
    
        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        mysqli_query($db, "INSERT INTO `pemilik_kos` VALUES('','$name', '$email', '$phone', '$password', '$address', '$regencies', '$zip_code', '$birth_date')");
    
        return mysqli_affected_rows($db);
    
        //tambahkan userbaru ke database
    }

    function createKos($data){
        global $db;
        // ambil data tiap element dalam form
    
        //htmlspecialchars digunakan untuk agar tidak langsung menampilkan elemen html
        $id_pemilik_kos = $_COOKIE['id'];
        $name = htmlspecialchars($data["kos_name"]);
        $price = htmlspecialchars($data["price"]);
        $location = htmlspecialchars($data["location"]);
        $description = htmlspecialchars($data["description"]);
    
        //upload gambar
        //$gambar = upload();
        //if (!$gambar) {
        //    return false;
        //}
    
        // query insert data
        $query = "INSERT INTO `kos` VALUES ('', '$id_pemilik_kos', '$name', '$price', '$description', '$location')";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function updateKos($data){
        global $db;
    
        $id_kos = $_GET["id_kos"];
        $id_pemilik_kos = $_COOKIE['id'];
        $title = htmlspecialchars($data["kos_name"]);
        $price = htmlspecialchars($data["price"]);
        $location = htmlspecialchars($data["location"]);
        $description = htmlspecialchars($data["description"]);
    
        //cek apakah user pilih gambar baru atau tidak
        //if ($_FILES['gambar']['error'] === 4) {
        //    $gambar = $gambarLama;
        //}else {
        //    $gambar = upload();
        //}
    
        $query = "UPDATE `kos` SET `title`='$title',`price`=$price,`desription`='$description',`id_location`=$location WHERE `id_kos`=$id_kos AND `id_pemilik_kos`=$id_pemilik_kos";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }
?>