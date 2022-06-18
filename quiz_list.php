<?php 
include 'header.php';
include 'function.php';
?>
<title>Quiz List|TechTrix</title>
<body>
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Quiz List</h2>
          <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Quiz ID</th>
                                    <th>Quiz Name</th>
                                    <th>Total Question in Database</th>
                                    <th>Questions per Set</th>
                                  	<th>Time Allocated(in secs)</th>
                                  	<th>Positive Marking</th>
                                  	<th>Negative Marking</th>
                                  	<th></th>
                                  	<th></th>
                                    <th></th>
                                  	<th></th>
                                </tr>
                            </thead>
                          <?php 
                          $sql = "Select * from create_quiz";
                          $key=0;
                          foreach($GLOBALS['db']->query($sql) as $row){
                          $key++;
                          if($row['status']==0)
                              {$x="btn btn-danger";$status="DEACTIVATED";}
                          else
                              {$x="btn btn-success";$status="ACTIVATED";}
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['quiz_id']?></td>
                                    <td><?php echo $row['quiz_name']?></td>
                                    <td><?php echo $row['total_ques']?></td>
                                    <td><?php echo $row['display_ques']?></td>
                                    <td><?php echo $row['time_allocated']?></td>
                                    <td><?php echo $row['for_right']?></td>
                                    <td><?php echo $row['for_wrong']?></td>
<td><center><a href="question_list.php?quiz_id=<?php echo $row['quiz_id'];?>" class="btn btn-info"><i class="fa fa-search"> VIEW</i></a></center></td>
<td><center><a href="student_quiz_data.php?quiz_id=<?php echo $row['quiz_id'];?>" class="btn btn-default"><i class="fa fa-table"> STATS</i></a></center></td>
<td><center><a href="delete_quiz.php?quiz_id=<?php echo $row['quiz_id'];?>"><button type="button" class="btn btn-danger" data-toggle="modal"<?php echo "data-target=\"#del".$key."\""; ?>><i class="fa fa-trash-o"> DELETE</i></center></td>
<!--Button to change the status of the quiz-->
<td><center><a href="change_quiz_status.php?quiz_id=<?php echo $row['quiz_id'];?>"><button type="button" class="<?php echo $x;?>" data-toggle="modal"<?php echo "data-target=\"#del".$key."\""; ?>><?php echo $status;?></center></td>

<!--modal content for Delete the question-->
<div class="modal fade" role="dialog" <?php echo "id=\"del".$key."\""; ?>>
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Workinggggggg.........</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
                                </tr>
                            </tbody>
                           <?php }?> 
                        </table>
                 

                    </div>
                   </div>
              </div>                   
</body>
<?php include('footer.php');?>