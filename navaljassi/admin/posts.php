<!DOCTYPE html>
<html lang="en">

<?php 
   
include('inc/top.php'); ?>
   
<?php    
if(!isset($_SESSION['username'])){
    header('location:login.php');   
}

    
    $session_username = $_SESSION['username'];
    
    if(isset($_GET['del']))
    {    
         $del_id = $_GET['del'];
     
         if($_SESSION['role'] == 'admin')
         {
             $delete_check_query = "SELECT * FROM posts WHERE id =  $del_id";
             $delete_check_run = mysqli_query($con,$delete_check_query);
         }
        else if($_SESSION['role'] == 'author')
        {
           $delete_check_query = "SELECT * FROM posts  WHERE id =  $del_id and author = '$session_username'";
           $delete_check_run = mysqli_query($con,$delete_check_query); 
        }
         if(mysqli_num_rows($delete_check_run) > 0)
         {

            $del_query = "DELETE FROM `posts` WHERE `posts`.`id` = $del_id";
            

                if(mysqli_query($con,$del_query))
                {
                $msg = "Post Has Been Deleted";
                }
                else
                {
                $error = "Post Has Not Been Deleted";
                }   
         } 
     else
     {
         header('location: index.php');
     }
    }
    
    
    if(isset($_POST['checkboxes'])){
        foreach($_POST['checkboxes'] as $user_id){
            $bulk_option = $_POST['bulk-option'];
            if($bulk_option == 'delete'){
               $bulk_del_query = "DELETE FROM `posts` WHERE `posts`.`id` = $user_id"; 
                mysqli_query($con,$bulk_del_query);
            }
            else if($bulk_option == 'publish'){
                $bulk_admin_query = "UPDATE `posts` SET `status` = 'publish' WHERE `posts`.`id` = $user_id";
                mysqli_query($con,$bulk_admin_query);
            }
            else if($bulk_option == 'draft'){
                $bulk_author_query = "UPDATE `posts` SET `status` = 'draft' WHERE `posts`.`id` = $user_id";
                mysqli_query($con,$bulk_author_query);
            }
        }
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
                       <h1><i class="fa fa-file"></i> Posts <small> View All Posts</small></h1><hr>
                      <ol class="breadcrumb">
                      <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-file"></i> Posts</li>
                      </ol>
                      <?php
                       if($_SESSION['role'] == 'admin')
                       {
                           $query = "SELECT * FROM posts ORDER BY id DESC";
                           $run = mysqli_query($con,$query);
                       }
                       else if($_SESSION['role']== author)
                       {
                           $query = "SELECT * FROM posts WHERE author = '$session_username'ORDER BY id DESC";
                           $run = mysqli_query($con,$query);
                       }
                           
                       
                       
                       if(mysqli_num_rows($run) > 0){
                       
                       ?>
                    <form action="" method="post">
                      <div class="row">
                          <div class="col-sm-8">
                              
                                  <div class="row">
                                      <div class="col-xs-4">
                                          <div class="form-group">
                                              <select name="bulk-option" id="" class="form-control">
                                                  <option value="delete">Delete</option>
                                                  <option value="publish">Publish</option>
                                                  <option value="draft">Draft</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-xs-8">
                                          <input type="submit" class="btn btn-success" value="Apply">
                                          <a href="add-post.php" class="btn btn-primary">Add New</a>
                                      </div>
                                  </div>
                              
                          </div>
                      </div>
                 
                    <?php 
                       if(isset($msg)){
                           echo "<span style ='color:green;' class = 'pull-right'>$msg</span>";
                       }
                           else if(isset($error)){
                               echo "<span style ='color:red;' class = 'pull-right'>$error</span>";
                           }
                       
                       
                       ?>
                      <table class="table table-bordered table-hover table-striped">
                          <thead>
                              <tr>
                                  <th><input type="checkbox" id="selectallboxes"></th>
                                  <th>Sr #</th>
                                  <th>Date</th>
                                  <th>Title</th>
                                  <th>Author</th>
                                  <th>Image</th>
                                  <th>Categories</th>
                                  <th>View</th>
                                  <th>Status </th>
                                  
                                  <th>Edit</th>
                                  <th>del</th>
                              </tr>
                          </thead>
                          <tbody>
                             <?php
                              while($row = mysqli_fetch_array($run)){
                                   $id = $row['id']; 
                                   $title = $row['title'];
                                   $author = $row['author'];
                                   $views = $row['views'];
                                   $category = $row['category'];
                                   $image = $row['image'];
                                   $status = $row['status'];
                                   $date = getdate($row['date']);
                                   $day = $date['mday'];
                                   $month = $date['month'];
                                   $year = $date['year'];
                                   
                              
                              ?>
                             
                              <tr>
                                  <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id; ?>"></td>
                                  <td><?php echo"$id"; ?></td>
                                  <td><?php echo"$day $month $year"; ?></td>
                                  <td><?php echo"$title"; ?></td>
                                  <td><?php echo"$author"; ?></td>
                                  
                                  <td><img src="img/<?php echo"$image"; ?>" width="30px"></td>
                                  <td><?php echo"$category"; ?></td>
                                  <td><?php echo"$views"; ?></td>
                                  <td><span style="color:<?php
                                      if($status == 'publish' ){echo 'green';}
                                      else if($status == 'draft'){echo'red';}
                                      
                                      ?>;"><?php echo ucfirst($status); ?></span></td>
                                  
                                  <td><a href="edit-post.php?edit=<?php echo $id; ?>"><i class="fa fa-pencil"></i></a></td>
                                  <td><a href="posts.php?del=<?php echo $id; ?>"><i class="fa fa-times"></i></a></td>
                              </tr>
                              
                              <?php } ?>
                          </tbody>
                        
                      </table>
                </form>
                       <?php
                       }
                         else{
                           echo "<center><h2>No Users Available</h2></center>";
                       }
                       ?>
                       



                </div>
               </div>
           </div>

           <?php include('inc/footer.php');?>
     