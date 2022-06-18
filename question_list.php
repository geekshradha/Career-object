<?php 
include('header.php');
include ('function.php');
$quiz_detail=get_quiz_details($_GET['quiz_id']);
$key=0;
?>
<title>Question List|TechTrix</title>
<body>
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Question List</h2>
                        <h4>Quiz ID: <b><?php echo $quiz_detail['quiz_id'];?></b></h4>
                        <h4>Quiz Name: <b><?php echo $quiz_detail['quiz_name'];?></b>
                        <a href="insert_answer.php?quiz_id=<?php echo $quiz_detail['quiz_id'];?>" class="btn btn-primary">ADD</a></h4>
                       <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Question ID</th>
                                    <th>Question</th>
                                  	<th></th>
                                  	<th></th>
                                </tr>
                            </thead>
                          <?php 
                            $sql="select * from ques where quiz_id=".$quiz_detail['quiz_id'];
                            $key=0;
                            foreach($GLOBALS['db']->query($sql) as $row)
                            {
                               $key++;
                          ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['ques_id'];?></td>
                                    <td><?php echo $row['ques'];?></td>
<td><center><button type="button" class="btn btn-primary" data-toggle="modal" <?php echo "data-target=\"#view".$key."\""; ?>><i class="fa fa-search"> VIEW</i></center></td>

<!-- Modal content for viewing the question-->
<div class="modal fade" role="dialog" <?php echo "id=\"view".$key."\""; ?>>
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Question Detail</b></h4>
        </div>
        <div class="modal-body">
          <p><?php $ques_detail=get_question_detail($row['ques_id'],$quiz_detail['quiz_id']);?></p>
          <?php 
            echo $ques_detail['ques']."<br> CORRECT OPTION: ".$ques_detail['correct_option']."<br>";
            $pic='Ques_file/'.$ques_detail['file_name'];?>
            <center><img src="<?php echo $pic;?>" style="width:500px;height:300px;"></center>
            <?php
            $sql_1="SELECT option_id,answer from ans where ques_id=".$row['ques_id']." and quiz_id=".$quiz_detail['quiz_id'];
            foreach($GLOBALS['db']->query($sql_1) as $row_1)
            {?>
            <p><?php echo $row_1['option_id']."  ".$row_1['answer'];?></p>
            <?php }?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
<td><center><a href="delete_ques.php?ques_id=<?php echo $row['ques_id'];?>&&quiz_id=<?php echo $quiz_detail['quiz_id'];?>"><button type="button" class="btn btn-danger" data-toggle="modal"<?php echo "data-target=\"#del".$key."\""; ?>><i class="fa fa-trash-o"> DELETE</i></center></td>

<!--modal content for Delete the question-->
<div class="modal fade" role="dialog" <?php echo "id=\"del".$key."\""; ?>>
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Question is being deleted!!</p>
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





  <!-- Modal content-->
<div class="modal fade" id="ed" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 