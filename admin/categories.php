<?php require_once 'includes/top.php';
require_once '../includes/db.php';
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
} else if (!isset($_SESSION['username']) && $_SESSION['role' == 'author']) {
	header('Location: index.php');
}

if (isset($_GET['del'])) {
	$del_id = $_GET['del'];
	if (isset($_SESSION['username']) and $_SESSION['role'] == 'admin') {
		$del_query = "DELETE FROM  `categories` WHERE `id` = '$del_id'";
		if (mysqli_query($con, $del_query)) {
			$del_msg = "Category Has Been Deleted";
		} else {
			$del_error = "Category Has Not Been Deleted";
		}
	}

}

if (isset($_POST['submit'])) {
	$cat_name = mysqli_real_escape_string($con, strtolower($_POST['cat_name']));

	if (empty($cat_name)) {
		$error = "Must Fill This field";
	} else {
		$check_query = "SELECT * FROM `categories` WHERE `category` = '$cat_name'";
		$run_check = mysqli_query($con, $check_query);

		if (mysqli_num_rows($run_check) > 0) {
			$error = "Category Has Been Added";
		} else {
			$insert_query = "INSERT INTO `categories`(category) VALUES('$cat_name')";
			if (mysqli_query($con, $insert_query)) {
				$msg = "Category Has Been Added";
			} else {
				$error = "Category HAs Not Been Added";
			}
		}
	}

}
//edit id
if (isset($_GET['edit'])) {
	$edit_id = $_GET['edit'];

}
//update catgory

if (isset($_POST['update'])) {
  $up_cat_name = $_POST['up_cat_name'];
	$cat_name = mysqli_real_escape_string($con, strtolower($_POST['up_cat_name']));

	if (empty($cat_name)) {
		$error = "Must Fill This field";
	} else {
		$check_query = "SELECT * FROM `categories` WHERE `category` = '$cat_name'";
		$run_check = mysqli_query($con, $check_query);

		if (mysqli_num_rows($run_check) > 0) {
			$up_error = "Category Has Been Updated";
		} else {
			$update_query = "UPDATE `categories` SET `category`= '$up_cat_name' WHERE `id`= $edit_id";

			if (mysqli_query($con, $update_query)) {
				$up_msg = "Category Has Been Updated";
			} else {
				$up_error = "Category Has Not Been Updated";
			}
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
                <h1 class="tc"><i class="fas fa-folder-open"></i> Categories <small>Differnt Categories</small></h1>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="active"> <i class="fas fa-folder-open"></i> Categories</li>
                </ol>
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="category">Category Name:</label>
                                <?php
if (isset($msg)) {
	echo '<span class="pull-right" style="color:green;">' . $msg . '</span>';
}
?>
                                <?php
if (isset($error)) {
	echo '<span class="pull-right" style="color:green;">' . $error . '</span>';
}
?>
                                <input type="text" placeholder="Category Name" name="cat_name" class="form-control">
                            </div>
                            <input type="submit" value="Add Category" name="submit" class="btn btn-primary">
                        </form>
                        <hr>
                        <?php
if (isset($_GET['edit'])) {
	$edit_check_query = "SELECT *  FROM `categories` WHERE `id` = $edit_id";

	$check_query_run = mysqli_query($con, $edit_check_query);

	if (mysqli_num_rows($check_query_run) > 0) {
		$data = mysqli_fetch_assoc($check_query_run);

		$up_category = $data['category'];

		?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="category">Update Category Name:</label>
                                <?php
if (isset($up_msg)) {
			echo '<span class="pull-right" style="color:green;">' . $up_msg . '</span>';
		}
		?>
                                <?php
if (isset($up_error)) {
			echo '<span class="pull-right" style="color:green;">' . $up_error . '</span>';
		}
		?>
                                <input type="text" value="<?php echo $up_category; ?>" placeholder="Category Name" name="up_cat_name" class="form-control">
                            </div>
                            <input type="submit" value="Update Category" name="update" class="btn btn-primary">
                        </form>
                        <?php
}
}
?>
                    </div>
                    <div class="col-md-6">
                        <?php
$get_query = "SELECT * FROM `categories` ORDER BY `id`";
$get_run = mysqli_query($con, $get_query);
if (mysqli_num_rows($get_run) > 0) {

	if (isset($del_msg)) {
		echo '<span class="pull-right" style="color:green;">' . $del_msg . '</span>';
	}

	if (isset($del_error)) {
		echo '<span class="pull-right" style="color:green;">' . $del_error . '</span>';
	}

	?>
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr #</th>
                                    <th>Category Name</th>
                                    <th>Posts</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
while ($get_row = mysqli_fetch_array($get_run)) {
		$cat_id = $get_row['id'];
		$cat_name = $get_row['category'];

		?>
                                <tr>
                                    <td>
                                        <?php echo $cat_id; ?>
                                    </td>
                                    <td>
                                        <?php echo ucfirst($cat_name); ?>
                                    </td>
                                    <td>12</td>
                                    <td><a href="categories.php?edit=<?php echo $cat_id; ?>"><i class="fa fa-edit"></i></a></td>
                                    <td><a href="categories.php?del=<?php echo $cat_id; ?>"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <?php
}
} else {
	echo '<center>No Category Found</center>';
}

?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><<br> <br>
    <?php require_once 'includes/footer.php';?>