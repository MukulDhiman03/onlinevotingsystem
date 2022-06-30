<?php
    include("connect.php");

    $name= $_POST['name'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $address=$_POST['address'];
    $photo=$_FILES['photo']['name'];
    $tmp_name=$_FILES['photo']['tmp_name'];
    $role=$_POST['role'];


    // echo $name,"<br>";
    // echo $mobile,"<br>";
    // echo $password,"<br>";
    // echo $cpassword,"<br>";
    // echo $address,"<br>";
    // echo $photo,"<br>";
    // echo $tmp_name,"<br>";
    // echo $role,"<br>";

    if($password==$cpassword)
    {
        move_uploaded_file($tmp_name,"../userPics/$photo");
        $sql = mysqli_query($con,"INSERT INTO user(name,mobile,password,address,image,role,status,votes) VALUES ('$name ', '$mobile', '$password' ,'$address' ,'$photo' , '$role',0, 0)");
        if($sql)  
        {
            echo "<script> alert('Registration Succesfull');
            window.location='../'</script>
            ";
        } 
        else{
            echo "<script> alert('Error Occured');
            window.location='../'</script>
            ";
        }   
    }
    else
    {
        echo "<script> alert('Password Does Not match');
        window.location='../register.html'</script>
        ";
    }
?>