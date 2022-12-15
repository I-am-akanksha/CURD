<?php 
    include("connection.php");
    $id = $_GET['id'];
    $query = "SELECT * FROM FORM where id = '$id'";
    $data = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Details</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <table> 
        <tr>
            <td>
                <div class="back">
                    <form action="#" method="POST">
                    <div class="title">
                        Update Details 
                    </div>
                
                <div class="form">
                    <div class="field">
                        <label for="">First Name</label>
                        <input type="text" value ="<?php echo $result['fname'];?>" class="input" name="fname" required>
                    </div>
            
                    <div class="field">
                        <label for="">Last Name</label>
                        <input type="text" value ="<?php echo $result['lname'];?>" class="input" name="lname" required>
                    </div>
            
                    <div class="field">
                        <label for="">Password</label>
                        <input type="password" value ="<?php echo $result['password'];?>" class="input" name="password" required>
                    </div>
            
                    <div class="field">
                        <label for="">Confirm Password</label>
                        <input type="password" value ="<?php echo $result['password'];?>" class="input" name="conpassword" required>
                    </div>
            
                    <div class="field">
                        <label for="">Gender</label>
                        <div class="custom_select">
                        <select name="gender" required>
                            <option value="">Select</option>
                            <option value="Male" 
                                <?php 
                                    if($result['gender'] == 'Male'){
                                        echo "selected";
                                    }
                                ?>
                            >Male</option>
                            <option value="Female"
                                <?php 
                                    if($result['gender'] == 'Female'){
                                        echo "selected";
                                    }
                                ?>
                            >Female</option>
                        </select>
                        </div>
                    </div>
            
                    <div class="field">
                        <label for="">Email Address</label>
                        <input type="text" value ="<?php echo $result['email'];?>" class="input" name="email" required>
                    </div>
            
                    <div class="field">
                        <label for="">Phone Number</label>
                        <input type="text" value ="<?php echo $result['phone'];?>" class="input" name="phone" required>
                    </div>
            
                    <div class="field">
                        <label>Address</label>
                        <textarea class="textarea" name="address" required><?php echo $result['address']; ?></textarea>
                    </div>
            
                    <div class="field term">
                        <label class="check">
                            <input type="checkbox" required>
                            <span class="checkmark"></span>
                        </label>
                        <p>Agree to terms and conditions</p>
                    </div>
            
                    <div class="field">
                        <input type="submit" value="Update Details" class="btn" name="update">
                    </div>
                </div>
                </form>
                </div>
            </td>
            <td>
                <h2 align="center">Displaying All Records</h2><br>
                <table class="list" border="1px" cellspacing="7px">
                    <thead>
                        <tr>
                            <th width="10%">First Name</th>
                            <th width="10%">Last Name</th>
                            <th width="8%">Gender</th>
                            <th width="20%">Email</th>
                            <th width="10%">Phone No.</th>
                            <th width="15%">Address</th>
                            <th width="27%">Operations</th>
                        </tr>
                    </thead>
                    <?php
                        $query = "SELECT * FROM FORM";
                        $data = mysqli_query($conn,$query);
                        $total = mysqli_num_rows($data);
                        $result = mysqli_fetch_assoc($data);
                            while($result = mysqli_fetch_assoc($data)){
                                echo "<tr>
                                        <td>".$result['fname']."</td>
                                        <td>".$result['lname']."</td>
                                        <td>".$result['gender']."</td>
                                        <td>".$result['email']."</td>
                                        <td>".$result['phone']."</td>
                                        <td>".$result['address']."</td>
                                        <td><a href='update.php?id=$result[id]'><input 
                                            type='submit' value='Update' class='update'></a>
                                        <a href='delete.php?id=$result[id]'><input type='submit' 
                                            value='Delete' class='delete'></a></td>
                                    </tr>
                                    ";
                            }
                    ?>
            </table>
            </td>
        </tr>
    </table>
</body>
</html>