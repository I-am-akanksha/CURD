<?php
error_reporting(0);
    $id = $_GET['id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if($conn){
        //echo "Connection ok";
    }
    else{
        echo "Connection failed", mysqli_connect_error();
    }

    if($_POST['reg']){
        $first  = $_POST['fname'];
        $last   = $_POST['lname'];
        $pwd    = $_POST['password'];
        $cpwd   = $_POST['conpassword'];
        $gen    = $_POST['gender'];
        $mail   = $_POST['email'];
        $no     = $_POST['phone'];
        $add    = $_POST['address'];

        $check = "SELECT * FROM form where email = '$mail'";
        $res = mysqli_query($conn,$check);
        $count = mysqli_num_rows($res);
        
        if($count > 0){
            echo "<script> alert('Email already exit') </script>";
        }
        else{
            $query = "INSERT INTO form (fname,lname,password,cpassword,gender,email,phone,address) values('$first','$last','$pwd','$cpwd','$gen','$mail','$no','$add')";
            $data = mysqli_query($conn,$query);
            if($data){ 
                echo "<script> alert('Data Inserted into Database');
                        window.location = 'form.php'; 
                      </script>";
            }
            else{      
                echo "<script> alert('Failed') </script>";
            }        
        }
    }

    if($_POST['update']){
        $first  = $_POST['fname'];
        $last   = $_POST['lname'];
        $pwd    = $_POST['password'];
        $cpwd   = $_POST['conpassword'];
        $gen    = $_POST['gender'];
        $mail   = $_POST['email'];
        $no     = $_POST['phone'];
        $add    = $_POST['address'];

    
        $query = "UPDATE form set fname='$first',lname='$last',password='$pwd',cpassword='$cpwd',
                gender='$gen',email='$mail',phone='$no',address='$add' WHERE id='$id'";
        $data = mysqli_query($conn,$query);
        
        if($data){
            echo "<script>alert('Data Updated')</script>";
            ?>

            <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/form.php" />

            <?php
        }
        else{      
            echo "Failed to update";
        }        
    }
?>