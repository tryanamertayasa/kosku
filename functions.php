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
    
        $query = "UPDATE `kos` SET `title`='$title',`price`=$price,`description`='$description',`id_location`=$location WHERE `id_kos`=$id_kos AND `id_pemilik_kos`=$id_pemilik_kos";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function deleteKos(){
        global $db;
        $id_kos = $_GET["id_kos"];
        $id_pemilik_kos = $_COOKIE['id'];
        mysqli_query($db, "DELETE FROM `kos` WHERE `id_kos`=$id_kos AND `id_pemilik_kos`=$id_pemilik_kos");
        return mysqli_affected_rows($db);
    }

    function updatePemilikAccount($data){
        global $db;
    
        $id_pemilik_kos = $_COOKIE['id'];
        $name = htmlspecialchars($data["name"]);
        $email = htmlspecialchars($data["email"]);
        $phone = htmlspecialchars($data["no_hp"]);
        $address = htmlspecialchars($data["address"]);
        $regencies = htmlspecialchars($data["regencies"]);
        $zip_code = htmlspecialchars($data["zip_code"]);
        $birth_date = htmlspecialchars($data["birth_date"]);
    
        //cek apakah user pilih gambar baru atau tidak
        //if ($_FILES['gambar']['error'] === 4) {
        //    $gambar = $gambarLama;
        //}else {
        //    $gambar = upload();
        //}
    
        $query = "UPDATE `pemilik_kos` SET `name`='$name',`email`='$email',`no_hp`='$phone',`address`='$address',`regencies`='$regencies',`zip_code`='$zip_code',`birth_date`='$birth_date' WHERE `id_pemilik_kos`=$id_pemilik_kos";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }
    function deleteWishlist($id_wishlist){
        global $db;
        $id_user = $_COOKIE['id'];
        mysqli_query($db, "DELETE FROM `wishlist` WHERE `id_user`=$id_user AND `id_wishlist`=$id_wishlist");
        return mysqli_affected_rows($db);
    }

    function createWishlist($id_kos){
        global $db;
        $id_user = $_COOKIE['id'];
        $query = "INSERT INTO `wishlist` VALUES ('', '$id_user', '$id_kos')";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    function upload($id_picture){
        $namaFile = $_FILES['gambar']['name'];
        $sizeFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpFile = $_FILES['gambar']['tmp_name'];
    
        //cek apakah tidak ada gambar yg diupload
        if ($error === 4) {
            echo "<script>
                        alert('Masukkan Gambar Terlebih Dahulu!!');
                  </script>";
            return false;
        }
    
        //cek apakah yg diupload gambar atau bukan
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                        alert('Yang Anda Upload bukan Gambar!!');
                  </script>";
            return false;
        }
    
        //cek jika ukuran terlalu besar
        if ($sizeFile > 5000000) {
            echo "<script>
                        alert('Ukuran Gambar Terlalu Besar!!');
                  </script>";
            return false;
        }
    
        //lolos pengecekan, gambar siap diupload
        //generate nama gambar baru
        $namaFileBaru = $id_picture
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        move_uploaded_file($tmpFile, 'images/kos/' . $namaFileBaru);
        return $namaFileBaru;
    }
?>