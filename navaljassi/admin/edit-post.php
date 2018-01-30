<!DOCTYPE html>
<html lang="en">
 <?php 
   
include('inc/top.php'); 
    
if(!isset($_SESSION['username'])){
    header("location: login.php");   
}   
    
    $session_username = $_SESSION['username'];
    $session_role = $_SESSION['role'];
    $session_author_image = $_SESSION['author_image'];
    
    if(isset($_GET['edit']))
    {
        $edit_id = $_GET['edit'];
        if($session_role == 'admin')
        {
           $get_query = "SELECT * FROM posts WHERE ID = $edit_id";    
           $get_run = mysqli_query($con, $get_query);
        }
        else if($session_role =='author')
        {
           $get_query = "SELECT * FROM posts WHERE id = $edit_id and author = $session_username";    
           $get_run = mysqli_query($con, $get_query);
        }
         
        
        if(mysqli_num_rows($get_run) > 0)
        {
            $get_row = mysqli_fetch_array($get_run);
            
            $title = $get_row['title'];
            $post_data = $get_row['post_data'];
            $tags = $get_row['tags'];
            $image = $get_row['image'];
            $status = $get_row['status'];
            $category = $get_row['category'];
            
            
            
            
        }
        else
        {
            header("location: posts.php");
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
                       <h1><i class="fa fa-pencil"></i> Edit Post <small> Edit Post Details</small></h1><hr>
                      <ol class="breadcrumb">
                      <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-pencil"></i> Edit Post</li>
                      </ol>
                       
                   <?php
                    if(isset($_POST['update']))
                    {
                        
                        $up_title = mysqli_real_escape_string($con,$_POST['title']);
                        $up_post_data = mysqli_real_escape_string($con,$_POST['post-data']);
                        $up_category = $_POST['category'];
                        $up_tags = mysqli_real_escape_string($con,$_POST['tags']);
                        $up_status = $_POST['status'];
                        $up_image = $_FILES['image']['name'];
                        $up_tmp_name = $_FILES['image']['tmp_name'];
                        
                        if(empty($up_title) or empty($up_post_data) or empty($up_tags))
                        {
                            $error = "All (*) Fields Are Required";
                        }
                        else
                        {
                            $update_query = "UPDATE posts SET title = '$up_title',image = '$up_image',category ='$up_category',tags ='$up_tags',post_data='$up_post_data',status='$up_status' WHERE `posts`.`id` = $edit_id ";
                            
                            if(mysqli_query($con,$update_query))
                            {
                                $msg = "Post Has Been Updated";
                                $path = "img/$up_image";
                                if(!empty($up_image))
                                {
                                    if(move_uploaded_file($up_tmp_name,"$path"))
                                    {
                                    copy($path,"../$path");
                                    }
                                }
                                header("location:posts.php");
                            }
                            else
                            {
                                $error = "Post Has Not Been Updated ";
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
                                        <input type="text" name="title" class="form-control" value="
                                        <?php if(isset($title)) {echo $title;} 
                                        else if(isset($up_title)) {echo $up_title;}
                                        ?>" placeholder="Type Post Title Here">
                                   </div>
                                   <div class="form-group">
                                       <a href="media.php" class="btn btn-primary">Add Media </a>
                                   </div>
                                   <div class="form-group">
                                       <textarea name="post-data" id="textarea" class="form-control" rows="10">
                                       <?php if(isset($post_data)) {echo $post_data;} 
                                           else if(isset($up_post_data)) {echo $up_post_data;}  ?></textarea>
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
                                               <lable for = "tags">Tags:*</lable>
                                               <input type="text" name="tags" class="form-control" value="
                                               <?php if(isset($tags)){echo $tags;}
                                                else if(isset($up_title)) {echo $up_title;}                                                         
                                                ?>">
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
                                   <input type="submit" name="update" class="btn btn-primary" value="Update Post">
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>

           <?php include('inc/footer.php'); ?>
     