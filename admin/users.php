
<?php require_once '../includes/db.php';?>
<?php require_once 'includes/top.php';?>
<?php 
if (!isset($_SESSION['username'])) {
    header('Location: logout.php');
}
else if(!isset($_SESSION['username']) && $_SESSION['role' == 'author']){
    header('Location: index.php');
}

 ?>
<?php
if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $del_check = "SELECT * FROM `users` WHERE `id` = $del_id";
    $run_del_check = mysqli_query($con, $del_check);
    if (mysqli_num_rows($run_del_check) > 0) {
        $del_query = "DELETE FROM `users` WHERE `id` = $del_id";
        if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $del_query)) {
                $msg = "Comment Has Been Deleted";
            } else {
                $error = "Comment has not been Deleted";
            }
        }
    }else {
        header('Location: index.php');
    }
}

if (isset($_POST['checkboxes'])) {
	foreach ($_POST['checkboxes'] as $user_id) {
		$bulk_option = $_POST['bulk-option'];
        if ($bulk_option == 'delete') {
            $bulk_del_query = "DELETE FROM `users` WHERE `id`= $user_id";
            mysqli_query($con, $bulk_del_query);
            
        }
        else if($bulk_option == 'author') {
            $bulk_author_query = "UPDATE `users` SET `role`='author' WHERE `id`=$user_id ";
            mysqli_query($con, $bulk_author_query);

        }
        else if($bulk_option == 'admin') {
           $bulk_admin_query = "UPDATE `users` SET `role`='admin' WHERE `id`=$user_id ";
            mysqli_query($con, $bulk_admin_query);
        }

	}
}

?>
</head>

<body class="cate">
    <?php require_once 'includes/header.php';?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php
require_once 'includes/sidebar.php';
?>
            </div>
            <div class="col-md-9">
                <h1 class="tc"><i class="fas fa-tachometer-alt"></i> Users <small>Manage Users</small></h1>
                <hr>
                <ol class="breadcrumb">
                    <li> <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="active"> <i class="fas fa-users"></i> Users</li>
                </ol>
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <select name="bulk-option" id="bulk-option" class="form-control">
                                            <option value="">Choose Option</option>
                                            <option value="admin">Change to Admin</option>
                                            <option value="author">Change to Author</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <input type="submit" class="btn btn-success" value="Apply">
                                    <a href="add-user.php" class="btn btn-primary">Add New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

if (isset($error)) {
	echo '<span class="alert alert-danger pull-right">' . $error . '</span>';
} else if (isset($msg)) {
	echo '<span class="alert alert-success pull-right">' . $msg . '</span>';
}

?>
                    <?php
$u_query = "SELECT * FROM users";
$run = mysqli_query($con, $u_query);
if (mysqli_num_rows($run) > 0) {

	?>
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectallboxes"></th>
                                <th>Sr #</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

	$user_query = "SELECT * FROM users";
	$run = mysqli_query($con, $user_query);
	if ($run) {
		while ($data = mysqli_fetch_assoc($run)) {
			$id = $data['id'];
			$date = getdate($data['date']);
			$first_name = $data['first_name'];
			$last_name = $data['last_name'];
			$username = $data['username'];
			$email = $data['email'];
			$role = $data['role'];
			$image = $data['image'];
			$day = $date['mday'];
			$month = $date['month'];
			$year = $date['year'];

			?>
                            <tr>
                                <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id; ?>"></td>
                                <td>
                                    <?php echo $id; ?>
                                </td>
                                <td>
                                    <?php echo "$day $month $year"; ?>
                                </td>
                                <td>
                                    <?php echo "$first_name $last_name"; ?>
                                </td>
                                <td>
                                    <?php echo $username; ?>
                                </td>
                                <td>
                                    <?php echo $email; ?>
                                </td>
                                <td> <img src="../img/<?php echo $image; ?>" width="40" height="40"> </td>
                                <td>**********</td>
                                <td>
                                    <?php echo ucfirst($role); ?>
                                </td>
                                <td><a href="edit-user.php?edit=<?php echo $id; ?>"><i class="fa fa-edit"></i></a></td>
                                <td><a href="users.php?del=<?php echo $id; ?>"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <?php }
	}?>
                        </tbody>
                    </table>

                <?php
} else {
	echo '<h1 class="text-center text-muted">Users does not exist</h1>';
}

?>
</form>
            </div>
        </div>
    </div>
    <?php require_once 'includes/footer.php';?>