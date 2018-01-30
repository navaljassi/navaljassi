  <div class="widgets">
                       <form action="index.php" method="post">
                        <div class="input-group">
                             <input type="text" class="form-control" name="search_title" placeholder="Search for...">
                             
                                <span class="input-group-btn">
                                <input type="submit" value="Go" class="btn btn-default" name= "search">
                              </span>
                        </div><!-- /input-group -->
                            </form>
                    </div><!--widgets close -->
                    
                    <div class="widgets">
                       <div class="popular">
                            <h4>Popular Post</h4>
                            <hr>
                            <?php
                           $p_query = "SELECT * FROM posts WHERE status = 'publish' ORDER BY views DESC";
                           $p_run = mysqli_query($con,$p_query);
                           $p_num = mysqli_num_rows($p_run);
                           if($p_num > 0){
                               while($p_row = mysqli_fetch_array($p_run)){
                                   $p_id = $p_row['id'];
                                   $p_date = getdate($p_row['date']);
                                   $p_day = $p_date['mday'];
                                   $p_month = $p_date['month'];
                                   $p_year = $p_date['year'];
                                   $p_title = $p_row['title'];
                                   $p_image = $p_row['image'];
                            
                           ?>
                            <div class="row">
                                <div class="col-xs-4">
                                    <a href="post.php?post_id=<?php echo $p_id; ?>"><img src="img/<?php echo $p_image; ?>" alt="image 1"></a>
                                </div>
                                <div class="col-xs-8 details">
                                    <a href="post.php?post_id=<?php echo $p_id; ?>"><h6><?php echo $p_title; ?></h6></a>
                                    <p><?php echo "$p_day $p_month $p_year"; ?></p>
                                </div>
                            </div>
                            
                            <?php
                               
                               }
                               } ?>
                            
                            
                            
                            
                        </div>
                        
                        
                        
                    </div><!--widgets close -->
                    
                    <div class="widgets">
                       <div class="popular">
                            <h4>Recent Post</h4>
                            <hr>
                            <?php
                           $r_query = "SELECT * FROM posts WHERE status='publish' ORDER BY id DESC";
                           $r_run = mysqli_query($con,$r_query);
                           $r_num = mysqli_num_rows($r_run);
                           if($r_num > 0){
                               while($r_row = mysqli_fetch_array($r_run)){
                                   $r_id = $r_row['id'];
                                   $r_date = getdate($r_row['date']);
                                   $r_day = $r_date['mday'];
                                   $r_month = $r_date['month'];
                                   $r_year = $r_date['year'];
                                   $r_title = $r_row['title'];
                                   $r_image = $r_row['image'];
                                   
                           ?>
                            <div class="row">
                                <div class="col-xs-4">
                                    <a href="post.php?post_id=<?php echo $r_id; ?>"><img src="img/<?php echo $r_image; ?>" alt="image 1"></a>
                                </div>
                                <div class="col-xs-8 details">
                                    <a href="post.php?post_id=<?php echo $r_id; ?>"><h6><?php echo $r_title; ?></h6></a>
                                    <p><?php echo "$r_day $r_month $r_year"; ?></p>
                                </div>
                            </div>
                            <?php
                           }
                           }
                           else {
                               echo "<h3>No Post Available</h3>";
                           }
                           ?>
                            
                        </div>
                        
                    </div><!--widgets close -->
                
                    <div class="widgets">
                       <div class="popular">
                           <h4>Categories</h4>
                           <hr>
                           <div class="row">
                               <div class="col-xs-6">
                                   <ul>
                                      <?php
                                       
                                       $c_query = "SELECT * FROM categories";
                                       $c_run = mysqli_query($con,$c_query);
                                       if(mysqli_num_rows($c_run) > 0){
                                           while($c_row = mysqli_fetch_array($c_run)){
                                             $c_id = $c_row['id'];
                                             $c_categories = $c_row['category'];
                                             $count = $count + 1;
                                               if(($count % 2) == 1){
                                                echo "<li><a href='index.php?cat=".$id."'>".(ucfirst($c_categories))."</a></li>";   
                                               }
                                               
                                           }
                                       }
                                       else
                                       {
                                           echo "<p>NO CATEGORY</p>";
                                       }
                                       ?>
                                      
                                   </ul>
                               </div>
                               <div class="col-xs-6">
                                    <ul>
                                       <?php
                                       
                                       $c_query = "SELECT * FROM categories";
                                       $c_run = mysqli_query($con,$c_query);
                                       if(mysqli_num_rows($c_run) > 0){
                                           while($c_row = mysqli_fetch_array($c_run)){
                                             $c_id = $c_row['id'];
                                             $c_categories = $c_row['category'];
                                             $count = $count + 1;
                                               if(($count % 2) == 0){
                                                echo "<li><a href='index.php?cat=".$id."'>".(ucfirst($c_categories))."</a></li>";   
                                               }
                                               
                                           }
                                       }
                                       else
                                       {
                                           echo "<p>NO CATEGORY</p>";
                                       }
                                       ?>
                                   </ul>
                               </div>
                           </div>
                       </div>

                    </div><!--widgets close -->
                    
                     <div class="widgets">
                       <div class="categories">
                           <h4>Social Icons</h4>
                           <hr>
                           <div class="row">
                               <div class="col-xs-4 yes">
                                   <a href="#"><img src="img/fb.png" alt="facebook" width="80px"></a>
                               </div>
                               <div class="col-xs-4">
                                  <a href="#"><img src="img/googleplus.png" alt="googleplus" width="40px"></a> 
                               </div>
                               <div class="col-xs-4">
                                   <a href="#"><img src="img/LinkedIn.png" alt="likedin" width="50px"></a>
                               </div>
                               
                           </div>
                           
                            <div class="row">
                               <div class="col-xs-4">
                                   <a href="#"><img src="img/skype.png" alt="skype" width="50px"></a>
                               </div>
                               <div class="col-xs-4">
                                  <a href="#"><img src="img/twitter.png" alt="twiter" width="50px"></a> 
                               </div>
                               <div class="col-xs-4">
                                   <a href="#"><img src="img/youtube.png" alt="youtube" width="50px"></a>
                               </div>
                               
                           </div>
                       </div>

                    </div><!--widgets close -->