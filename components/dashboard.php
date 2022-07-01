<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location: ../");
}
$userdata = $_SESSION['userdata'];
$partiesdata = $_SESSION['partiesdata'];
if ($_SESSION['userdata']['status'] == 0) {
    $status = '<b style="color:red">Not Voted</b>';
} else {
    $status = '<b style="color:green">Voted</b>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System | Dashboard</title>
    <link rel="stylesheet" href="../bootsrrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/dashboard.css">
    <style>
        #voted{
            color: black;
            background-color: green;
        }
    </style>
</head>

<body>
    <div class="sticky-top text-center bg-dark text-white" id="nav-head">
        Online Voting System
    </div>
    <hr>
    <hr>
    <div class="container-fluid mt-3 p-5" style="height:80vh;">
        <div class="row justify-content-end">
            <div class="col-5" id="profile">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../userPics/<?php echo $userdata['image'] ?>">
                    <div class="card-body">
                        <!-- <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Name: <b><?php echo $userdata['name'] ?></b></li>
                        <li class="list-group-item">Mobile: <b><?php echo $userdata['mobile'] ?></b></li>
                        <li class="list-group-item">Address: <b><?php echo $userdata['address'] ?></b></li>
                        <li class="list-group-item">Status: <b><?php echo $status ?></b></li>
                    </ul>
                    <!-- <div class="card-body">
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div> -->
                </div>
            </div>
            <div class="col-5" id="group">
                <?php
                if ($_SESSION['partiesdata']) {
                    for ($i = 0; $i < count($partiesdata); $i++) {
                ?>
                        <div>
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="../userPics/<?php echo $partiesdata[$i]['image'] ?>">
                                <div class="card-body">
                                    <!-- <h5 class="card-title">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Group name: <b><?php echo $partiesdata[$i]['name'] ?></b></li>
                                    <li class="list-group-item">Votes: <b><?php echo $partiesdata[$i]['votes'] ?></b></li>
                                </ul>
                                <form action="../connection/vote.php" method="post">
                                    <input type="hidden" name="gvotes" value="<?php echo $partiesdata[$i]['votes'] ?>">
                                    <input type="hidden" name="gid" value="<?php echo $partiesdata[$i]['id'] ?>">
                                    <?php
                                        if($_SESSION['userdata']['status']==0)
                                        {
                                            ?>
                                            <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <div class="text-center">
                                            <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
                                            </div>
                                            <?php
                                        }
                                    ?>
                                </form>
                                <hr>
                            </div>
                        </div>
                <?php
                    }
                } else {
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="row justify-content-between">
            <div class="col-1">
                <a href="../"><button class="btn btn-primary ">Back</button></a>
            </div>
            <div class="col-1">
                <a href="logout.php"><button type="submit" class="btn btn-primary ">Log Out</button></a>
            </div>
        </div>
    </div>
    <script src="../bootsrrap/js/bootstrap.min.js"></script>

</body>

</html>