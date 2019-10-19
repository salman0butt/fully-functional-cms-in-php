<?php require_once('includes/top.php'); ?>
</head>

<body class="cate">
  <?php require_once('includes/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php 
                require_once('includes/sidebar.php');
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
                                    <a href="#" class="btn btn-primary">Add New</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
                            <th>Posts</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>15 Jan 2019</td>
                            <td>Salman Raza</td>
                            <td>Salman786</td>
                            <td>Salman@gmail.com</td>
                            <td> <img src="../img/unknown-picture.png" width="40" height="40"> </td>
                            <td>54543543454</td>
                            <td>Admin</td>
                            <td>77</td>
                            <td><a href="#"><i class="fa fa-edit"></i></a></td>
                            <td><a href="#"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>15 Jan 2019</td>
                            <td>Salman Raza</td>
                            <td>Salman786</td>
                            <td>Salman@gmail.com</td>
                            <td> <img src="../img/unknown-picture.png" width="40" height="40"> </td>
                            <td>54543543454</td>
                            <td>Admin</td>
                            <td>77</td>
                            <td><a href="#"><i class="fa fa-edit"></i></a></td>
                            <td><a href="#"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>15 Jan 2019</td>
                            <td>Salman Raza</td>
                            <td>Salman786</td>
                            <td>Salman@gmail.com</td>
                            <td> <img src="../img/unknown-picture.png" width="40" height="40"> </td>
                            <td>54543543454</td>
                            <td>Admin</td>
                            <td>77</td>
                            <td><a href="#"><i class="fa fa-edit"></i></a></td>
                            <td><a href="#"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>15 Jan 2019</td>
                            <td>Salman Raza</td>
                            <td>Salman786</td>
                            <td>Salman@gmail.com</td>
                            <td> <img src="../img/unknown-picture.png" width="40" height="40"> </td>
                            <td>54543543454</td>
                            <td>Admin</td>
                            <td>77</td>
                            <td><a href="#"><i class="fa fa-edit"></i></a></td>
                            <td><a href="#"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td>1</td>
                            <td>15 Jan 2019</td>
                            <td>Salman Raza</td>
                            <td>Salman786</td>
                            <td>Salman@gmail.com</td>
                            <td> <img src="../img/unknown-picture.png" width="40" height="40"> </td>
                            <td>54543543454</td>
                            <td>Admin</td>
                            <td>77</td>
                            <td><a href="#"><i class="fa fa-edit"></i></a></td>
                            <td><a href="#"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once('includes/footer.php'); ?>