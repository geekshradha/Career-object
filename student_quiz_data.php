<?php 
include('header.php');
include('function.php');
$quiz_detail=get_quiz_details($_GET['quiz_id']);
?>
<title>Student List|TechTrix</title>
<body>
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Results Data</h2>
                        <h3>Quiz ID: <?php echo $quiz_detail['quiz_id'];?></h3>
                        <h3>Quiz Name: <?php echo $quiz_detail['quiz_name'];?></h3>

                       <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Marks</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                </tr>
                            </thead>
                          <?php
                              $sql="select * from quiz_data where quiz_id=".$quiz_detail['quiz_id']." order by marks desc";
                              foreach ($GLOBALS['db']->query($sql) as $row) 
                              {
                          ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['trix_id'];?></td>
                                    <td><?php echo $row['marks'];?></td>
                                    <td><?php echo $row['start_time'];?></td>
                                    <td><?php echo $row['end_time'];?></td>
                                </tr>
                            </tbody>
                           <?php }?> 
                        </table>
                 

                    </div>
                   </div>
              </div>                   
</body>
<?php include('footer.php');?>