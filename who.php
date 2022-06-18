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
                    <div class="btnWrapper">
                        <a href="student_index.php" class="btn btn-primary">Student</a>
                        <a href="teacher-signin.php" class="btn btn-success" id="teacherCheck" >Teacher</a>
                    </div>


                </div>
            </div>
 
  <?php include('footer.php');?>

<style>
    #main-menu{
        display: none;
    }
</style>



<div class="modal fade" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Teacher Sign In</h4>
      </div>
      <div class="modal-body">

<!--
form will be here

-->




    </div>
  </div>
</div>



</body>
</html>