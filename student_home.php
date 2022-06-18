<?php
include 'links.php';
include 'function.php';

session_start();
if(!isset($_SESSION['trix_id']))
	header('location:student_index.php');
?>
<head>
<title> <?php echo $_SESSION['trix_id'] ?></title></head>
<center><h2>List of activated quiz</h2></center>
<div class="col-lg-12">
<table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Quiz ID</th>
                                    <th>Quiz Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                          <?php
                              $sql="select * from create_quiz where status=1";
                              foreach ($GLOBALS['db']->query($sql) as $row) 
                              {
                          ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['quiz_id'];?></td>
                                    <td><?php echo $row['quiz_name'];?></td>
<td><a href="instruction.php?trix_id=<?php echo $_SESSION['trix_id'];?>&&quiz_id=<?php echo $row['quiz_id'];?>"><button type="button" class="btn btn-btn-success">ATTEMPT QUIZ</button></a></td>
                                </tr>
                            </tbody>
                           <?php }?> 
                        </table>
                    </div>
                   </div>
              </div>
			  </div>
			  