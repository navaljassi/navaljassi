<!DOCTYPE html>
<html lang="en">
 <?php 
  
include('inc/top.php'); 
    
if(!isset($_SESSION['username'])){
    header("location: login.php");   
}   
    
    $session_username = $_SESSION['username'];
    $session_author_image = $_SESSION['author_image'];
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
                       <h1><i class="fa fa-plus-square"></i> Add Post <small> Add New Post</small></h1><hr>
                      <ol class="breadcrumb">
                      <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-plus-square"></i> Add Post</li>
                      </ol>
                       
                   <?php
                    if(isset($_POST['submit']))
                    {
                        $date = time();
                        $title = mysqli_real_escape_string($con,$_POST['title']);
                        $post_data = mysqli_real_escape_string($con,$_POST['post-data']);
                        $category = $_POST['category'];
                        $tags = mysqli_real_escape_string($con,$_POST['tags']);
                        $status = $_POST['status'];
                        $image = $_FILES['image']['name'];
                        $tmp_name = $_FILES['image']['tmp_name'];
                        
                        if(empty($title) or empty($post_data) or empty($tags))
                        {
                            $error = "All (*) Fields Are Required";
                        }
                        else
                        {
                            $insert_query = "INSERT INTO posts (date,title,author,author_image,image,category,tags,post_data,views,status) VALUES ('$date','$title','$session_username','$session_author_image','$image','$category','$tags','$post_data','0','$status')";
                            
                            if(mysqli_query($con,$insert_query))
                            {
                                $msg = "Post Has Been Added";
                                $path = "img/$image";
                                
                                $title ="";
                                $post_data ="";
                                $tags = "";
                                $status = "";
                                $category = "";
                                
                                if(move_uploaded_file($tmp_name,"$path"))
                                {
                                    copy($path,"../$path");
                                }
                            }
                            else
                            {
                                $error = "Post Has Not Been Added ";
                            }
                        }
                        
                    }   
                       
                    ?>
                       
                       <div class="row">
                           <div class="col-xs-12">
                               <form action="" method="post" enctype="multipart/form-data">
                                   <div class="form-group">
                                       <lable for = "title">Title:*</lable>
                                      <?php 
                                       if(isset($msg))
                                       {
                                           echo "<span style ='color:green;' class = 'pull-right'>$msg</span>";
                                       }
                                           else if(isset($error))
                                       {
                                           echo "<span style ='color:red;' class = 'pull-right'>$error</span>";
                                       }


                                       ?>
                                        <input type="text" name="title" class="form-control" <?php if(isset($title)) {echo $title;} ?> placeholder="Type Post Title Here">
                                   </div>
                                   <div class="form-group">
                                       <a href="media.php" class="btn btn-primary">Add Media </a>
                                   </div>
                                   <div class="form-group">
                                       <textarea name="post-data" id="textarea" class="form-control" rows="10"><?php if(isset($post_data)) {echo $post_data;}  ?></textarea>
                                   </div>
                                   <div class="row">
                                       <div class="col-sm-6">
                                           <div class="form-group">
                                               <lable for = "file">Post Image:*</lable>
                                               <input type="file" name="image" >
                                           </div>
                                       </div>
                                       <div class="col-sm-6">
                                           <div class="form-group">
                                               <lable for = "category">Categories:*</lable>
                                               <select name="category" id="category" class="form-control">
                                                   <?php
                                                   $cat_query = "SELECT * FROM categories ORDER BY id DESC";
                                                   $cat_run  = mysqli_query($con, $cat_query);
                                                   if(mysqli_num_rows($cat_run) > 0)
                                                   {
                                                      while($cat_row = mysqli_fetch_array($cat_run))
                                                      {
                                                          $cat_name = $cat_row ['category'];

                                                          echo "<option value='".$cat_name."'>".ucfirst($cat_name)."</option>";      
                                                      }  
                                                   }
                                                   else
                                                   {
                                                         echo  "<center><h6>No Category available</h6></center>";
                                                   }

                                                   ?>
                                                   
                                                   
                                                   
                                                   
                                               </select>
                                           </div>
                                       </div>
                                   </div>
                                   
                                   <div class="row">
                                       <div class="col-sm-6">
                                           <div class="form-group">
                                               <lable for = "tags" >Tags:*</lable>
                                               <input type="text" name="tags" class="form-control" value="<?php if(isset($post_data)) {echo $post_data;}  ?>" >
                                           </div>
                                       </div>
                                       <div class="col-sm-6">
                                               <div class="form-group">
                                                   <lable for = "status">Status:*</lable>



                                                   <select name="status" id="status" class="form-control">
                                                       <option value="publish">Publish</option>
                                                       <option value="draft">Draft</option>
                                                   </select>
                                           </div>
                                       </div>
                                   </div>
                                   <input type="submit" name="submit" class="btn btn-primary" value="Add Post">
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <?php include('inc/footer.php'); ?>
     