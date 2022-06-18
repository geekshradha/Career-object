<?php 
include('header.php');
include ('function.php');
$quiz_detail=get_quiz_details($_GET['quiz_id']);
?>
<title>Insert A Question|TechTrix</title>
<body>
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Insert Question</h2>
                        <h4>Quiz ID: <b><?php echo $quiz_detail['quiz_id'];?></b></h4>
                        <h4>Quiz Name: <b><?php echo $quiz_detail['quiz_name'];?></b></h4>
<form action="" method="post" enctype="multipart/form-data">
					<div class="col-lg-6 col-md-6">
                        <div class="form-group">
<form action="" method="post">
                            <label></label>
<p><textarea name="question" rows="10" cols="70" class="form-control" placeholder="Question" required></textarea></p>
                           
                            <label></label>
<p><textarea name="option_1" rows="2" cols="50" class="form-control" placeholder="Option 1" required></textarea></p>

                            <label></label>
<p><textarea name="option_2" rows="2" cols="50" class="form-control" placeholder="Option 2" required></textarea></p>

                            <label></label>
<p><textarea name="option_3" rows="2" cols="50" class="form-control" placeholder="Option 3" required></textarea></p>

                            <label></label>
<p><textarea name="option_4" rows="2" cols="50" class="form-control" placeholder="Option 4" required></textarea></p>

                            <label>File(Code/Images)</label>
                            <input type="file" name="question_file" class="form-control"/>

                            <label>Correct Option</label> 
								<select name="taskOption" class="form-control">
                                  <option value="A" selected>A</option>
                                  <option value="B">B</option>
                                  <option value="C">C</option>
                                  <option value="D">D</option>
                                </select>
                            <br>
                    <input type="submit" class="btn btn-primary" name="submit" value="Create Question"> &nbsp  &nbsp
                    <input type="reset" class="btn btn-info" value="Reset"> &nbsp  &nbsp
                    <a href="question_list.php?quiz_id=<?php echo $quiz_detail['quiz_id'];?>" class="btn btn-danger">EXIT</a>
</form>
                        </div>
                       </div>
                    </div>
                </form>
                   
</body>
<?php 
if(isset($_POST['submit']))
    insert_question($quiz_detail['quiz_id'],$_POST['question'],
    $_POST['option_1'],$_POST['option_2'],$_POST['option_3'],$_POST['option_4'],$_POST['taskOption'],$_FILES);

include('footer.php');?>