<!DOCTYPE html>
<html lang="en">
<?php 
   
include('inc/top.php'); 

if(!isset($_SESSION['username'])){
    header('location: login.php');   
} 
else if(isset($_SESSION['username']) and $_SESSION['role'] == 'author'){
    header('location: index.php');
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
                       <h1><i class="fa fa-users"></i> Add User <small> Add New User</small></h1><hr>
                      <ol class="breadcrumb">
                      <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-user-plus"></i> Add New User</li>
                      </ol>
                      
                      <?php
                       if(isset($_POST['submit'])){
                           $date = time();
                           $first_name = mysqli_real_escape_string($con, $_POST['first-name']);
                           $last_name = mysqli_real_escape_string($con, $_POST['last-name']);
                           $username = mysqli_real_escape_string($con,strtolower($_POST['username']));
                           $username_trim = preg_replace('/\s*/','',$username);
                           $email = mysqli_real_escape_string($con, strtolower($_POST['email']));
                           $password = mysqli_real_escape_string($con, $_POST['password']);
                           $role = $_POST['role'];
                           $image = $_FILES['image']['name'];
                           $image_tmp = $_FILES['image']['tmp_name'];
                           
                           $check_query = "SELECT * FROM users WHERE email = '$email' or username = '$username'";
                           $check_run = mysqli_query($con,$check_query);
                           
                           $salt_query = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
                           $salt_run = mysqli_query($con, $salt_query);
                           $salt_row = mysqli_fetch_array($salt_run);
                           $salt = $salt_row['salt'];
                           
                           $password = crypt($password,$salt);
                           
                           if(empty($first_name) or empty($last_name) or empty($username) or empty($email) or empty($password) or empty($image)){
                               
                               $error = "All (*) fields required"; 
                           }
                           else if($username != $username_trim){
                              $error = "don't use space in username";
                           }
                           else if(mysqli_num_rows($check_run) > 0){
                               $error = "Username or email already exist";
                           }
                           else{
                               $insert_query = "INSERT INTO `users` (`id`, `date`, `first_name`, `last_name`, `username`, `email`, `image`, `password`, `role`) VALUES (NULL, '$date', '$first_name', '$last_name', '$username', '$email', '$image', '$password', '$role');";
                               
                               $insert_run = mysqli_query($con,$insert_query);
                               if($insert_run){
                                   $msg = "User has been added";
                                   move_uploaded_file($image_tmp, "img/$image");
                                   $image_check = "SELECT * FROM users ORDER BY id DESC 1";
                                   $image_run = mysqli_query($con, $image_check);
                                   $image_row  = mysqli_fetch_array($image_run);
                                   $check_image = $image_row['image'];
                                   
                                   $first_name = "";
                                   $last_name = "";
                                   $username = "";
                                   $email = "";
                               }
                               else{
                                   $error = "User has not been added ";
                               }
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
                                      <input type="text" name="first-name" id="first-name" class="form-control" placeholder="first name" value="<?php if(isset($first_name)){echo "$first_name";} ?>">
                                      
                                  </div>
                                  <div class="form-group">
                                      <lable for="last-name" >Last Name:*</lable>
                                      <input type="text" name="last-name" id="last-name" class="form-control" placeholder="Last name" value="<?php if(isset($last_name)){echo "$last_name";} ?>">
                                  </div>
                                  <div class="form-group">
                                      <lable for="username" >Username:*</lable>
                                      <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php if(isset($username)){echo "$username";} ?>">
                                  </div>
                                  <div class="form-group">
                                      <lable for="email" >Email:*</lable>
                                      <input type="text" name="email" id="email" class="form-control" placeholder="Email address" value="<?php if(isset($email)){echo "$email";} ?>">
                                  </div>
                                  <div class="form-group">
                                      <lable for="password" >Password:*</lable>
                                      <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                  </div>
                                  <div class="form-group">
                                      <lable for="role" >Role:*</lable>
                                      <select name="role" id="role" class="form-control">
                                          <option value="author">Author</option>
                                          <option value="admin">Admin</option>
                                      </select>
                                  </div>
                                  <div class="form-group">
                                      <lable for="image" >Profile picture:*</lable>
                                      <input type="file" name="image" id="image" class="form-control">
                                  </div>
                                  
                                  <input type="submit" class="btn btn-primary" name="submit" value="Add User">
                                  
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
