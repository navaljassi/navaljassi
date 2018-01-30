<div class="body">
 <?php include('inc/top.php'); ?>
  <body>
    <?php include('inc/header.php'); ?>
    
    <div class="jumbotron">
        <div class="container">
            <div id="details" class="animated fadeInLeft">
                <h1>Contact <span>Us</span></h1>
                <p>This is an online tutorial.So now you can enjoy</p>
                
            </div>
        </div>
        <img src="img/top-image.jpg" alt="Top Image">
    </div>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                   <div class="row">
                    <div class="col-md-12"></div>
                    <div class="col-md-12 contact-form">
                       <h2>Contact Form:</h2>
                       <hr>
                        <form action="">
                            <div class="form-group">
                                <Lable for="full-name">Full Name*:</Lable>
                                <input type="text" id="full-name" class="form-control" placeholder="Full name">
                            </div>
                            
                            <div class="form-group">
                                <Lable for="email">Email*:</Lable>
                                <input type="text" id="email" class="form-control" placeholder="Email ">
                            </div>
                            
                            <div class="form-group">
                                <Lable for="website">Website:</Lable>
                                <input type="text" id="website" class="form-control" placeholder="website">
                            </div>
                            
                            <div class="form-group">
                                <Lable for="message">Message:</Lable>
                               <textarea id="message" cols="30" rows="10" class="form-control" placeholder="your message should be here"></textarea>
                            </div>
                            <input type="text" name="submit" value="submit" class="btn btn-primary">
                        </form>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                    <?php include('inc/sidebar.php'); ?>
                </div>
            </div>
        </div>
    </section>
<?php include('inc/footer.php'); ?>
</div>