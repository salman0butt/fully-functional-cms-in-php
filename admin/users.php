<?php require_once '../includes/db.php';?>
<?php require_once 'includes/top.php';?>
<?php 
    if (isset($_GET['del'])) {
        $del_id = $_GET['del'];
        $del_query = "DELETE FROM `users` WHERE `id` = $del_id";
        if (mysqli_query($con, $del_query)) {
            $msg = "User Has Been Deleted";
        }else {
            $error = "User has not been Deleted";
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
                <div class="row">
                    <div class="col-sm-8">
                        <form action="#">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <select name="" id="" class="form-control">
                                            <option value="delete">Delete</option>
                                            <option value="author">Change to author</option>
                                            <option value="admin">Change to Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <input type="submit" class="btn btn-success" value="Apply">
                                    <a href="add-user.php" class="btn btn-primary">Add New</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
<?php 

    if (isset($error)) {
        echo '<span class="alert alert-danger pull-right">'.$error.'</span>';
}else if(isset($msg)) {
 echo '<span class="alert alert-success pull-right">'.$msg.'</span>';
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
                            <th><input type="checkbox"></th>
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
                            <td><input type="checkbox"></td>
                            <td><?php echo $id; ?></td>
                            <td><?php echo "$day $month $year"; ?></td>
                            <td><?php echo "$first_name $last_name"; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $email; ?></td>
                            <td> <img src="../img/<?php echo $image; ?>" width="40" height="40"> </td>
                            <td>**********</td>
                            <td><?php echo $role; ?></td>
                            <td><a href="edit.php?edit=<?php echo $id; ?>"><i class="fa fa-edit"></i></a></td>
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
            </div>
        </div>
    </div>
<?php require_once 'includes/footer.php';?>