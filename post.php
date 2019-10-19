<?php
ob_start();
require_once 'includes/top.php';?>
</head>

<body>
    <?php require_once 'includes/header.php';?>
    <?php
$post_id = $_GET['post_id'];

$query = "SELECT * FROM `posts` WHERE `status` = 'publish' and id = $post_id";
$run = mysqli_query($con, $query);
if (mysqli_num_rows($run) > 0) {
	$row = mysqli_fetch_array($run);
	$id = $row['id'];
	$date = getdate($row['date']);
	$day = $date['mday'];
	$month = $date['month'];
	$year = $date['year'];

	$title = $row['title'];
	$image = $row['image'];
	$author_image = $row['author_image'];
	$author = $row['author'];
	$categories = $row['categories'];
	$post_data = $row['post_data'];

} else {
	header("Location: index.php");
}

?>
    <div class="jumbotron">
        <div class="container">
            <div id="details" class="animated fadeInLeft">
                <h1>Contact<span> Us</span></h1>
                <p>We are available 24/7/365 Feel Free to Contact us.</p>
            </div>
        </div>
        <img src="img/top-image.jpg" alt="Top image">
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post">
                        <div class="row">
                            <div class="col-md-2 post-date">
                                <div class="day">
                                    <?php echo $day; ?>
                                </div>
                                <div class="month">
                                    <?php echo $month; ?>
                                </div>
                                <div class="year">
                                    <?php echo $year; ?>
                                </div>
                            </div>
                            <div class="col-md-8 post-title">
                                <a href="post.php?post_id=<?php echo $id; ?>">
                                    <h2>Learn Jquery by building Projects</h2>
                                </a>
                                <p>Written by: <span>
                                        <?php echo ucfirst($author); ?></span></p>
                            </div>
                            <div class="col-md-2 profile-picture">
                                <img src="img/<?php echo $author_image; ?>" alt="" class="img-circle">
                            </div>
                        </div>
                        <a href="#"><img src="img/<?php echo $image; ?>" alt="post image"></a>
                        <p class="decs">
                            <?php echo $post_data; ?>
                        </p>
                        <div class="bottom">
                            <span class="first"><i class="fas fa-folder"></i> <a href="">
                                    <?php echo ucfirst($categories); ?></a></span> | <span class="second"><i class="fas fa-comment"></i> <a href="#"> Comment</a></span>
                        </div>
                    </div>
                    <div class="related-post">
                        <h3>Related Posts</h3>
                        <hr>
                        <div class="row">
                            <?php
$r_query = "SELECT * FROM `posts` WHERE `status` = 'publish' AND `title` LIKE '%$title%' LIMIT 3";

$r_run = mysqli_query($con, $r_query);

while ($r_row = mysqli_fetch_array($r_run)) {

	$r_id = $r_row['id'];
	$r_title = $r_row['title'];
	$r_image = $r_row['image'];

	?>
                            <div class="col-sm-4">
                                <a href="post.php?post_id=<?php echo $r_id; ?>">
                                    <img src="img/<?php echo $image; ?>" alt="Slider one">
                                    <h4>
                                        <?php echo $title; ?>
                                    </h4>
                                </a>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="author">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="img/<?php echo $author_image; ?>" alt="profile image" class="img-circle">
                            </div>
                            <div class="col-sm-9">
                                <h4>
                                    <?php echo ucfirst($author); ?>
                                </h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore consectetur minima maiores voluptatum voluptates suscipit reiciendis possimus at reprehenderit magnam vel perferendis dicta molestias amet doloremque, enim aliquam esse maxime?</p>
                            </div>
                        </div>
                    </div>

                    <?php
$c_query = "SELECT * FROM `comments` WHERE `status` = 'approve' AND `post_id` = $post_id";
$c_run = mysqli_query($con, $c_query);
if (mysqli_num_rows($c_run) > 0) {

	?>
                    <div class="comment">
                        <h3>Comments</h3>
                        <?php 
                            while ($c_row = mysqli_fetch_array($c_run)) {
                                $c_id = $c_row['id'];
                                $c_name = $c_row['name'];
                                $c_username = $c_row['username'];
                                $c_image = $c_row['image'];
                                $c_comment = $c_row['comment'];

                        

                         ?>
                        <hr>
                        <div class="row single-comment">
                            <div class="col-sm-2">
                                <img src="img/<?php echo $c_image; ?>" alt="Profile picture" class="img-circle">
                            </div>
                            <div class="col-sm-10">
                                <h4><?php echo ucfirst($c_username); ?></h4>
                                <p><?php echo $c_comment; ?></p>
                            </div>
                        </div>
                   <?php     } ?>
                    </div>

                <?php }?>
                    <div class="comment-box">
                        <div class="row">
                            <div class="col-xs-12">
                                <form action="#">
                                    <div class="form-group">
                                        <label for="full-name">Full Name*</label>
                                        <input type="text" id="full-name" name="name" class="form-control" placeholder="Full name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email Address*</label>
                                        <input type="text" id="email" name="email" class="form-control" placeholder="Email Address">
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="text" id="website" name="website" class="form-control" placeholder="Website URL">
                                    </div>
                                    <div class="form-group">
                                        <label for="full-name">Comment</label>
                                        <textarea name="comment" id="comment" class="form-control" placeholder="Your Comment should be there" rows="10"></textarea>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Submit Comment"> <span class="pull-right"> Errors Here</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php require_once 'includes/sidebar.php';?>
                </div>
            </div>
        </div>
    </section>
    <?php require_once 'includes/footer.php';?>