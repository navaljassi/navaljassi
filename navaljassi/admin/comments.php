<!DOCTYPE html>
<html lang="en">
<?php 
   
include('inc/top.php'); ?>
   
<?php    
if(!isset($_SESSION['username']))
  {
    header("Location: login.php");   
  }
  else if(isset($_SESSION['username']) and $_SESSION['role'] == 'author')
  {
    header("Location: index.php");
  }
    
    $session_username = $_SESSION['username'];
    
    
    
    //------Delete----------------------
    
    if(isset($_GET['del']))
    {    $del_id = $_GET['del'];
     
         $delete_check_query = "SELECT * FROM comments WHERE id =  $del_id";
         $delete_check_run = mysqli_query($con,$delete_check_query);
         if(mysqli_num_rows($delete_check_run) > 0)
         {

            $del_query = "DELETE FROM `comments` WHERE `comments`.`id` = $del_id";


                if(mysqli_query($con,$del_query))
                {
                $msg = "Comment Has Been Deleted";
                }
                else
                {
                $error = "Comment Has Not Been Deleted";
                }   
         }
    }
    //-----------Approved---------------
     
  if(isset($_GET['approve']))
    {
         $approve_id = $_GET['approve'];

         $approve_check_query = "SELECT * FROM comments WHERE id =  $approve_id";
         $approve_check_run = mysqli_query($con, $approve_check_query);
         if(mysqli_num_rows($approve_check_run) > 0)
         {

            $approve_query = "UPDATE `comments` SET `status` = 'approve' WHERE `comments`.`id` = $approve_id";


                if(mysqli_query($con,$approve_query))
                {
                $msg = "comment has been approved";
                }
                else
                {
                $error = "comment has not been approved";
                }   
         }  
    }
    
    //-----------Unapproved----------------
  if(isset($_GET['unapprove']))
    {
         $unapprove_id = $_GET['unapprove'];

         $unapprove_check_query = "SELECT * FROM comments WHERE id =  $unapprove_id";
         $unapprove_check_run = mysqli_query($con, $unapprove_check_query);
         if(mysqli_num_rows($unapprove_check_run) > 0)
         {

            $unapprove_query = "UPDATE `comments` SET `status` = 'unapprove' WHERE `comments`.`id` = $unapprove_id";


                if(mysqli_query($con,$unapprove_query))
                {
                $msg = "Comment Has Been Unapproved";
                }
                else
                {
                $error = "Comment Has Not Been Unapproved";
                }   
         }  
    }  
    
    
    
    //-------------checkbox----------------
    
    if(isset($_POST['checkboxes'])){
        foreach($_POST['checkboxes'] as $user_id){
            $bulk_option = $_POST['bulk-option'];
            if($bulk_option == 'delete'){
               $bulk_del_query = "DELETE FROM `comments` WHERE `comments`.`id` = $user_id"; 
                mysqli_query($con,$bulk_del_query);
            }
            else if($bulk_option == 'approve'){
                $bulk_admin_query = "UPDATE `comments` SET `status` = 'approve' WHERE `comments`.`id` = $user_id";
                mysqli_query($con,$bulk_admin_query);
            }
            else if($bulk_option == 'unapprove'){
                $bulk_author_query = "UPDATE `comments` SET `status` = 'unapprove' WHERE `comments`.`id` = $user_id";
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
                       <h1><i class="fa fa-comments"></i> Comments <small> View All Comments</small></h1><hr>
                      <ol class="breadcrumb">
                      <li><a href="index.php"><i class="fa fa-tachometer"></i> Dashboard</a></li>
                      <li class="active"><i class="fa fa-users"></i> Comments</li>
                      </ol>
                      <?php
                       if(isset($_GET['reply']))
                       {
                           $reply_id = $_GET['reply'];
                           $reply_check = "SELECT * FROM comments WHERE post_id = $reply_id";
                           $reply_check_run = mysqli_query($con,$reply_check);
                           if(mysqli_num_rows($reply_check_run) > 0)
                           {
                               if(isset($_POST['reply']))
                               {
                                $comment_data = $_POST['comment'];
                                   if(empty($comment_data))
                                   {
                                       $comment_error = "Must Fill Comment Area";
                                   }
                                   else
                                   {
                                       $get_user_data = "SELECT * FROM users WHERE username = '$session_username'";
                                       $get_user_run = mysqli_query($con, $get_user_data);
                                       $get_user_row = mysqli_fetch_array($get_user_run);
                                       
                                       $date = time();
                                       $first_name = $get_user_row['first_name'];
                                       $last_name = $get_user_row['last_name'];
                                       $full_name = "$first_name $last_name";
                                       $email = $get_user_row['email'];
                                       $image = $get_user_row['image'];
                                       
                                       
                                       $insert_comment_query = "INSERT INTO comments (date,name,username,post_id,email,image,comment,status) VALUES ('$date','$full_name','$session_username','$reply_id','$email','$image','$comment_data','approve')";
                                       
                                       if(mysqli_query($con,$insert_comment_query))
                                       {
                                           $comment_msg = "Comment Has Been Submitted";
                                           
                                           header('location:comment.php');
                                       }
                                       else
                                       {
                                           $comment_error = "Comment Has Not Been Submitted";
                                       }
                                   }
                               }
                       ?>
                     
<!------------------------Reply comment ------------------------> 
                     <div class="row">
                          <div class="col-xs-12 col-md-6 col-lg-6">
                              <form action="" method="post">
                                  <div class="form-group">
                                      <lable for="comment">Comment:*</lable>
                                      <?php 
                                       if(isset($comment_error))
                                       {
                                           echo "<span class = 'pull-right' style = 'color:red;'>$comment_error</span>";
                                       }
                                       else if(isset($comment_msg))
                                       {
                                           echo "<span class = 'pull-right' style = 'color:green;'>$comment_msg</span>";
                                       }
                                      ?>
                                      <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Your Comment Here" class="form-control"></textarea>
                                  </div>
                                  <input type="submit" name="reply" class="btn btn-primary">
                              </form>
                          </div>
                      </div>
                      <hr>
                      
      <?php
                        }
                           
                    }
       $query = "SELECT * FROM comments ORDER BY id DESC";
       $run = mysqli_query($con,$query);
       if(mysqli_num_rows($run) > 0)
       {

       ?>
                       
                       
                    <form action="" method="post">
                     
    <!-------------Bulk option---------->                   
                      <div class="row">
                          <div class="col-sm-8">
                              
                                  <div class="row">
                                      <div class="col-xs-4">
                                          <div class="form-group">
                                              <select name="bulk-option" id="" class="form-control">
                                                  <option value="delete">Delete</option>
                                                  <option value="approve">Approve</option>
                                                  <option value="unapprove">Unapprove</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-xs-8">
                                          <input type="submit" class="btn btn-success" value="Apply">
                                          <a href="add-user.php" class="btn btn-primary">Add New</a>
                                      </div>
                                  </div>
                              
                          </div>
                      </div>

                   
  <!-------------Message display---------->
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
                     
   <!-------------Table---------->              
                     
                     <table class="table table-bordered table-hover table-striped">
                          <thead>
                              <tr>
                                  <th><input type="checkbox" id="selectallboxes"></th>
                                  <th>Sr #</th>
                                  <th>Date</th>
                                  
                                  <th>Username</th>
                                  <th>Comment</th>
                                  <th>Status</th>
                                  <th>Approve</th>
                                  <th>Unapprove</th>
                                  
                                  <th>Reply</th>
                                  <th>Del</th>
                              </tr>
                          </thead>
                          <tbody>
                             <?php
                              while($row = mysqli_fetch_array($run)){
                                   $id = $row['id'];    
                                   $date = getdate($row['date']);
                                   $day = $date['mday'];
                                   $month = $date['month'];
                                   $year = $date['year'];
                                   $username = $row['username'];
                                   $comment = $row['comment'];
                                   $post_id = $row['post_id'];
                                   $status = $row['status'];
                              ?>
                             
                              <tr>
                                  <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id; ?>"></td>
                                  <td><?php echo"$id"; ?></td>
                                  <td><?php echo"$day $month $year"; ?></td>
                                  
                                  <td><?php echo"$username"; ?></td>
                                  <td><?php echo $comment; ?></td>
                                  <td><span style="color:<?php
                                      if($status == 'approve' ){echo 'green';}
                                      else if($status == 'unapprove'){echo'red';}
                                      
                                      ?>;"><?php echo ucfirst($status); ?></span></td>
                                  <td><a href="comments.php?approve=<?php echo $id; ?>">Approve</a></td>
                                  <td><a href="comments.php?unapprove=<?php echo $id; ?>">Unapprove</a></td>
                                  
                                  <td><a href="comments.php?reply=<?php echo $post_id; ?>"><i class="fa fa-reply"></i></a></td>
                                  <td><a href="comments.php?del=<?php echo $id; ?>"><i class="fa fa-times"></i></a></td>
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
     