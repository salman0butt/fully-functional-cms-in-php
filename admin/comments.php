
<?php require_once '../includes/db.php';?>
<?php require_once 'includes/top.php';?>
<?php
if (!isset($_SESSION['username'])) {
	header('Location: logout.php');
} else if (!isset($_SESSION['username']) && $_SESSION['role' == 'author']) {
	header('Location: index.php');
}

?>
<?php
if (isset($_GET['del'])) {
	$del_id = $_GET['del'];
	$del_check = "SELECT * FROM `comments` WHERE `id` = $del_id";
	$run_del_check = mysqli_query($con, $del_check);
	if (mysqli_num_rows($run_del_check) > 0) {
		$del_query = "DELETE FROM `comments` WHERE `id` = $del_id";
		if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
			if (mysqli_query($con, $del_query)) {
				$msg = "Comment Has Been Deleted";
			} else {
				$error = "Comment has not been Deleted";
			}
		}
	} else {
		header('Location: index.php');
	}
}

//Approve comment

if (isset($_GET['approve'])) {
	$approve_id = $_GET['approve'];
	$approve_check = "SELECT * FROM `comments` WHERE `id` = $approve_id";
	$run_approve_check = mysqli_query($con, $approve_check);
	if (mysqli_num_rows($run_approve_check) > 0) {
		$approve_query = "UPDATE `comments` SET `status` = 'approved' WHERE `id` = $approve_id";

		if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
			$status = mysqli_query($con, $approve_query);

			if ($status) {
				$msg = "Comment Has Been Approved";
			} else {
				$error = "Comment has not been Approved";
			}
		}
	} else {
		header('Location: index.php');
	}
}

//UnApprove comment

if (isset($_GET['unapprove'])) {
	$unapprove_id = $_GET['unapprove'];
	$unapprove_check = "SELECT * FROM `comments` WHERE `id` = $unapprove_id";
	$run_unapprove_check = mysqli_query($con, $unapprove_check);
	if (mysqli_num_rows($run_unapprove_check) > 0) {
		$unapprove_query = "UPDATE `comments` SET `status` = 'pending' WHERE `id` = $unapprove_id";

		if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
			if (mysqli_query($con, $unapprove_query)) {
				$msg = "Comment Has Been UnApproved";
			} else {
				$error = "Comment has not been UnApproved";
			}
		}
	} else {
		header('Location: index.php');
	}
}

if (isset($_POST['checkboxes'])) {
	foreach ($_POST['checkboxes'] as $user_id) {
		$bulk_option = $_POST['bulk-option'];
		if ($bulk_option == 'delete') {
			$bulk_del_query = "DELETE FROM `comments` WHERE `id`= $user_id";
			mysqli_query($con, $bulk_del_query);

		} else if ($bulk_option == 'approve') {
			$bulk_author_query = "UPDATE `comments` SET `status`='approved' WHERE `id`=$user_id ";
			mysqli_query($con, $bulk_author_query);

		} else if ($bulk_option == 'pending') {
			$bulk_admin_query = "UPDATE `comments` SET `status`='pending' WHERE `id`=$user_id ";
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
                <h1 class="tc"><i class="fas fa-comments"></i> Comments <small>Manage Comments</small></h1>
                <hr>
                <ol class="breadcrumb">
                    <li> <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="active"> <i class="fas fa-comments"></i> Comments</li>
                </ol>
                <?php
$session_username = $_SESSION['username'];
if (isset($_GET['reply'])) {
	$reply_id = $_GET['reply'];
	$reply_check = "SELECT * FROM `comments` WHERE `post_id` = $reply_id";
	$reply_check_run = mysqli_query($con, $reply_check);
	if (mysqli_num_rows($reply_check_run) > 0) {
		if (isset($_POST['reply'])) {
			$comment_data = $_POST['comment'];
			if (empty($comment_data)) {
				$comment_error = "Must Fill This Feild";
			} else {
				$get_user_data = "SELECT * FROM `users` WHERE `username` = '$session_username'";
				$get_user_run = mysqli_query($con, $get_user_data);
				$get_user_row = mysqli_fetch_array($get_user_run);
				$date = time();
				$first_name = $get_user_row['first_name'];
				$last_name = $get_user_row['last_name'];
				$full_name = $first_name . " " . $last_name;
				$email = $get_user_row['email'];
				$image = $get_user_row['image'];
				$username = $get_user_row['username'];
				$insert_comment_query = "INSERT INTO `comments`(`date`, `name`, `username`, `post_id`, `email`, `image`, `comment`, `status`) VALUES ('$date', '$full_name', '$username', $reply_id, '$email', '$image', '$comment_data', 'pending')";
				
				if (mysqli_query($con, $insert_comment_query)) {
					$comment_msg = "Comment has been Submitted";
				} else {
					$comment_error = "Comment Has Not been Submitted";
				}

			}

		}

		?>

                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="comment">Comment:</label>
                                <?php
if (isset($comment_error)) {
			echo '<span class"pull-right" style="color:red">' . $comment_error . '</span>';
		} else if (isset($comment_msg)) {
			echo '<span class"pull-right" style="color:green">' . $comment_msg . '</span>';
		}
		?>
                                <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Your Comment here.." class="form-control"></textarea>
                            </div>
                            <input type="submit" name="reply" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                <?php
}
}
?>
<br>
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <select name="bulk-option" id="bulk-option" class="form-control">
                                            <option value="">Choose Option</option>
                                            <option value="delete">Delete</option>
                                            <option value="approve">Approve</option>
                                            <option value="pending">UnApprove</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <input type="submit" class="btn btn-success" value="Apply">

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
                                <th>Username</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Approve</th>
                                <th>UnApprove</th>
                                <th>Reply</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

	$user_query = "SELECT * FROM `comments`";
	$run = mysqli_query($con, $user_query);
	if ($run) {
		while ($data = mysqli_fetch_assoc($run)) {
			$id = $data['id'];
			$date = getdate($data['date']);
			$comment = $data['comment'];
			$status = $data['status'];
			$post_id = $data['post_id'];
			$username = $data['username'];
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
                                    <?php echo $username; ?>
                                </td>
                              <td><?php echo $comment; ?></td>
                              <td><span style="color: <?php if($status == 'approved') echo 'green'; else if($status == 'pending') echo 'red'; ?>"><?php echo ucfirst($status); ?></span></td>
                               <td><a href="comments.php?approve=<?php echo $id; ?>">Approve</a></td>
                               <td><a href="comments.php?unapprove=<?php echo $id; ?>">UnApprove</a></td>
                              <td><a href="comments.php?reply=<?php echo $post_id; ?>"><i class="fa fa-reply"></i></a></td>

                                <td><a href="comments.php?del=<?php echo $id; ?>"><i class="fa fa-trash"></i></a></td>
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