
<?php require_once '../includes/db.php';?>
<?php require_once 'includes/top.php';?>
<?php 
if (!isset($_SESSION['username'])) {
    header('Location: logout.php');
}
$session_username = $_SESSION['username'];
 ?>
}
<?php
if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
 if ($_SESSION['role'] == 'admin') {
        $del_check = "SELECT * FROM `posts` WHERE `id` = $del_id";
        $run_del_check = mysqli_query($con, $del_check);    
 }else if($_SESSION['role'] == 'author') {
      $del_check = "SELECT * FROM `posts` WHERE `id` = '$del_id' AND `auhtor` = '$session_username'";
        $run_del_check = mysqli_query($con, $del_check); 
 }
    if (mysqli_num_rows($run_del_check) > 0) {
        $del_query = "DELETE FROM `posts` WHERE `id` = '$del_id'";
        if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $del_query)) {
                $msg = "Posts Has Been Deleted";
            } else {
                $error = "Posts has not been Deleted";
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
            $bulk_del_query = "DELETE FROM `posts` WHERE `id`= $user_id";
            mysqli_query($con, $bulk_del_query);
            
        }
        else if($bulk_option == 'publish') {
            $bulk_author_query = "UPDATE `posts` SET `status`='publish' WHERE `id`=$user_id ";
            mysqli_query($con, $bulk_author_query);

        }
        else if($bulk_option == 'draft') {
           $bulk_admin_query = "UPDATE `posts` SET `status`='draft' WHERE `id`=$user_id ";
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
                <h1 class="tc"><i class="fas fa-file"></i> Posts <small>Manage Posts</small></h1>
                <hr>
                <ol class="breadcrumb">
                    <li> <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="active"> <i class="fas fa-file"></i> Posts</li>
                </ol>
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <select name="bulk-option" id="bulk-option" class="form-control">
                                            <option value="">Choose Option</option>
                                            <option value="publish">Publish</option>
                                            <option value="draft">Draft</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-8">
                                    <input type="submit" class="btn btn-success" value="Apply">
                                    <a href="#" class="btn btn-primary">Add New</a>
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
$u_query = "SELECT * FROM posts";
$run = mysqli_query($con, $u_query);
if (mysqli_num_rows($run) > 0) {

	?>
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectallboxes"></th>
                                <th>Sr #</th>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>Categories</th>
                                <th>Views</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

	if ($_SESSION['role'] == 'admin') {
    $query = "SELECT * FROM `posts` ORDER BY `id` DESC";
    $run = mysqli_query($con, $query);
} else if ($_SESSION['role'] == 'author') {
    $query = "SELECT * FROM WHERE `author`= '$session_username' `posts` ORDER BY `id` DESC";
    $run = mysqli_query($con, $query);
}
   
	if ($run) {
		while ($data = mysqli_fetch_assoc($run)) {
		   $id = $data['id'];
            $date = getdate($data['date']);
            $title = $data['title'];
            $author = $data['author'];
            $status = $data['status'];

            $category = $data['categories'];
            $views = $data['views'];
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
                                    <?php echo $title; ?>
                                </td>
                                <td>
                                    <?php echo $author; ?>
                                </td>
                                <td> <img src="../img/<?php echo $image; ?>" width="40" height="40"> </td>
                                <td>
                                    <?php echo $category; ?>
                                </td>
                                <td>
                                    <?php echo $views; ?>
                                </td>
                                 <td><span style="color:<?php if($status == 'publish') echo 'green'; else if($status == 'draft') echo 'red'; ?>">
                                    <?php echo $status; ?>
                                    </span>
                                </td>
                                <td><a href="post.php?edit=<?php echo $id; ?>"><i class="fa fa-edit"></i></a></td>
                                <td><a href="post.php?del=<?php echo $id; ?>"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <?php }
	}?>
                        </tbody>
                    </table>

                <?php
} else {
	echo '<h1 class="text-center text-muted">Posts does not exist</h1>';
}

?>
</form>
            </div>
        </div>
    </div>
    <?php require_once 'includes/footer.php';?>