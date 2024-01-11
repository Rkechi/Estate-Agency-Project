<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'estateagency';

    // Create connection
    $con = mysqli_connect($servername, $username, $password, $dbname);

    function sanitize($connectionstring, $data){
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripcslashes($data);
        $data = mysqli_real_escape_string($connectionstring, $data); //most important 

        return $data;
    }

    function passwordEncrypt($password){
        return md5($password);
    }
?>