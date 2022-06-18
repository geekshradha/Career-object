<?php 
include'header.php';
include 'function.php';
?>
<title>Registeration|TechTrix</title>
<body>
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Register</h2>
                     
					<div class="col-lg-4">
                    <form action="" method="post">
                        <div class="form-group">
                            <label></label>
                            <input type="text" class="form-control" placeholder="Team Name" name="team_name" required />

                            <label></label>
                            <input type="text" class="form-control" placeholder="CO Team ID" name="trix_id" required/>

                            <label></label>
                            <input type="text" class="form-control" placeholder="Name 1" name="name_1" required/>
<!-- 
                            <label></label>
                            <input type="text" class="form-control" placeholder="Name 2" name="name_2"/>

                            <label></label>
                            <input type="text" class="form-control" placeholder="Name 3" name="name_3"/>

                            <label></label>
                            <input type="text" class="form-control" placeholder="Name 4" name="name_4"/>

                            <label></label>
                            <input type="text" class="form-control" placeholder="Name 5" name="name_5"/> -->

                            <label></label>
                            <input type="text" class="form-control" placeholder="96745075XX" name="phone" required/>

                            <label></label>
                            <input type="email" class="form-control" placeholder="someone@something.com" name="email" required/>
                            <br>
                            <input type="submit" class="btn btn-primary" value="Register Team" name="submit"> &nbsp  &nbsp
                            <input type="reset" class="btn btn-info" value="Reset"> 
                    </form>
                        </div>
                       </div>
                    </div>
</body>
<?php
if(isset($_POST['submit']))
insert_student_data($_POST['team_name'],$_POST['trix_id'],
                    $_POST['name_1'],$_POST['name_2'],
                    $_POST['name_3'],$_POST['name_4'],$_POST['name_5'],
                    $_POST['phone'],$_POST['email']);
 include('footer.php');
?>