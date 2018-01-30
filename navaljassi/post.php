<?php include('inc/top.php'); ?>
  
   <body>
   <div class="body">
    <?php include('inc/header.php'); ?>
      
    <?php
       
       
    
    if(isset($_GET['post_id'])){
          $post_id = $_GET['post_id'];
          
        $views_query = "UPDATE `posts` SET `views` = views + 1 WHERE `posts`.`id` = $post_id";
        mysqli_query($con,$views_query);
        
        $query = "SELECT * FROM posts WHERE status = 'publish' and id = $post_id";
          $run = mysqli_query($con,$query);
          if(mysqli_num_rows($run) > 0){
              $row = mysqli_fetch_array($run);
                $id = $row['id'];
                $date = getdate($row['date']);
                $day = $date['mday'];
                $month = $date['month'];
                $year =  $date['year'];  
                $title = $row['title'];
                $author = $row['author'];
                $author_image = $row['author_image'];
                $image = $row['image'];
                $category = $row['category'];
                $post_data = $row['post_data'];
                
              
          }
        else{
            header('location: index.php');
        }
    }
    ?>
    <div class="jumbotron">
        <div class="container">
            <div id="details" class="animated fadeInLeft">
                <h1>Custom <span>Posts</span></h1>
                <p>This is an online tutorial.So now you can enjoy</p>
                
            </div>
        </div>
        <img src="img/top-image.jpg" alt="Top Image">
    </div>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="post">
                        <div class="row">
                            <div class="col-md-2 post-date">
                                <div class="day"><?php echo $day; ?></div>
                                <div class="month"><?php echo $month; ?></div>
                                <div class="year"><?php echo $year; ?></div>
                            </div>
                            <div class="col-md-8 post-title">
                                <a href="post.php?post_id= <?php echo $id; ?>"><h2><?php echo $title; ?></h2></a>
                                <p>writen by: <span><?php echo ucfirst($author); ?></span></p>
                            </div>
                            <div class="col-md-2 profile-picture">
                                <img src="img/<?php echo $author_image; ?>" alt="profile picture" class="img-circle">
                            </div>
                        </div>
                        <a href="img/<?php echo $image; ?>"><img src="img/<?php echo $image; ?>" alt="Post Image"></a>
                        <p class="desc">
                        <?php echo $post_data; ?>                      
                          </p>
                        
                        <div class="bottom">
                            <span class="first"><i class="fa fa-folder"></i><a href="#"><?php echo ucfirst($category); ?></a></span>|
                            <span class="sec"><i class="fa fa-comment"></i><a href="#">Comment</a></span>
                        </div>
                     </div>
                     
                      
                      <div class="related-post">
                          <h3>Related Posts</h3><hr>
                           <div class="row">
                               <?php
                               $r_query = "SELECT * FROM posts WHERE status = 'publish' AND title LIKE '%$title%' LIMIT 3";
                               $r_run = mysqli_query($con,$r_query);
                               while($r_row = mysqli_fetch_array($r_run)){
                                   $r_id = $r_row['id'];
                                   $r_title = $r_row['title']; 
                                   $r_image = $r_row['image'];
                               
                               
                               
                               ?>
                                  <div class="col-sm-4">
                                   <a href="post.php?post_id=<?php echo $r_id; ?>">
                                       <img src="img/<?php echo $r_image; ?>" width="100%" alt="slider one">
                                       <h4><?php echo $r_title; ?></h4>
                                   </a>
                               </div>
                             <?php } ?>
                           </div>
                           </div> 
                           <?php
                           $c_query = "SELECT * FROM comments WHERE status = 'approved' and post_id = $post_id ORDER BY id DESC ";
                           $c_run = mysqli_query($con,$c_query);
                           if(mysqli_num_rows($c_run) > 0){
                               
                           
                    
                    
                            ?>
                            
                            <div class="author">
                        <div class="row">
                          <div class="col-sm-3">
                            <img src="img/<?php echo $author_image; ?>" alt="profile image" class="img-circle">
                          </div>
                          <div class="col-sm-9">
                            <h4><?php echo ucfirst($author); ?></h4>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. </p>
                          </div>     
                        </div>
                    </div> 
                           
                           <div class="comment">
                               <h3>Comments</h3><hr>
                               <?php
                               while($c_row = mysqli_fetch_array($c_run)){
                                    $c_id = $c_row['id']; 
                                    $c_name = $c_row['name']; 
                                    $c_username = $c_row['username']; 
                                    $c_image = $c_row['image']; 
                                    $c_comment = $c_row['comment']; 
                               
                               ?>
                               
                               
                               <div class="row single-comment">
                                   <div class="col-sm-2">
                                       <img src="img/<?php echo $c_image; ?>" alt="profile picture" class="img-circle" width="100%">
                                   </div>
                                   <div class="col-sm-10">
                                       <h4><?php echo ucfirst($c_username); ?></h4>
                                       <p><?php echo $c_comment; ?></p>
                                   </div>
                                   
                               </div>
                               <?php } ?>
                               
                           </div>
                           <?php } ?>
                           
                           <?php
                              if(isset($_POST['submit']))
                              {
                                  $cs_name = $_POST['name'];
                                  $cs_email = $_POST['email'];
                                  $cs_website = $_POST['website'];
                                  $cs_comment = $_POST['comment'];
                                  $cs_date = time();
                                  if(empty($cs_name) or empty($cs_email) or empty($cs_comment)){
                                      $error_msg = "All * fields are required";
                                  }
                                  else{
                                      $cs_query = "INSERT INTO `comments` (`id`, `date`, `name`, `username`, `post_id`, `email`, `website`, `image`, `comment`, `status`) VALUES (NULL, '$cs_date', '$cs_name', 'user', '$post_id', '$cs_email', '$cs_website', 'profile-pic.png', '$cs_comment', 'pending')"; 
                                          
                                      if(mysqli_query($con,$cs_query))
                                          {$msg = "comment submitted and waiting for approval";
                                                  $cs_name = "";
                                                  $cs_email = "";
                                                  $cs_website = "";
                                                  $cs_comment = "";
                                           
                                          }
                                      else{$error_msg = "comment has not be submitted";}
                                      
                                     }
                    
                            }
                    
                           ?>
                           
                           <div class="comment-box">
                               <div class="row">
                                   <div class="col-xs-12">
                                       <form action="" method="POST">
                                          <div class="form-group">
                                          <label for="full-name">Full Name:*</label>
                                          <input type="text" value="<?php if(isset($cs_name)){echo $cs_name; }?>" name = "name" id="full-name" class="form-control" placeholder="Full Name">
                                          </div>
                                          
                                          <div class="form-group">
                                          <label for="email">Email Address:*</label>
                                          <input type="text" name="email" value="<?php if(isset($cs_email)){echo $cs_email; }?>" id="email" class="form-control" placeholder="Email Address">
                                          </div>
                                          
                                          <div class="form-group">
                                          <label for="website">Website:</label>
                                          <input type="text" value="<?php if(isset($cs_website)){echo $cs_website; }?>" name="website" id="website" class="form-control" placeholder="Website">
                                          </div>
                                          
                                          <div class="form-group">
                                          <label for="comment">Comment:</label>
                                          <textarea name="comment" <?php if(isset($cs_email)){echo $cs_email; }?> id="comment" cols="30" rows="10" class="form-control" placeholder="Your comment should be here"></textarea>
                                          </div>
                                          
                                          <input type="submit" name="submit" class = "btn btn-primary" value="Submit comment">
                                          <?php
                                           if(isset($error_msg)){
                                               echo "<span style='color:red' class='pull-right'>$error_msg</span>";
                                           }
                                           else if(isset($msg)){
                                               echo "<span style='color:green' class='pull-right'>$msg</span>";
                                           }
                                           
                                           
                                           ?>
                                          
                                       </form>
                                   </div>
                               </div>
                           </div>
                           

                  

                    <!--       <div class="comment">
                             <h3>Comments</h3><hr>
                              <div class="row">
                                  <div class="col-sm-2">
                                      <img src="img/pp2.jpg" class="img-circle" alt="Profile Picture">
                                  </div>
                                  <div class="col-sm-10">
                                      <h4>Naval Jassi</h4>
                                      <p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>
                                  </div>
                                  <div class="col-sm-2">
                                      <img src="img/pp2.jpg" class="img-circle" alt="Profile Picture">
                                  </div>
                                  <div class="col-sm-10">
                                      <h4>Naval Jassi</h4>
                                      <p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>
                                  </div>
                                  <div class="col-sm-2">
                                      <img src="img/pp2.jpg" class="img-circle" alt="Profile Picture">
                                  </div>
                                  <div class="col-sm-10">
                                      <h4>Naval Jassi</h4>
                                      <p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.</p>
                                  </div>
                              </div>
                          </div>-->

                           
                      
                                             
                          
                           
                             
                </div>
                <div class="col-md-4">
                  <?php include('inc/sidebar.php'); ?>
                </div>
            </div>
        </div>
    </section>
<?php include('inc/footer.php'); ?>
</div>