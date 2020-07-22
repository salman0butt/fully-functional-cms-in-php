<?php
require_once '../includes/db.php';
require_once 'includes/top.php';
if (!isset($_SESSION['username'])) {
	header('Location: logout.php');
}

$session_usernmae = $_SESSION['username'];

$query = "SELECT * FROM `users` WHERE `username` = '$session_usernmae'";

$run = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($run);

$image = $row['image'];
$id = $row['id'];
$date = getdate($row['date']);
$day = $date['mday'];
$month = substr($date['month'],0,3);
$year = $date['year'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$username = $row['username'];
$email = $row['email'];
$role = $row['role'];
$details = $row['details'];

?>
</head>

<body id="profile">
    <?php require_once 'includes/header.php';?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php
require_once 'includes/sidebar.php';
?>
            </div>
            <div class="col-md-9">
                <h1 class="tc"><i class="fas fa-user"></i> Profile <small>Personal Details</small></h1>
                <hr>
                <ol class="breadcrumb">
                    <li> <a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="active"><i class="fa fa-user"></i> Profile</li>
                </ol>
                <div class="row">
                    <div class="col-xs-12">
                        <center><img src="../img/<?php echo $image; ?>" alt="profile image" width="200px" class="img-circle img-thumbnail" id="profile-image">
                            <center>
                                <h2 class="text-center">Profile Details</h2>
                            </center>
                        </center>
                        <a href="edit-profile.php?edit=<?php echo $id; ?>" class="btn btn-primary pull-right">Edit Profile</a><br/><br/>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td width="20%"><b>User ID:</b></td>
                                <td width="30%"><?php echo $id; ?></td>
                                <td width="20%"><b>Signup Date:</b></td>
                                <td width="20%"><?php echo "$day $month, $year"; ?></td>
                            </tr>
                            <tr>
                                <td width="20%"><b>First Name:</b></td>
                                <td width="30%"><?php echo $first_name; ?></td>
                                <td width="20%"><b>Last Name:</b></td>
                                <td width="20%"><?php echo $last_name; ?></td>
                            </tr>
                            <tr>
                                <td width="20%"><b>Username</b></td>
                                <td width="30%"><?php echo $username; ?></td>
                                <td width="20%"><b>Email:</b></td>
                                <td width="20%"><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <td width="20%"><b>Role:</b></td>
                                <td width="30%"><?php echo $role; ?></td>
                                <td width="20%"><b></b></td>
                                <td width="20%"></td>
                            </tr>
                        </table>
                        <div class="row" style="padding-bottom: 50px">
                            <div class="col-lg-8 col-sm-12">
                                <b>Details:</b>
                                <div><?php echo $details; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'includes/footer.php';?>