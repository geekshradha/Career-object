<?php 
    include 'header.php';
    include 'function.php';
?>
<title>Create Quiz|Career Object</title>
<body>
        <div id="page-wrapper" >
          <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Create Quiz</h2>
                     
					<div class="col-lg-6">
                        <div class="form-group">
                        <form action="" method="post">
                            <label></label>
                            <input type="text" class="form-control" name="quiz_name" placeholder="Quiz Name" required/>
                             
                             <label></label>
            <input type="text" class="form-control" name="created_by" placeholder="Quiz Id"/>

                            <label></label>
            <input type="text" class="form-control" name="total_ques" placeholder="Total Number of Question in the set" required/>

                            <label></label>
            <input type="text" class="form-control" name="time_allocated" placeholder="Time Allocated(in secs)" required/>

                            <label></label>
            <input type="text" class="form-control" name="for_right" placeholder="+ve marks for correct question"/>

                            <label></label>
            <input type="text" class="form-control" name="for_wrong" placeholder="-ve marks for wrong answer"/>
                            
                           <label></label>
<p><textarea name="instruction" rows="2" cols="50" class="form-control" placeholder="Instruction" required></textarea></p>

                            <label></label> 
                                <select name="status" class="form-control">
                                  <option value="0" selected>Quiz Inactive</option>
                                  <option value="1">Quiz Active</option>
                                </select>

                            <br>
                            <input type="submit" class="btn btn-primary" name="submit" value="Create Quiz"> &nbsp  &nbsp
                            <input type="reset" class="btn btn-info" value="Reset"> 
                        </form>
                        </div>
                       </div>
                    </div>
</body>
<?php 
if(isset($_POST['submit']))
    create_quiz($_POST['quiz_name'],
                    $_POST['total_ques'],
                        $_POST['time_allocated'],
                            $_POST['for_right'],
                                $_POST['for_wrong'],
                                    $_POST['status'],
                                        $_POST['created_by'],
                                            $_POST['instruction']);
include('footer.php');
?>