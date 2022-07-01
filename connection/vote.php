<?php
session_start();
include('connect.php');
echo 'You have Success fully voted go back to ';
$votes = $_POST['gvotes'];
$total_votes = $votes + 1;
$gid = $_POST['gid'];
$uid = $_SESSION['userdata']['id'];

$update_votes = mysqli_query($con, "UPDATE user SET votes='$total_votes' WHERE id='$gid' ");
$update_user_status = mysqli_query($con, "UPDATE user SET status=1 WHERE id='$uid' ");

if ($update_votes and $update_user_status) {
    $groups = mysqli_query($con, "SELECT * FROM user WHERE role=2");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);
    $_SESSION['userdata']['status'] = 1;
    $_SESSION['groupsdata'] = $groupsdata;
    echo '<script>
    alert("Voted Succesfull");
    window.location="../components/dashboard.php;
    </script>';
} else {
    echo '<script>
    alert("Some error occured!!");
    window.location="../components/dashboard.php;
    </script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <a href="../index.html">Home Page</a>
</body>

</html>