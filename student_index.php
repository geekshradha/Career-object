<?php 
    include 'links.php';
    include'function.php';
    session_start();
?>
<title>Participant Login|TechTrix</title>
<body>
	<center>
        
                    <div class="col-md-12">
                    <h2>Participant Login</h2>
                     
					<div style="width:300px;">
                        <div class="form-group" style="color:#fff;">
                        <form action="" method="post">
                       <label></label>
                      <input type="text" class="form-control" name="trix_id" placeholder="Unique Techtrix Team ID" required/>

                            <label></label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required/>
                            <br>
                            <input type="submit" class="btn btn-info" name="submit" value="Login"/>
                            <input type="reset"  class="btn btn-default" value="Reset"/>
                        </form>
                    </div> 

                    <a href="#" class="btn btn-info" id="registerBtn" data-toggle="modal" data-target="#myModal">Register</a>                
      <center>
</body>

<?php
if(isset($_POST['submit']))
    {
        $_SESSION['trix_id']=student_login_check($_POST['trix_id'],$_POST['password']);
        header('location:student_home.php');
    }
?>



<!-- modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register</h4>
      </div>
      <div class="modal-body">

            <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="post">
                        <div class="form-group">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Team Name" name="team_name" required />

                            <label></label>
                            <input type="text" class="form-control" placeholder="CO Team ID" name="trix_id" required/>

                            <label></label>
                            <input type="text" class="form-control" placeholder="Name 1" name="name_1" required/>

                            <label></label>
                            <input type="text" class="form-control" placeholder="96745075XX" name="phone" required/>

                            <label></label>
                            <input type="email" class="form-control" placeholder="someone@something.com" name="email" required/>
                            <br>
                            
                    
                    </div>
            </div>




      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Register Team" name="submit1"> &nbsp;  &nbsp;
        <input type="reset" class="btn btn-info" value="Reset"> 
      </div>
      </form>
    </div>
  </div>
</div>

<?php
if(isset($_POST['submit1']))
insert_student_data($_POST['team_name'],$_POST['trix_id'],
                    $_POST['name_1'],$_POST['name_2'],
                    $_POST['name_3'],$_POST['name_4'],$_POST['name_5'],
                    $_POST['phone'],$_POST['email']);

                    ?>