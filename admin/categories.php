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
                <h1 class="tc"><i class="fas fa-folder-open"></i> Categories <small>Differnt Categories</small></h1>
                <hr>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                    <li class="active"> <i class="fas fa-folder-open"></i> Categories</li>
                </ol>
               <div class="row">
                   <div class="col-md-6">
                       <form action="#">
                           <div class="form-group">
                               <label for="category">Category Name:</label>
                               <input type="text" placeholder="Category Name" class="form-control">
                           </div>
                           <input type="submit" value="Add Category" name="submit" class="btn btn-primary">
                       </form>
                   </div>
                   <div class="col-md-6">
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
                               <tr>
                                   <td>1</td>
                                   <td>Video Editing</td>
                                   <td>12</td>
                                   <td><a href="#"><i class="fa fa-edit"></i></a></td>
                                   <td><a href="#"><i class="fa fa-trash"></i></a></td>
                               </tr>
                                 <tr>
                                   <td>1</td>
                                   <td>Video Editing</td>
                                   <td>12</td>
                                   <td><a href="#"><i class="fa fa-edit"></i></a></td>
                                   <td><a href="#"><i class="fa fa-trash"></i></a></td>
                               </tr>
                                 <tr>
                                   <td>1</td>
                                   <td>Video Editing</td>
                                   <td>12</td>
                                   <td><a href="#"><i class="fa fa-edit"></i></a></td>
                                   <td><a href="#"><i class="fa fa-trash"></i></a></td>
                               </tr>
                                 <tr>
                                   <td>1</td>
                                   <td>Video Editing</td>
                                   <td>12</td>
                                   <td><a href="#"><i class="fa fa-edit"></i></a></td>
                                   <td><a href="#"><i class="fa fa-trash"></i></a></td>
                               </tr>
                                 <tr>
                                   <td>1</td>
                                   <td>Video Editing</td>
                                   <td>12</td>
                                   <td><a href="#"><i class="fa fa-edit"></i></a></td>
                                   <td><a href="#"><i class="fa fa-trash"></i></a></td>
                               </tr>
                           </tbody>
                       </table>
                   </div>
               </div>
            </div>
        </div>
    </div>
<?php require_once('includes/footer.php'); ?>