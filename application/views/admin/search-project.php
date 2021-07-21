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
  <div class="row d-flex align-items-center">



  <div class="col-md-4 d-inline-block">
     <a class="btn btn-primary white" href="<?php echo base_url('add-project'); ?>" style="color:white; float-right;"><i class="icon-expand-alt"></i>

   Create Project</a>
  </div>



  <div class="col-md-6 d-inline-block">
    
     <form class="example" method="post" action="<?php echo base_url('search-project'); ?>" style="margin:auto;max-width:300px;margin-top:15px;">
      <input type="text" placeholder="Search Project" name="keyword">
     <button type="submit"><i class="fa fa-search" aria-hidden="true"></i>
</i></button>
    </form>
  </div> 
    
  </div>
  </div>



 
 
  <div class="row">
                            <!-- [ sample-page ] start -->
                           
                           <div class="col-lg-1"></div>
                            <div class="col-lg-7">
                         <a href="<?php echo base_url('projects-list') ?>">Go to projects</a> 
 
                      <?php if($projects) { ?>
                        
                        <?php foreach ($projects as $key => $value) {    
                        ?>
                       

                                <div class="card">
                                    <div class="card-header">
                                        <h5><?php echo $value->pro_name;  ?></h5>
                                      
                                    </div>
                                    <div class="card-body">
                                      <p><?php echo $value->pro_description; ?></p>
                                    </div>
                                </div>


                     <?php } } else { ?>

                    
                      <?php echo "No Projects match your search";  } ?>

                            </div>
                            <!-- [ sample-page ] end -->
                        </div>


</body>
</html>
