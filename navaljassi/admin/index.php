<!DOCTYPE html>
<html lang="en">

 <?php 
    
include('inc/top.php'); 
    
if(!isset($_SESSION['username']))
{
    header("location: login.php");   
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
                       <h1><i class="fa fa-tachometer"></i> Dashboard <small>Statistics overview</small></h1><hr>
                      <ol class="breadcrumb">
                      <li class="active"><i class="fa fa-tachometer"></i> Dashboard</li>
                      </ol>
                      <div class="row tag-boxes">
                          <div class="col-md-6 col-lg-3">
                             <div class="panel panel-primary">
                                 <div class="panel-heading">
                                     <div class="row">
                                         <div class="col-xs-3">
                                              <i class="fa fa-comment fa-5x"></i>
                                         </div>
                                         <div class="col-xs-9">
                                             <div class="text-right huge">11</div>
                                             <div class="text-right">New Comments</div>
                                         </div>
                                     </div>
                                 </div>
                                 <a href="#">
                                     <div class="panel-footer">
                                         <span class="pull-left">View all comments</span>
                                         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                         <div class="clearfix"></div>
                                     </div>
                                 </a>
                             </div>

                          </div>

                          <div class="col-md-6 col-lg-3">
                             <div class="panel panel-red">
                                 <div class="panel-heading">
                                     <div class="row">
                                         <div class="col-xs-3">
                                              <i class="fa fa-file-text fa-5x"></i>
                                         </div>
                                         <div class="col-xs-9">
                                             <div class="text-right huge">18</div>
                                             <div class="text-right">All Posts</div>
                                         </div>
                                     </div>
                                 </div>
                                 <a href="#">
                                     <div class="panel-footer">
                                         <span class="pull-left">View all posts</span>
                                         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                         <div class="clearfix"></div>
                                     </div>
                                 </a>
                             </div>

                          </div>

                          <div class="col-md-6 col-lg-3">
                             <div class="panel panel-yellow">
                                 <div class="panel-heading">
                                     <div class="row">
                                         <div class="col-xs-3">
                                              <i class="fa fa-users fa-5x"></i>
                                         </div>
                                         <div class="col-xs-9">
                                             <div class="text-right huge">30</div>
                                             <div class="text-right">All Users</div>
                                         </div>
                                     </div>
                                 </div>
                                 <a href="#">
                                     <div class="panel-footer">
                                         <span class="pull-left">View all users</span>
                                         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                         <div class="clearfix"></div>
                                     </div>
                                 </a>
                             </div>

                          </div>

                          <div class="col-md-6 col-lg-3">
                             <div class="panel panel-green">
                                 <div class="panel-heading">
                                     <div class="row">
                                         <div class="col-xs-3">
                                              <i class="fa fa-folder-open fa-5x"></i>
                                         </div>
                                         <div class="col-xs-9">
                                             <div class="text-right huge">11</div>
                                             <div class="text-right">All categories</div>
                                         </div>
                                     </div>
                                 </div>
                                 <a href="#">
                                     <div class="panel-footer">
                                         <span class="pull-left">View all categories</span>
                                         <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                         <div class="clearfix"></div>
                                     </div>
                                 </a>
                             </div>
                          </div>
                      </div><hr>


                      <h3>New Users</h3>
                      <table class="table table-hover table-striped">
                          <thead>
                              <tr>
                                  <th>Sr #</th>
                                  <th>Date</th>
                                  <th>Name</th>
                                  <th>Username</th>
                                  <th>Role</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>25 Dec 2016</td>
                                  <td>Muhammad babar </td>
                                  <td>babar786</td>
                                  <td>Admin</td>
                              </tr>

                              <tr>
                                  <td>1</td>
                                  <td>25 Dec 2016</td>
                                  <td>Muhammad babar </td>
                                  <td>babar786</td>
                                  <td>Admin</td>
                              </tr>

                              <tr>
                                  <td>1</td>
                                  <td>25 Dec 2016</td>
                                  <td>Muhammad babar </td>
                                  <td>babar786</td>
                                  <td>Admin</td>
                              </tr>

                              <tr>
                                  <td>1</td>
                                  <td>25 Dec 2016</td>
                                  <td>Muhammad babar </td>
                                  <td>babar786</td>
                                  <td>Admin</td>
                              </tr>

                              <tr>
                                  <td>1</td>
                                  <td>25 Dec 2016</td>
                                  <td>Muhammad babar </td>
                                  <td>babar786</td>
                                  <td>Admin</td>
                              </tr>

                              <tr>
                                  <td>1</td>
                                  <td>25 Dec 2016</td>
                                  <td>Muhammad babar </td>
                                  <td>babar786</td>
                                  <td>Admin</td>
                              </tr>
                          </tbody>
                      </table>
                      <a href="#" class="btn btn-primary">View all users</a><hr>
                      <h3>New Posts</h3>
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>sr #</th>
                                  <th>Date</th>
                                  <th>Post Title</th>
                                  <th>Category</th>
                                  <th>Views</th>
                              </tr>
                          </thead>

                          <tbody>
                              <tr>
                                  <td>1</td>
                                  <td>25 dec 2016</td>
                                  <td>Learn php project full</td>
                                  <td>Video Tutiorial</td>
                                  <td><i class="fa fa-eye"></i> 28</td>
                              </tr>

                              <tr>
                                  <td>1</td>
                                  <td>25 dec 2016</td>
                                  <td>Learn php project full</td>
                                  <td>Video Tutiorial</td>
                                  <td><i class="fa fa-eye"></i> 28</td>
                              </tr>

                              <tr>
                                  <td>1</td>
                                  <td>25 dec 2016</td>
                                  <td>Learn php project full</td>
                                  <td>Video Tutiorial</td>
                                  <td><i class="fa fa-eye"></i> 28</td>
                              </tr>

                              <tr>
                                  <td>1</td>
                                  <td>25 dec 2016</td>
                                  <td>Learn php project full</td>
                                  <td>Video Tutiorial</td>
                                  <td><i class="fa fa-eye"></i> 28</td>
                              </tr>

                              <tr>
                                  <td>1</td>
                                  <td>25 dec 2016</td>
                                  <td>Learn php project full</td>
                                  <td>Video Tutiorial</td>
                                  <td><i class="fa fa-eye"></i> 28</td>
                              </tr>

                              <tr>
                                  <td>1</td>
                                  <td>25 dec 2016</td>
                                  <td>Learn php project full</td>
                                  <td>Video Tutiorial</td>
                                  <td><i class="fa fa-eye"></i> 28</td>
                              </tr>
                          </tbody>
                      </table>
                      <a href="#" class="btn btn-primary">View all users</a>
                   </div>
               </div>
           </div>

           <?php include('inc/footer.php'); ?>
     