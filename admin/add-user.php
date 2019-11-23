
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
                <h1 class="tc"><i class="fas fa-user-plus"></i> Users <small>Add Users</small></h1>
                <hr>
                <ol class="breadcrumb">
                    <li> <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="active"> <i class="fas fa-user-plus"></i> Add Users</li>
                </ol>
                <?php
if (isset($_POST['submit'])) {
    $date = time();
    $first_name = mysqli_real_escape_string($con, $_POST['first-name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last-name']);
    $username = mysqli_real_escape_string($con, strtolower($_POST['username']));
    $username_trim = preg_replace('/\s+/', '', $username);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $email = mysqli_real_escape_string($con, strtolower($_POST['email']));
    $role = $_POST['role'];
    $image = $_FILES['image']['name'];
    $temp_image = $_FILES['image']['tmp_name'];

    $check_query = "SELECT * FROM `users` WHERE `username` = '$username' OR `email` = '$email'";
    $check_run = mysqli_query($con, $check_query);

    $salt_query = "SELECT * FROM `users` ORDER BY `id` DESC LIMIT 1";
    $salt_run = mysqli_query($con, $salt_query);
    $salt_row = mysqli_fetch_array($salt_run);
    $salt = $salt_row['salt'];
    $password = crypt($password, $salt);



    if (empty($first_name) OR empty($last_name) OR empty($username) OR empty($password) OR empty($email) OR empty($image)) {
        $error = "All (*) fields are required";

    } else if ($username != $username_trim) {
        $error = "Don't use spaces in username";
    } else if (mysqli_num_rows($check_run) > 0) {
        $error = "Username or Email Already Exitst";
    } else {
        $insert_query = "INSERT INTO `users`(`date`, `first_name`, `last_name`, `username`, `email`, `image`, `password`, `role`) VALUES ('$date', '$first_name', '$last_name', '$username', '$email', '$image', '$password', '$role')";
        if (mysqli_query($con, $insert_query)) {
            $msg = "User Has been Added";
            move_uploaded_file($temp_image, "../img/$image");
            $image_check = "SELECT * FROM `users` ORDER BY `id` DESC LIMIT 1";
            $image_run = mysqli_query($con, $image_check);
            $image_row = mysqli_fetch_array($image_run);
            $check_image = $image_row['image'];

            $first_name = "";
            $last_name = "";
            $email = "";
            $username = "";

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
                                <input type="text" name="first-name" class="form-control" id="first-name" placeholder="First Name" value="<?php if(isset($first_name)) echo $first_name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name:</label>
                                <input type="text" name="last-name" class="form-control" id="last-name" placeholder="Last Name" value="<?php if(isset($last_name)) echo $last_name; ?>">
                            </div>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php if(isset($username)) echo $username; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value="<?php if(isset($email)) echo $email; ?>">
                            </div>
                            <div class="form-group">
                                <label for="password">password:</label>
                                <input type="text" name="password" id="password" class="form-control" placeholder="password">
                            </div>
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select name="role" id="role" class="form-control" value="<?php if(isset($role)) echo $role; ?>">
                                    <option value="">Select Role</option>
                                    <option value="author">author</option>
                                    <option value="admin">admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" name="image">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary" value="Add User">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <?php 
                            if (isset($check_image)) {
                                echo "<img src='../img/$image' width='100%'>";
                            }
                         ?>
                    </div>
                </div>
            </div>
            <?php require_once 'includes/footer.php';?>
            <!-- //TODO Start from lecture no 58 -->
        