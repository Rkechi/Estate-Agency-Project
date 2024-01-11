<?php
    //bringing in our connection file
    require_once('connection.php');
    // checking if submit button was clicked or not
    if(isset($_POST['submit'])){
        // accessing form inputs and saving variables
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        // checking if any input fields are empty
        if($email == '' || $password == ''){
            header('location: ../login.php?error=all fields are required');
            return false;
        }

        //use the created sanitize function to cleanse form inputs
        $email = sanitize($con, $email);
        $password = sanitize($con, $password);

        $password = passwordEncrypt($password);
     // check if user exists
     $sql = "SELECT * FROM agents WHERE email = '$email' AND password = '$password' ";
     $res = mysqli_query($con, $sql);
        if(mysqli_num_rows($res) > 0){
       
            $rows = mysqli_fetch_assoc($res);
            $id = $rows['id'];

            session_start();
            $_SESSION['id'] = $id;

            header('location: ../dashboard.php');
            return false;


        }else{
            header('location: ../login.php?error=email or password is incorrect');
            return false;
        }





    }else{
        header('location: ../register.php?error=unauthorized access');
        return false;
    }
    
    
?>