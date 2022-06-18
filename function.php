<?php	
	try 
		{ 
			$db = new PDO("mysql:dbname=online_exam;host=localhost", "root", "" );
		}
	catch(PDOException $e)
		{ 
			alert($e->getMessage());
		}//db connection which is common for every page.

function admin_login_check($admin_name,$password)
{
	//function to check the login credentials of the admin
	//DB support is not used for this check as it is redundanct for a small specified group.
	if($admin_name=="admin" and $password=="tech123")
		{
			$_SESSION['admin']='admin';
			header('Location:admin_home.php');
		}
}

function student_login_check($trix_id,$password)
{
	//function to check the login credentials of the student
	$sql="select * from team_data where trix_id='".$trix_id."' and password='".$password."'";
	$key=0; 
	foreach($GLOBALS['db']->query($sql) as $row)
		$key++;
	if($key==1)
		return $trix_id;
	else if ($key>1)
		echo "Multiple records!!";
	else
		echo "Username or Password is incorrect";
}

function generateRandomString($length = 10) 
{
	//function to generate random strings
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function create_quiz($quiz_name,$display_ques,$time_allocated,$for_right,$for_wrong,$status,$created_by,$instruction)
{
//function to create a new quiz
$sql="insert into create_quiz(quiz_name,display_ques,time_allocated,for_right,for_wrong,status,created_by,instruction)values
('".$quiz_name."',".$display_ques.",".$time_allocated.",".$for_right.",".$for_wrong.",".$status.",'".$created_by."','".$instruction."')";
//echo $sql;
$GLOBALS['db']->exec($sql);
}

function insert_student_data($team_name,$trix_id,$name_1,$name_2,$name_3,$name_4,$name_5,$phone,$email)
{
//function to insert student data in the table
$x=generateRandomString();
$sql="INSERT INTO team_data(trix_id,team_name,name_1,name_2,name_3,name_4,name_5,email,phone,password)values 
('".$trix_id."','".$team_name."',
'".$name_1."','".$name_2."','".$name_3."','".$name_4."','".$name_5."',
'".$email."','".$phone."','".$x."')";
$GLOBALS['db']->exec($sql);
}

function get_quiz_details($quiz_id)
{
//returns the details of a quiz
$sql="select * from create_quiz where quiz_id=$quiz_id";
foreach($GLOBALS['db']->query($sql) as $row);
return $row;
}

function insert_question($quiz_id,$question,$option_1,$option_2,$option_3,$option_4,$correct_answer,$file_data)
{
//function to insert question into the database
$x=generateRandomString();
//inserting the question in the question database
$sql="insert into ques(quiz_id,ques,correct_option,file_name)values
(".$quiz_id.",'".$question."','".$correct_answer."','$x".$file_data['question_file']['name']."')";
$GLOBALS['db']->exec($sql);

//fetching the value of the recent question ID
$sql="SELECT * FROM ques ORDER BY ques_id DESC LIMIT 1";
foreach($GLOBALS['db']->query($sql) as $row);

//inserting the option value
$sql="insert into ans values(".$row['ques_id'].",".$quiz_id.",'A','".$option_1."')";
$GLOBALS['db']->exec($sql);
$sql="insert into ans values(".$row['ques_id'].",".$quiz_id.",'B','".$option_2."')";
$GLOBALS['db']->exec($sql);
$sql="insert into ans values(".$row['ques_id'].",".$quiz_id.",'C','".$option_3."')";
$GLOBALS['db']->exec($sql);
$sql="insert into ans values(".$row['ques_id'].",".$quiz_id.",'D','".$option_4."')";
$GLOBALS['db']->exec($sql);
//increasing the counter by 1
$sql="update create_quiz set total_ques=total_ques+1 where quiz_id=$quiz_id";
$GLOBALS['db']->exec($sql);

//uploading the file
$target_file = "Ques_file/$x".basename($_FILES["question_file"]["name"]);
move_uploaded_file($_FILES["question_file"]["tmp_name"], $target_file);
//header('location: question_list.php?quiz_id='.$quiz_id.'');
}

function get_question_detail($ques_id,$quiz_id)
{
	//function to return the details of the question
	$sql="SELECT ques,correct_option, file_name from ques where ques_id=$ques_id and quiz_id=$quiz_id";
	foreach($GLOBALS['db']->query($sql) as $row);
	return $row;
}
function delete_quiz($quiz_id)
{
	//function to delete a quiz
	$sql="DELETE from create_quiz where quiz_id=$quiz_id";
	$GLOBALS['db']->exec($sql);
	$sql="DELETE from ques where quiz_id=$quiz_id";
	$GLOBALS['db']->exec($sql);
	$sql="DELETE from quiz_data where quiz_id=$quiz_id";
	$GLOBALS['db']->exec($sql);
	header('location: quiz_list.php');

}
function delete_question($ques_id,$quiz_id)
{
	//function to delete a question
	$sql="DELETE from ques where ques_id=$ques_id";
	$GLOBALS['db']->exec($sql);
	$sql="DELETE from ans where ques_id=$ques_id";
	$GLOBALS['db']->exec($sql);
	$sql="UPDATE create_quiz set total_ques=(total_ques-1) where quiz_id=$quiz_id";
	$GLOBALS['db']->exec($sql);
	header('location: question_list.php?quiz_id='.$quiz_id.'');

}

function change_status($quiz_id)
{	
	//To change the activity status of the quiz
	$sql="select status from create_quiz where quiz_id=$quiz_id";
	foreach ($GLOBALS['db']->query($sql) as $row) {
		$status=$row['status'];
	}

	if($status==0)
		{
			$sql="update create_quiz set status=1 where quiz_id=$quiz_id";
			$GLOBALS['db']->exec($sql);
		}
	else
		{
			$sql="update create_quiz set status=0 where quiz_id=$quiz_id";
			$GLOBALS['db']->exec($sql);
		}
		//echo $quiz_id." ".$sql;
		header('location:quiz_list.php');
}

function calculate_marks($trix_id,$quiz_id,$ans_str)
{
	//have to be done
	$ref_str="";
	$marks=0;

	$quiz_detail=get_quiz_details($quiz_id);

	//to make the reference string
	$sql="SELECT correct_option FROM ques WHERE quiz_id = $quiz_id";
	foreach ($GLOBALS['db']->query($sql) as $row)
		$ref_str=$ref_str.$row['correct_option'];
	//echo $ref_str."<br>".$ans_str;
	//to calculate the wrong and right marks
	for($i=0;$i<strlen($ref_str);$i++)
	{
		
		if($ans_str[$i]!=" ")
		{
		if($ref_str[$i]==$ans_str[$i])
			$marks+=$quiz_detail['for_right'];
		else
			$marks-=$quiz_detail['for_wrong'];
		}
	}
	//to-do put the sever time
	$sql="update quiz_data set marks=$marks,end_time=now() where quiz_id=$quiz_id and trix_id='$trix_id'";
	$GLOBALS['db']->exec($sql);
	header("location:success.php?trix_id=$trix_id");
}

function attempt_check($trix_id,$quiz_id)
{
	//have to be done
	$sql="select attempt from quiz_data where trix_id='$trix_id' and quiz_id=$quiz_id";
	foreach($GLOBALS['db']->query($sql) as $row)
	echo $row['attempt'];
	if(!isset($row['attempt']))
	{
		$sql_1="insert into quiz_data(trix_id,quiz_id,attempt)values('$trix_id',$quiz_id,1)";
		$GLOBALS['db']->exec($sql_1);
		return 0;
	}
	else 
		return 1;
}


function teacher_login_check($t_id,$t_password)
{
	$sql="select * from teacher where teacher_id='".$t_id."' and teacher_password='".$t_password."'";
	$key=0; 
	foreach($GLOBALS['db']->query($sql) as $row)
		$key++;
	if($key==1)
		//return $t_id.$t_password;
		header('location:dashboard.php');
	else if ($key>1)
		echo "Multiple records!!";
	else
		echo "Username or Password is incorrect";
}



?>