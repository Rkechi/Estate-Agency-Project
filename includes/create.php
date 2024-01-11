<?php
    //bringing in our connection file
    require_once('connection.php');
    // checking if submit button was clicked or not
    if(isset($_POST['submit'])){
        // accessing form inputs and saving variables
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $location = isset($_POST['location']) ? $_POST['location'] : '';
        $type = isset($_POST['type']) ? $_POST['type'] : '';
        $status = isset($_POST['status']) ? $_POST['status'] : '';
        $area = isset($_POST['area']) ? $_POST['area'] : '';
        $bed = isset($_POST['bed']) ? $_POST['bed'] : '';
        $bath = isset($_POST['bath']) ? $_POST['bath'] : '';
        $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
        $garage = isset($_POST['garage']) ? $_POST['garage'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';

        $agentid = $_POST['agentid'];

        // checking if any input fields are empty
        if($name == '' || $location == '' || $type == '' || $status == '' || $area == '' || $bed == '' || $bath == '' || $desc == '' || $garage == '' ||  $price == '' ){
            header('location: ../dashboard.php?error=all fields are required');
            return false;
        }

        //use the created sanitize function to cleanse form inputs
        $name = sanitize($con, $name);
        $location = sanitize($con, $location);
        $type = sanitize($con, $type);
        $status = sanitize($con, $status);
        $area = sanitize($con, $area);
        $bed = sanitize($con, $bed);
        $bath = sanitize($con, $bath);
        $desc = sanitize($con, $desc);
        $garage = sanitize($con, $garage);
        $price = sanitize($con, $price);

        // generate date
        $today = date('Y-m-d');

     

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
            $destination = 'post/'.$pic;
            //move file to a specified destination
            if(move_uploaded_file($fileTmp, $destination)){
               

                // save to database
                $sql2 = "INSERT INTO properties(agentid, pname, plocation, ptype, pstatus, parea, pbed, pbath, pgarage, pdescription, img, pprice, createddate) VALUES('$agentid', '$name', '$location', '$type', '$status', '$area', '$bed', '$bath', '$garage', '$desc', '$pic', '$price', '$today')";

                $res2 = mysqli_query($con, $sql2);
                if($res2){
                    header('location: ../dashboard.php?success=property uploaded');
                    return false;
                }else{
                    header('location: ../dashboard.php?error=error uploading property');
                    return false;
                }


            }else{
                header('location: ../dashboard.php?error=error saving file');
                return false;
            }
            
         }else{
                header('location: ../dashboard.php?error=unsupported file format');
                return false;
            }


        }else{
            header('location: ../dashboard.php?error=file is too large');
        return false;
    }
   
?>