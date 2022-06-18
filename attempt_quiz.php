<?php
session_start();
if(!isset($_SESSION['trix_id']))
	header('location:student_index.php');
include 'function.php';
include 'links.php';
$quizId=$_GET['quiz_id'];
$trix_id=$_SESSION['trix_id'];
$quiz_detail=get_quiz_details($quizId);

$attempt=attempt_check($trix_id,$quizId);
if($attempt==1){
	?><script>
	alert("You have already attempted this quiz!");
	location.href="success.php";
	</script>
<?php }?>
<title><?php echo $quiz_detail['quiz_name'];?></title>
<head>
	<style>
    body{
        background:#DCD8CF;
    }
	p  {color: white;
	font-size:15px;}
    .deck{
        margin-left: auto;
		margin-right: auto;
        width:90%;
		padding:20px;
		height:600px;
		margin-top:20px;
		margin-bottom:20px;
        background:#282827;
        /*#dadfe1*/
    }
	.ques{
	font-size:16px;
	color:white;}
	.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button1 {
    background-color: white; 
    color: black; 
    border: 5px solid #DAA520;
}
</style>
</head>

<script type="text/javascript">
function myFunction() {
	var time=<?php echo $quiz_detail['time_allocated'];?>;
    setTimeout(function(){document.getElementById('but').click();}, 1000*time);
}

var seconds_left =<?php echo $quiz_detail['time_allocated'];?>;
var interval = setInterval(function() {
    document.getElementById('timer_div').innerHTML =Math.floor((--seconds_left)/60)+" : "+(seconds_left%60);

}, 1000);

var myRadios = document.getElementById("re");
var setCheck;
var x = 0;
for(x = 0; x < myRadios.length; x++){
 
        myRadios[x].onclick = function(){
            if(setCheck != this){
                 setCheck = this;
            }else{
                this.checked = false;
                setCheck = null;
        }
        };
 document.getElementById('re').checked = false;
 
}

</script>

    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <span class="logout-spn" >
                  <p id='timer_div' style="color:#DAA520;font-size:20px;"></p>
                </span>
                <br>
                <p style="padding-left:10px; text-align: left; font-size:20px;"><?php echo $quiz_detail['quiz_name'];?></p>
                <p style="text-align: center; font-size:20px;"><?php echo "Team ID: ".$trix_id;?></p>
            </div>
        </div>

<br><br><br>
<body onload="javascript:myFunction();">
<?php

$sql="select min(ques_id), max(ques_id)from ques where quiz_id=$quizId";
foreach ($GLOBALS['db']->query($sql) as $row) {
		$min_ques_id=$row['min(ques_id)'];
		$max_ques_id=$row['max(ques_id)'];
	}

?>
<form action="" method="post">
<?php
$key=0;
for($i=$min_ques_id;$i<=$max_ques_id;$i++)
{		
		$key++;
		?><div class="deck"><?php
		$sql_1="select ques,file_name from ques where ques_id=$i";
		foreach($GLOBALS['db']->query($sql_1)as $row)
		{
			?><div style="float:left;">
			<div class="ques">
			<?php echo "<p>".$key.".";
			echo " ".$row['ques'].'</p><br>';?></div>
			<?php $sql_2="select option_id,answer from ans where ques_id=$i and quiz_id=$quizId";
			foreach($GLOBALS['db']->query($sql_2)as $row)
			{
				?><p><?php echo $row['option_id'].") <input type='radio' name=q".$i." value=".$row['option_id']." id='re'>";
				echo "    ".$row['answer']."      ";
				echo "</input>";
			}?></div>
			<?php
			$ques_detail=get_question_detail($i,$quizId); 
            $pic='Ques_file/'.$ques_detail['file_name'];
            if(file_exists($pic))
            {
            ?>
<div style="float:right;"><img alt="" style="width:300px;height:200px;" src="<?php echo $pic;?>"/>
			<center><button type="button" class="btn btn-primary" data-toggle="modal" <?php echo "data-target=\"#ed".$i."\""; ?>>View</button></center>
			<?php 
			}
			?>
<div class="modal fade" role="dialog" <?php echo "id=\"ed".$i."\""; ?>>
   	<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
		<?php 
			$ques_detail=get_question_detail($i,$quizId); 
            $pic='Ques_file/'.$ques_detail['file_name'];?>
			<center><img style="width:100%;height:100%;" src="<?php echo $pic;?>"/></center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div> 
			</div>
			</div>
			<?php
		}
}
?>
<br><br>
<center><input class="button button1" type="submit" name="submit" id="but"></center>
</form>
<br><br>
<?php
if(isset($_POST['submit']))
{
	$ans_str="";
		for($i=$min_ques_id;$i<=$max_ques_id;$i++)
	{
    	
	    	if(isset($_POST['q'.$i]))
	    		$ans_str=$ans_str.$_POST['q'.$i];
	    	else
	    		$ans_str=$ans_str." ";
	}
calculate_marks($trix_id,$quizId,$ans_str);
}
?>
</body>
<br>
<br>
<?php 
include 'footer.php';
?>

