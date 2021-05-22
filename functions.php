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
?>