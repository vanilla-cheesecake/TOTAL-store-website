
<?php

include '../midterm/php/connect.php';
include 'header.php';


?>


<h2>MY <b>PROFILE</b></h2>


<hr>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1><?php echo strtoupper($_SESSION['name']); ?> <?php echo strtoupper($_SESSION['lastname']); ?></h1></div>
    	<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
      
     
        
        

      </div></hr><br>

               
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://svcc.com">svcc.com</a></div>
          </div>
       
  
        </div><!--/col-3-->
    	<div class="col-sm-9">
           
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="##" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="<?php echo strtoupper($_SESSION['name']); ?>" title="enter your first name if any.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="<?php echo strtoupper($_SESSION['lastname']); ?>" title="enter your last name if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>Age</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="<?php echo strtoupper($_SESSION['age']); ?>" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      
                      
              	</form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



    <?php
        include '../midterm/html/footer.html';
    ?>