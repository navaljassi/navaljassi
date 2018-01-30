<?php
$session_username = $_SESSION['username'];


?>
             

             <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.php">Babar786</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                  <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="profile.php">Welcome:<i class="fa fa-user"></i><?php echo $session_username;?></a></li>
                    <li><a href="add-post.php"><i class="fa fa-plus-square"></i> Add post</a></li>
                    <li><a href="add-user.php"><i class="fa fa-user-plus"></i> Add user</a></li>  
                    <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>

                  </ul>
                </div>
              </div>
            </nav>