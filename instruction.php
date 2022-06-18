<?php 
session_start();
include 'function.php';
if(!isset($_SESSION['trix_id']))
	header('location:student_index.php');
$quiz_detail=get_quiz_details($_GET['quiz_id']);
include('links.php');
?>
<title>Instruction|TechTrix</title>
<br>
<br>
<div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <center>CARRER OBJECT</center>
                            </div>
                            <div class="panel-body">
                                <center><h3>WELCOME!!</h3></center>
								<p><b>Team ID: </b><?php echo $_SESSION['trix_id'];?></p>
								<p><b>Quiz ID:</b><?php echo $quiz_detail['quiz_id'];?></p>
								<p><b>Quiz Name:</b><?php echo $quiz_detail['quiz_name'];?></p>
								<p><b>Created By:</b><?php echo $quiz_detail['created_by'];?></p>
								<p><b>Total Questions:</b><?php echo $quiz_detail['display_ques'];?></p>
								<p><b>Time allocated(in secs):</b><?php echo $quiz_detail['time_allocated'];?></p>
								<p><b>Points for each correct answer:</b><?php echo $quiz_detail['for_right'];?></p>
								<p><b>Points for each wrong answer:</b>-<?php echo $quiz_detail['for_wrong'];?></p>
								<p><b>Instructions:</b></p><?php echo $quiz_detail['instruction'];?>
								<center><h4>ALL THE BEST</h4></center>
								<center><a href="attempt_quiz.php?trix_id=<?php echo $_SESSION['trix_id'];?>&&quiz_id=<?php echo $_GET['quiz_id'];?>""><button type="button" class="btn btn-success">START</button></a></center>
							</div>
                            </div>
                            <div class="panel-footer">
                                Created by SHRADHA
                            </div>
                        </div>
                   </div>