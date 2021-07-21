<!DOCTYPE html>
<html>
<head>
  <title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
<link rel="stylesheet" href="<?php echo THEME_URL; ?>assets/css/style.css">


</head>
<body>





<div class="card1">


  <?php  if($this->session->flashdata('success')) {  ?>
 
 
  <div class="alert alert-success"> 
    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none">&times;</a>
    <i class="fa fa-check"></i> 
    <?php  
    echo $this->session->flashdata('success'); ?>
  </div>

<?php } else if($this->session->flashdata('error')) { ?>
 
     <div class = "alert alert-warning">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none">&times;</a>
     <i class="fa fa-window-close" aria-hidden="true"></i>
      <?php 
      echo $this->session->flashdata('error'); ?>
    </div>
    
<?php } ?>  <br>


   <form method="post" action="<?php echo base_url('authenticate'); ?>">
      <h4 class="title">BUG TRACKING SYSTEM</h4> <br>

      <div class="social-login">
            
      </div>


      <div class="email-login">
         <label for="username"> <b>Username</b></label>
         <input type="text" placeholder="Enter Username" name="username" required>
         <label for="psw"><b>Password</b></label>
         <input type="password" placeholder="Enter Password" name="password" required>
      </div>
      <button class="cta-btn">Log In</button>
   </form>
</div>


</body>
</html>
