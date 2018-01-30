<!DOCTYPE html>
<html lang="en">
<?php 
  
include('inc/top.php'); 
    
if(!isset($_SESSION['username'])){
    header('location: login.php');   
}  
else if(isset($_SESSION['username']) and $_SESSION['role'] == 'author')
{
    header('location:index.php');
}    
    
 
    
?>
  <body>
     <div id="wrapper">
            <?php include('inc/header.php'); ?>

           <div class="container-fluid body-section">
               <div class="row">
                   <div class="col-md-3">
                       <?php include('inc/sidebar.php'); ?>

                   </div>
                   <div class="col-md-9">
                       <h1><i class="fa fa-folder-open"></i> Categories <small>Diffrent categories</small></h1><hr>
                      <ol class="breadcrumb">
                      <li><a href="index.html"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-folder-open"></i> Categories</li>
                      </ol>
                      
                      <div class="row">
                          <div class="col-md-6">
                              <form action="">
                                  <div class="form-group">
                                      <label for="category">category</label>
                                      <input type="text" name="cat-name" placeholder="Category Name" class="form-control">
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
                                          <th>Del</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td>1</td>
                                          <td>Video Tutorials</td>
                                          <td>12</td>
                                          <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                                          <td><a href="#"><i class="fa fa-times"></i></a></td>
                                      </tr>
                                      
                                      <tr>
                                          <td>1</td>
                                          <td>Video Tutorials</td>
                                          <td>12</td>
                                          <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                                          <td><a href="#"><i class="fa fa-times"></i></a></td>
                                      </tr>
                                      
                                      <tr>
                                          <td>1</td>
                                          <td>Video Tutorials</td>
                                          <td>12</td>
                                          <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                                          <td><a href="#"><i class="fa fa-times"></i></a></td>
                                      </tr>
                                      
                                      <tr>
                                          <td>1</td>
                                          <td>Video Tutorials</td>
                                          <td>12</td>
                                          <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                                          <td><a href="#"><i class="fa fa-times"></i></a></td>
                                      </tr>
                                      
                                      <tr>
                                          <td>1</td>
                                          <td>Video Tutorials</td>
                                          <td>12</td>
                                          <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                                          <td><a href="#"><i class="fa fa-times"></i></a></td>
                                      </tr>
                                      
                                      <tr>
                                          <td>1</td>
                                          <td>Video Tutorials</td>
                                          <td>12</td>
                                          <td><a href="#"><i class="fa fa-pencil"></i></a></td>
                                          <td><a href="#"><i class="fa fa-times"></i></a></td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
              

                        

                       



                </div>
               </div>
           </div>

           <?php include('inc/footer.php'); ?>
     </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>