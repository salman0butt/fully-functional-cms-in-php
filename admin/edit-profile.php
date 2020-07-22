
<?php require_once '../includes/db.php';?>
<?php require_once 'includes/top.php';?>
<?php 
if (!isset($_SESSION['username'])) {
    header('Location: logout.php');
}

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $edit_query = "SELECT * FROM users WHERE id = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
    if (mysqli_num_rows($edit_query_run) > 0) {
        $edit_row = mysqli_fetch_array($edit_query_run);
          $e_first_name = $edit_row['first_name'];  
          $e_last_name = $edit_row['last_name'];  
          $e_role = $edit_row['role'];  
          $e_image = $edit_row['image'];  
          $e_details = $edit_row['details'];

    }else {
         // header('Location: index.php');
    }
    
}
else {
    header('Location: index.php');
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
                <h1 class="tc"><i class="fas fa-user"></i> Profile <small>Edit Profile</small></h1>
                <hr>
                <ol class="breadcrumb">
                    <li> <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="active"> <i class="fas fa-user"></i> Edit Profile</li>
                </ol>
                <?php
if (isset($_POST['submit'])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first-name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last-name']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $role = $_POST['role'];
    $image = $_FILES['image']['name'];
    $temp_image = $_FILES['image']['tmp_name'];
     $details = mysqli_real_escape_string($con, $_POST['details']);

if (empty($image)) {
    $image = $e_image;
}


    $salt_query = "SELECT * FROM `users` ORDER BY `id` DESC LIMIT 1";
    $salt_run = mysqli_query($con, $salt_query);
    $salt_row = mysqli_fetch_array($salt_run);
    $salt = $salt_row['salt'];
    $insert_password = crypt($password, $salt);



    if (empty($first_name) OR empty($last_name) OR empty($image)) {
        $error = "All (*) fields are required";
    }
    else {
        $update_query = "UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name', `image` = '$image', `role` = '$role', `details` = '$details'";
        if (isset($password)) {
            $update_query .= ", `password` = '$insert_password'";
        }    
        $update_query .= "WHERE `users`.`id` = $edit_id";
        if (mysqli_query($con, $update_query)) {
            $msg = "User has been updated";
            header("refresh:0 url=edit-user.php?edit=$edit_id");
            if (!empty($image)) {
            move_uploaded_file($temp_image, "../img/$image");
               
            }
        }else {
            $error = "User has not been updated";
        }
    }

}
?>
                <div class="row">
                    <div class="col-md-8">
                        <?php
if (isset($error)) {
    echo '<span class="pull-right alert alert-danger">' . $error . '</span>';
} else if (isset($msg)) {
    echo '<span class="pull-right alert alert-success">' . $msg . '</span>';
}
?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="first-name">First Name:</label>
                                <input type="text" name="first-name" class="form-control" id="first-name" placeholder="First Name" value="<?php if(isset($e_first_name)) echo $e_first_name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name:</label>
                                <input type="text" name="last-name" class="form-control" id="last-name" placeholder="Last Name" value="<?php if(isset($e_last_name)) echo $e_last_name; ?>">
                            </div>
                           
                            <div class="form-group">
                                <label for="password">password:</label>
                                <input type="text" name="password" id="password" class="form-control" placeholder="password">
                            </div>
                       
                            </div>
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <label for="image">Details:</label>
                                <textarea name="details" id="details" cols="30" rows="10" class="form-control"><?php echo $e_details; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Update User">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <?php 
                                echo "<img src='../img/$e_image' width='100%'>";
                            
                         ?>
                    </div>
                </div>
            </div>
            <?php require_once 'includes/footer.php';?>
            <!-- //TODO Start from lecture no 58 -->
        