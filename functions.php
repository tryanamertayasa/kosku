<?php

    $db = mysqli_connect("localhost", "root", "", "kosku");
    $db1 = mysqli_connect("localhost", "root", "", "kosku");

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
    
        mysqli_query($db, "CALL user_register('$name', '$email', '$phone', '$password')");
    
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
    
        mysqli_query($db, "CALL pemilik_register('$name', '$email', '$phone', '$password', '$address', '$regencies', '$zip_code', '$birth_date')");
    
        return mysqli_affected_rows($db);
    
        //tambahkan userbaru ke database
    }

    function createKos($data){
        global $db;
        global $db1;
        // ambil data tiap element dalam form
    
        //htmlspecialchars digunakan untuk agar tidak langsung menampilkan elemen html
        $id_pemilik_kos = $_COOKIE['id_pemilik'];
        $name = htmlspecialchars($data["kos_name"]);
        $price = htmlspecialchars($data["price"]);
        $location = htmlspecialchars($data["location"]);
        $description = htmlspecialchars($data["description"]);

        // query insert data
        $query1 = "INSERT INTO `kos` VALUES ('', '$id_pemilik_kos', '$name', '$price', '$description', '$location')";
        mysqli_query($db, $query1);
        $cariid = query("SELECT `id_kos` FROM kos WHERE `id_pemilik_kos` = '$id_pemilik_kos' ORDER BY `id_kos` DESC")[0];
        $id_kos = $cariid['id_kos'];
        //upload gambar
        $gambar = upload($id_kos);
        if (!$gambar) {
            return false;
        }
        $gambar = trim($gambar, ',');
        echo $gambar;
        $query2 = "INSERT INTO `kos_galleries` (`id_kos`, `picture`) VALUES $gambar";
        mysqli_query($db1, $query2);
        return mysqli_affected_rows($db1);
    }

    function updateKos($data){
        global $db;
        global $db1;
    
        $id_kos = $_GET["id_kos"];
        $id_pemilik_kos = $_COOKIE['id_pemilik'];
        $title = htmlspecialchars($data["kos_name"]);
        $price = htmlspecialchars($data["price"]);
        $location = htmlspecialchars($data["location"]);
        $description = htmlspecialchars($data["description"]);
    
        //cek apakah user pilih gambar
        $gambar = upload($id_kos);
        if (!$gambar) {
            return false;
        }
        $gambar = trim($gambar, ',');
    
        $query = "UPDATE `kos` SET `title`='$title',`price`=$price,`description`='$description',`id_location`=$location WHERE `id_kos`=$id_kos AND `id_pemilik_kos`=$id_pemilik_kos";
        mysqli_query($db, $query);
        $query2 = "INSERT INTO `kos_galleries` (`id_kos`, `picture`) VALUES $gambar";
        mysqli_query($db1, $query2);
        return mysqli_affected_rows($db);
    }

    function deleteKos(){
        global $db;
        $id_kos = $_GET["id_kos"];
        $id_pemilik_kos = $_COOKIE['id_pemilik'];
        mysqli_query($db, "DELETE FROM `kos` WHERE `id_kos`=$id_kos AND `id_pemilik_kos`=$id_pemilik_kos");
        return mysqli_affected_rows($db);
    }

    function updatePemilikAccount($data){
        global $db;
    
        $id_pemilik_kos = $_COOKIE['id_pemilik'];
        $name = htmlspecialchars($data["name"]);
        $email = htmlspecialchars($data["email"]);
        $phone = htmlspecialchars($data["no_hp"]);
        $address = htmlspecialchars($data["address"]);
        $regencies = htmlspecialchars($data["regencies"]);
        $zip_code = htmlspecialchars($data["zip_code"]);
        $birth_date = htmlspecialchars($data["birth_date"]);
    
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

    function upload($id_kos){
        $gambar="";
        //$arrayGambar = array_filter($_FILES['gambar']['name']);
        foreach($_FILES['gambar']['name'] as $key=>$val){
            $namaFile = $_FILES['gambar']['name'][$key];
            $sizeFile = $_FILES['gambar']['size'][$key];
            $error = $_FILES['gambar']['error'][$key];
            $tmpFile = $_FILES['gambar']['tmp_name'][$key];
            
            // Check whether file type is valid 
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
            
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            move_uploaded_file($tmpFile, 'images/kos/' . $namaFileBaru);
            $gambar .= "($id_kos,'".$namaFileBaru."'),"; 
        }
        return $gambar; 
    }

    function adminRegister($data){
        global $db;

        $name = htmlspecialchars($data["name"]);
        $email = htmlspecialchars($data["email"]);
        $password = mysqli_real_escape_string($db, $data["password"]);
    
        //cek username sudah ada apa belum
        $result = mysqli_query($db, "SELECT `email` FROM `admin` WHERE `email` = '$email'");
    
        if(mysqli_fetch_assoc($result)){
            echo "<script>
                        alert('Email telah terdaftar!!');
                  </script>";
            return false;
        }
    
        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
    
        mysqli_query($db, "INSERT INTO `admin` VALUES('','$name', '$email', '$password')");
    
        return mysqli_affected_rows($db);
    
        //tambahkan userbaru ke database
    }

    function deleteUserlist($id_user){
        global $db;
        mysqli_query($db, "DELETE FROM `user` WHERE `id_user`=$id_user");
        return mysqli_affected_rows($db);
    }
    function deletePemiliklist($id_pemilik_kos){
        global $db;
        mysqli_query($db, "DELETE FROM `pemilik_kos` WHERE `id_pemilik_kos`=$id_pemilik_kos");
        return mysqli_affected_rows($db);
    }

    function cari($keyword){
        $query = "SELECT `id_kos`, `title`, `price`, `id_location`, MAX(`picture`) AS picture FROM `kos` INNER JOIN `kos_galleries` USING (`id_kos`)  WHERE `title` LIKE '%$keyword%' OR `description` LIKE '%$keyword%' GROUP BY `id_kos`";
        return query($query);
    }
?>