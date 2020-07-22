<?php
require_once "../includes/db.php";
require_once 'includes/top.php';
if (!isset($_SESSION['username'])) {
	header('Location: logout.php');
}

?>
</head>

<body>
  <?php require_once 'includes/header.php';?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
           <?php
require_once 'includes/sidebar.php';
?>
            </div>
            <div class="col-md-9">
                <h1 class="tc"><i class="fas fa-database"></i> Media <small>Manage Media</small></h1>
                <hr>
                <ol class="breadcrumb">
                    <li> <i class="fas fa-tachometer-alt"></i> Dashboard</li>
                    <li class="active"> <i class="fas fa-database"></i> Media</li>
                </ol>
                <?php

if (isset($_POST['submit'])) {
	if (count($_FILES['media']['name']) > 0) {
		for ($i = 0; $i < count($_FILES['media']['name']); $i++) {
			$image = $_FILES['media']['name'][$i];
			$tmp_name = $_FILES['media']['tmp_name'][$i];

			$query = "INSERT INTO `media`(image) VALUES('$image')";
			$run = mysqli_query($con, $query);
           // var_dump($query);
			move_uploaded_file($tmp_name, "media/$image");
		}

	}
}
?>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-4 col-xs-8">
                            <input type="file" name="media[]" required multiple>
                        </div>
                        <div class="col-sm-4 col-xs-4">
                            <input type="submit" name="submit" class="btn btn-primary btn-sm" value="Add Media">
                        </div>
                    </div>
                </form><hr>
                <div class="row">
                                            <?php
$get_query = "SELECT * FROM `media`";
$run_media = mysqli_query($con, $get_query);
if (mysqli_num_rows($run_media) > 0) {
    while ($get_row = mysqli_fetch_array($run_media)) {
        $get_image = $get_row['image'];

        ?>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-6 thumb">

                        <a href="media/<?php echo $get_image; ?>" class="thumbnail">
                            <img src="media/<?php echo $get_image; ?>" width="100%">
                        </a>

                    </div>
                                            <?php
}
}else {
    echo '<center><h2 class="text-center">Media Available</h2></center>';
}

?>
                </div>

            </div>
        </div>
    </div>
<?php require_once 'includes/footer.php';?>