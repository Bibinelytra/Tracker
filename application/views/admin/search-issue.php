<!DOCTYPE html>
<html>
<head>
  <title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo THEME_URL; ?>assets/css/style.css">


<style type="text/css">
  input[type="text"],
input[type="password"] {
  padding: 15px 20px;
  margin-top: 8px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-sizing: border-box;
}
</style>
</head>
<body>

<div class="container">

    <a style="float:right;" href="<?php echo base_url('logout'); ?>">Logout</a>

  <div class="row d-flex align-items-center">


<div class="col-md-3 d-inline-block">
     <a class="btn btn-danger white" href="<?php echo base_url('close-project/'.$projects->pro_id); ?>" style="color:white; float-right;margin:20px;"><i class="icon-expand-alt"></i>

   Close Project</a>
  </div>

<div class="col-md-3 d-inline-block">
     <a class="btn btn-primary white" href="<?php echo base_url('create-issue/'.$projects->pro_id); ?>" style="color:white; float-right;"><i class="icon-expand-alt"></i>

   Create Issue</a>
  </div>
  



  <div class="col-md-12 d-inline-block">
    
     <form class="example" method="post" action="<?php echo base_url('search-issue/'.$projects->pro_id); ?>" style="margin:auto;margin-top:15px;">
    

      <select class="form-control" name="tracker">
    <option value="bug">Bug</option>
  <option value="feature">Feature</option>
      </select>

     <select class="form-control" name="status">
  <option value="0">Closed</option>
  <option value="1">Open</option>
      </select>

      <input type="text" placeholder="Search Issue" name="keyword">
     <button type="submit"><i class="fa fa-search" aria-hidden="true"></i>
</i></button>
    </form>
  </div> 
    
  </div>
  </div>


 <div style="margin: 0 auto; text-align: center; background: bisque;padding: 5px;margin-bottom: 15px;}">

<h3><?php echo $projects->pro_name; ?></h3>
 <p><?php echo $projects->pro_description; ?></p>

</div>

 
 
  <div class="row">
                            <!-- [ sample-page ] start -->
                           
                           <div class="col-lg-1"></div>
                            <div class="col-lg-10">
    <a href="<?php echo base_url('projects-list') ?>">Go to projects</a> 

                        
                       <?php 
                       
                       $i = 0;

                       if($issues){
                       foreach ($issues as $key => $value) { 
                     
                       $i++;
                        ?>


            <?php $status = $value->status; ?>             

                                <div class="card">
                                    <div class="card-header">
                                      
                                      <span>#<?php echo $i; ?></span> 

                                      <span style="float:right; background:#e8d5d5; color:black; padding:10px;">   <?php if($status == '1') { echo 'Open'; } else { echo 'Closed' ;} ?></span>
                                        <h5><?php echo $value->iss_tracker;  ?></h5>
                                      
                                    </div>
                                    <div class="card-body">
                                      <p><?php echo $value->iss_description; ?></p>
                                   
                                   <?php if($status == '1') { ?>
                                      <a href="<?php echo base_url('close-issue/'.$value->iss_id); ?>" class="btn btn-danger" style="float: right;">Close</a>

                                   <?php } else { ?>

                                       <a class="btn btn-success" style="float: right; color:white;">closed</a>

                                   <?php }   ?>

                                   

                                    </div>
                                </div>


                     <?php  }  } else {?>


                              <p>Nothing Found on Search...</p>
                                 
                                   <?php } ?>

                            </div>
                            <!-- [ sample-page ] end -->
                        </div>


</body>
</html>
