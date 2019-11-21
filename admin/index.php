<?php 
require_once('includes/top.php'); 
if (!isset($_SESSION['username'])) {
    header('Location: logout.php');
}

?>
</head>

<body>
  <?php require_once('includes/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
           <?php 
                require_once('includes/sidebar.php');
            ?>
            </div>
            <div class="col-md-9">
                <h1 class="tc"><i class="fas fa-tachometer-alt"></i> Dashboard <small>Statistics Overview</small></h1>
                <hr>
                <ol class="breadcrumb">
                    <li class="active"> <i class="fas fa-tachometer-alt"></i> Dashboard</li>
                </ol>
                <div class="row tag-boxes">
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="text-right huge">11</div>
                                        <div class="text-right">New Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View All Comments</span>
                                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="text-right huge">19</div>
                                        <div class="text-right">New Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View All Posts</span>
                                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="text-right huge">11</div>
                                        <div class="text-right">New Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View All Users</span>
                                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-folder-open fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9">
                                        <div class="text-right huge">30</div>
                                        <div class="text-right">All Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View All Categories</span>
                                    <span class="pull-right"> <i class="fa fa-arrow-circle-right"></i> </span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <h3>New Users</h3>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>28 jan 2019</td>
                            <td>Salman Raza</td>
                            <td>Salman786</td>
                            <td>Admin</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>28 jan 2019</td>
                            <td>Salman Raza</td>
                            <td>Salman786</td>
                            <td>Admin</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>28 jan 2019</td>
                            <td>Salman Raza</td>
                            <td>Salman786</td>
                            <td>Admin</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>28 jan 2019</td>
                            <td>Salman Raza</td>
                            <td>Salman786</td>
                            <td>Admin</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>28 jan 2019</td>
                            <td>Salman Raza</td>
                            <td>Salman786</td>
                            <td>Admin</td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="btn btn-primary">View All Users</a>
                <h3>New Posts</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sr #</th>
                            <th>Date</th>
                            <th>Posts Title</th>
                            <th>Category</th>
                            <th>Views</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Build CMS Php Project</td>
                            <td>25 jan 2019</td>
                            <td>Video Tutorials</td>
                            <td><i class="fas fa-eye"></i> 28</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Build CMS Php Project</td>
                            <td>25 jan 2019</td>
                            <td>Video Tutorials</td>
                            <td><i class="fas fa-eye"></i> 28</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Build CMS Php Project</td>
                            <td>25 jan 2019</td>
                            <td>Video Tutorials</td>
                            <td><i class="fas fa-eye"></i> 28</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Build CMS Php Project</td>
                            <td>25 jan 2019</td>
                            <td>Video Tutorials</td>
                            <td><i class="fas fa-eye"></i> 28</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Build CMS Php Project</td>
                            <td>25 jan 2019</td>
                            <td>Video Tutorials</td>
                            <td><i class="fas fa-eye"></i> 28</td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="btn btn-primary" style="margin-bottom: 50px;">View All Posts</a>
            </div>
        </div>
    </div>
<?php require_once('includes/footer.php'); ?>