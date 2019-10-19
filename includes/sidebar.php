<div class="widgets">
    <form action="index.php" method="post">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." name="search-title">
            <span class="input-group-btn">
               <input type="submit" value="Go" class="btn btn-default" name="search">
            </span>
        </div><!-- /input-group -->
    </form>
</div> <!-- widgets close -->
<div class="widgets">
    <div class="popular">
        <h4>Popular Post</h4>
        <hr>
        <?php
$p_query = "SELECT * FROM `posts` WHERE `status` = 'publish' ORDER BY `views` DESC LIMIT 5";
$p_run = mysqli_query($con, $p_query);

if (mysqli_num_rows($p_run) > 0) {
	while ($p_row = mysqli_fetch_array($p_run)) {
		$p_id = $p_row['id'];
		$p_title = $p_row['title'];
		$p_date = getdate($p_row['date']);
		$p_day = $p_date['mday'];
		$p_month = $p_date['month'];
		$p_year = $p_date['year'];
		$p_image = $p_row['image'];

		?>
        <hr>
        <div class="row">
            <div class="col-xs-4">
                <a href="post.php?post_id=<?php echo $p_id; ?>"> <img src="img/<?php echo $p_image; ?>" alt=""></a>
            </div>
            <div class="col-xs-8 details">
                <a href="post.php?post_id=<?php echo $p_id; ?>">
                    <h5>
                        <?php echo $p_title; ?>
                    </h5>
                </a>
                <p><i class="far fa-clock"></i>
                    <?php echo "$p_day $p_month, $p_year" ?>
                </p>
            </div>
        </div>
        <?php
}

} else {
	echo '<h3>No Post Available</h3>';

}
?>
    </div>
</div> <!-- widgets close -->
<div class="widgets">
    <div class="popular">
        <h4>Recent Post</h4>
        <hr>
        <?php
$p_query = "SELECT * FROM `posts` WHERE `status` = 'publish' ORDER BY `id` DESC LIMIT 5";
$p_run = mysqli_query($con, $p_query);

if (mysqli_num_rows($p_run) > 0) {
	while ($p_row = mysqli_fetch_array($p_run)) {
		$p_id = $p_row['id'];
		$p_title = $p_row['title'];
		$p_date = getdate($p_row['date']);
		$p_day = $p_date['mday'];
		$p_month = $p_date['month'];
		$p_year = $p_date['year'];
		$p_image = $p_row['image'];

		?>
        <hr>
        <div class="row">
            <div class="col-xs-4">
                <a href="post.php?post_id=<?php echo $p_id; ?>"> <img src="img/<?php echo $p_image; ?>" alt=""></a>
            </div>
            <div class="col-xs-8 details">
                <a href="post.php?post_id=<?php echo $p_id; ?>">
                    <h5>
                        <?php echo $p_title; ?>
                    </h5>
                </a>
                <p><i class="far fa-clock"></i>
                    <?php echo "$p_day $p_month, $p_year" ?>
                </p>
            </div>
        </div>
        <?php
}

} else {
	echo '<h3>No Post Available</h3>';

}
?>
    </div>
</div> <!-- widgets close -->
<div class="widgets">
    <div class="popular">
        <h4>Categories</h4>
        <hr>
        <div class="row">
            <div class="col-xs-6">
                <ul>
                    <?php
$c_query = "SELECT * FROM `categories`";
$c_run = mysqli_query($con, $c_query);
if (mysqli_num_rows($c_run) > 0) {
	$count = 2;
	while ($c_row = mysqli_fetch_array($c_run)) {
		$c_id = $c_row['id'];
		$c_category = $c_row['category'];
		$count = $count + 1;

		if (($count % 2) == 1) {
			echo "<li><a href='index.php?cat=" . $c_id . "'>" . ucfirst($c_category) . "</a></li>";
		}
	}

} else {
	echo '<p>No Category</p>';
}
?>
                </ul>
            </div>
            <div class="col-xs-6"></div>
            <ul>
                <?php
$c_query = "SELECT * FROM `categories`";
$c_run = mysqli_query($con, $c_query);
if (mysqli_num_rows($c_run) > 0) {
	$count = 2;
	while ($c_row = mysqli_fetch_array($c_run)) {
		$c_id = $c_row['id'];
		$c_category = $c_row['category'];
		$count = $count + 1;

		if (($count % 2) == 0) {
			echo "<li><a href='index.php?cat=" . $c_id . "'>" . ucfirst($c_category) . "</a></li>";
		}
	}

} else {
	echo '<p>No Category</p>';
}
?>
            </ul>
        </div>
    </div>
</div>
<div class="widgets">
    <div class="categories">
        <h4>Social icons</h4>
        <hr>
        <div class="row">
            <div class="col-xs-4"><a href="https://www.facebook.com"><img src="img/facebook.png" alt="facebook"></a></div>
            <div class="col-xs-4"><a href="https://www.twitter.com"><img src="img/twitter.png" alt="twitter"></a></div>
            <div class="col-xs-4"><a href="https://www.linkdin.com"><img src="img/linkedin.png" alt="linkdin"></a></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-xs-4"><a href="https://www.googleplus.com"><img src="img/googleplus.png" alt="googleplus"></a></div>
            <div class="col-xs-4"><a href="https://www.youtube.com"><img src="img/youtube.gif" alt="youtube"></a></div>
            <div class="col-xs-4"><a href="https://www.skype.com"><img src="img/skype.png" alt="skype"></a></div>
        </div>
    </div>
</div>