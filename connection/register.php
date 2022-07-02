<?php
include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$photo = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

validate($password, $name, $cpassword, $tmp_name, $role, $photo, $mobile, $address, $con);
function validate($password, $name, $cpassword, $tmp_name, $role, $photo, $mobile, $address, $con)
{
    $regexPass = "/^[a-zA-Z0-9!@#$%^&*]{6,16}$/";
    if (!preg_match($regexPass, $password)) {
        echo "<script> alert('Invalid Password');
        window.location='../'</script>
        ";
        goto outside;
    }
    $regName = "/^[a-zA-Z'' ']{6,25}$/";
    if (!preg_match($regName, $name)) {
        echo "<script> alert('The enterd name is invalid');
        window.location='../'</script>
        ";
        goto outside;
    }
    if ($password == $cpassword) {
        move_uploaded_file($tmp_name, "../userPics/$photo");
        $sql = mysqli_query($con, "INSERT INTO user(name,mobile,password,address,image,role,status,votes) VALUES ('$name ', '$mobile', '$password' ,'$address' ,'$photo' , '$role',0, 0)");
        if ($sql) {
            echo "<script> alert('Registration Succesfull');
                window.location='../'</script>
                ";
        } else {
            echo "<script> alert('Error Occured');
                window.location='../'</script>
                ";
        }
    } else {

        echo "<script> alert('Please Enter valid details');
                window.location='../'</script>
                ";
    }
    outside:
}
?>
