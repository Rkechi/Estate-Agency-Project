<?php
    //bringing in our connection file
    require_once('connection.php');
    // checking if submit button was clicked or not
    if(isset($_POST['submit'])){
        // accessing form inputs and saving variables
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $fac = isset($_POST['fac']) ? $_POST['fac'] : '';
        $twi = isset($_POST['twi']) ? $_POST['twi'] : '';
        $inst = isset($_POST['inst']) ? $_POST['inst'] : '';
        $desc = isset($_POST['desc']) ? $_POST['desc'] : '';

        // checking if any input fields are empty
        if($name == '' || $phone == '' || $email == '' || $password == '' || $fac == '' || $twi == '' || $inst == '' || $desc == '' ){
            header('location: ../register.php?error=all fields are required');
            return false;
        }

        //use the created sanitize function to cleanse form inputs
        $name = sanitize($con, $name);
        $phone = sanitize($con, $phone);
        $email = sanitize($con, $email);
        $password = sanitize($con, $password);
        $fac = sanitize($con, $fac);
        $twi = sanitize($con, $twi);
        $inst = sanitize($con, $inst);
        $desc = sanitize($con, $desc);

        // generate date
        $today = date('Y-m-d');

     // check if user has already registered with entered email address
     $sql = "SELECT * FROM agents WHERE email = '$email' OR phone '$phone' ";
     $res = mysqli_query($con, $sql);
     if(mysqli_num_rows($res) > 0){
        header('location: ../register.php?error=user with email or phone number already exists');
        return false;
     }

     // file processing maximum file upload in php is 8mb
        if(isset($_FILES['file'])){
            //allowed file extension
            $allow = array('png', 'jpeg', 'jpg', 'gif', 'heic');
            $filename = $_FILES['file']['name'];
            $fileTmp = $_FILES['file']['tmp_name'];
            $filesize = $_FILES['file']['size'];
        }else{
            header('location: ../register.php?error=unauthorized access');
            return false;
         }
        // getting the file extension to check if proper file was sent
        $fileext = explode('.', $filename);
        $fileactualext = strtolower(end($fileext));
     }else{
        header('location: ../resgister.php?error=please upload a file');
        return false;
     }

     // validations
        if($filesize < 800000){

         if(in_array($fileactualext, $allow)){
            //generate new name for picture
            $pic = uniqid('',true).'.'.$fileactualext;
            $location = 'dp/'.$pic;
            //move file to a specified location
            if(move_uploaded_file($fileTmp, $location)){
                //use password encryption function
                $password = passwordEncrypt($password);

                // save to database
                $sql2 = "INSERT INTO agents(name, phone, email, password, facebook, twitter, instagram, description, img, createddate) VALUE('$name', '$phone', '$email', '$password', '$fac', '$twi', '$inst', '$desc', '$pic', '$today')";

                $res2 = mysqli_query($con, $sql2);
                if($res2){
                    header('location: ../login.php?success=registration successful');
                    return false;
                }else{
                    header('location: ../register.php?error=error creating account');
                    return false;
                }


            }else{
                header('location: ../register.php?error=error saving file');
                return false;
            }
            
         }else{
                header('location: ../register.php?error=unsupported file format');
                return false;
            }


        }else{
            header('location: ../register.php?error=file is too large');
        return false;
    }
   
?>