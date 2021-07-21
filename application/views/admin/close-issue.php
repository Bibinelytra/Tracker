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


</head>
<body>

<div class="container">
  <div class="row" style="background:white;box-shadow: 0px 0px 15px rgb(0 0 0 / 8%); margin-top:8rem; ">
   <form method="post" action="<?php echo base_url('Projects/changeIssueStatus/'.$id); ?>">
     
      <div class="col-md-12 project-add-div" style="padding:50px;">

<?php 

$issues = $this->db->where('iss_id',$id)->get('issues')->row(); ?>

        <h4>Issue</h4> <br>

        <div class="form-group">
        <label>Tracker:</label>   
         
         <label><?php echo $issues->iss_tracker; ?></label>
         <?php echo form_error('tracker'); ?>
        </div>



        <div class="form-group">
        <label>Description:</label>   
        <label><?php echo $issues->iss_description; ?></label>
       </div>



       <button class="btn btn-danger" type="submit">Close Issue</button>
       <a href="<?php echo base_url('projects-list'); ?>">Go Back</a>
          <br><br>



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
    
<?php } ?>  
        
      </div>

   </form>                     
    </div>
</div>

</body>
</html>