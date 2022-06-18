<?php 

include('links.php');
include('function.php');

?>
<title>Teacher login |Career Object</title>
</head>     
    <div id="wrapper">
         <div class="navbar navbar-fixed-top" style="background-color: #594988;">
            <div class="adjust-nav">
                <span class="logout-spn" >
                  <a href="#" style="color:#fff;">
          <img src="assets/img/cologo.png" style="max-width: 240px;">
          </a>  
                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                
            </div>
        </nav>


<div id="page-wrapper" >
            <div id="page-inner">
                <div class="container-fluid">



<form action="" method="post">
            <div class="row">
                    <div class="col-lg-12">
                        
                        <div class="form-group">
                            <label>Id</label>
                            <input type="text" class="form-control" placeholder="Teacher Id" name="teacherId" />

                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Tacher Name" name="teacherSname" />

                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="teacherPass"/>

                            <br>
                            
                    
                    </div>
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" value="Sign In" name="teacherSignIn"> &nbsp;  &nbsp;
        <input type="reset" class="btn btn-info" value="Reset"> 
      </div>
      </form>



      <?php
if(isset($_POST['teacherSignIn']))
    {
        teacher_login_check($_POST['teacherId'],$_POST['teacherPass']);
        //echo $_SESSION['teacherLogged'];
        

         
        
     }
?>


                </div>
            </div>
 

<style>
  #page-wrapper{
    margin: 0;
  }
</style>

</body>
</html>