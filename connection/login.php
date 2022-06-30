<?php
session_start();
include("connect.php");

$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = mysqli_query($con, "SELECT * FROM user WHERE mobile='$mobile' AND password ='$password' AND role='$role'");

if (mysqli_num_rows($sql) > 0) {
    $userdata = mysqli_fetch_array($sql);
    $parties = mysqli_query($con, "SELECT * FROM user WHERE role=2 ");
    $partiesdata = mysqli_fetch_all($parties, MYSQLI_ASSOC);

    $_SESSION['userdata'] = $userdata;
    $_SESSION['partiesdata'] = $partiesdata;

    echo "<script> 
                window.location='../components/dashboard.php';
          </script>
    ";
} 
else {
    echo "<script> alert('Invalid Credentials');
        window.location='../'</script>
        ";
}
