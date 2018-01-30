<!DOCTYPE html>
<html lang="en">
<?php 
   
include('inc/top.php'); ?>

<?php
if(!isset($_SESSION['username'])){
    header('Location:login.php');   
} 

    
    if(isset($_GET['edit']))
    {
        $edit_id = $_GET['edit'];
        $edit_query = "SELECT * FROM users WHERE ID = $edit_id";
        $edit_query_run = mysqli_query($edit_query);
        if(mysqli_num_rows($edit_query_run) > 0)
        {
            $edit_row = mysqli_fetch_array($edit_query_run);
            $e_first_name = $edit_row['first_name'];
            $e_last_name = $edit_row['last_name'];
            
            $e_image = $edit_row['image'];
        }
        else{
            header('location:index.php');
        }
        
    }
    else{
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
                       <h1><i class="fa fa-user"></i> Edit Profile <small> Edit Profile Detail</small></h1><hr>
                      <ol class="breadcrumb">
                      <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-user"></i>Edit Profile</li>
                      </ol>
                      
                      <?php
                       if(isset($_POST['submit'])){
                           
                           $first_name = mysqli_real_escape_string($con, $_POST['first-name']);
                           $last_name = mysqli_real_escape_string($con, $_POST['last-name']);
                           $password = mysqli_real_escape_string($con, $_POST['password']);
                           $role = $_POST['role'];
                           $image = $_FILES['image']['name'];
                           $image_tmp = $_FILES['image']['tmp_name'];
                           
                           
                           
                           $salt_query = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
                           $salt_run = mysqli_query($con, $salt_query);
                           $salt_row = mysqli_fetch_array($salt_run);
                           $salt = $salt_row['salt'];
                           
                           $password = crypt($password,$salt);
                           
                           if(empty($first_name) or empty($last_name) or empty($image)){
                               
                               $error = "All (*) fields required"; 
                           }
                           else{
                               $msg = "good";
                           }
                           
                           
                           }
                           
                       
                       
                       
                       
                       
                       
                       
                       
                       ?>
                      
                      <div class="row">
                          <div class="col-md-8">
                              <form action="" method="post" enctype="multipart/form-data" >
                                  <div class="form-group">
                                      <lable for="first-name" >First Name:*</lable>
                                      <?php
                                      if(isset($error)){
                                          echo "<span class = 'pull-right' style = 'color:red;' >$error</span>";
                                      }
                                      else if(isset($msg)){
                                          echo "<span class = 'pull-right' style = 'color:green;' >$msg</span>";
                                      }
                                      
                                      
                                      ?>
                                      <input type="text" name="first-name" id="first-name" class="form-control" placeholder="first name" value="<?php echo $e_first_name?>">
                                      
                                  </div>
                                  <div class="form-group">
                                      <lable for="last-name" >Last Name:*</lable>
                                      <input type="text" name="last-name" id="last-name" class="form-control" placeholder="Last name" value="<?php echo $e_last_name?>">
                                  </div>
                                  
                                  <div class="form-group">
                                      <lable for="password" >Password:*</lable>
                                      <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                  </div>
                                  
                                  <div class="form-group">
                                      <lable for="image" >Profile picture:*</lable>
                                      <input type="file" name="image" id="image" class="form-control">
                                  </div>
                                  
                                  <input type="submit" class="btn btn-primary" name="submit" value="Update User">
                                  
                              </form>
                              
                              
                              
                          </div>
                          <div class="col-md-4">
                              <?php
                              if(isset($check_image)){
                                  echo "<img src = 'img/$check_image' width = '100%'>";
                              }
                              
                              ?>
                              
                          </div>
                      </div>


                </div>
               </div>
           </div>

           <?php include('inc/footer.php');?>
