<?php

include 'connection.php';

$stud_name = $_REQUEST['stud_name'];
$stud_email = $_REQUEST['stud_email'];
$pwd = $_REQUEST['pwd'];

$db = new DBConnect();
$con = $db->connection();

$checkExistingUser = "SELECT `stud_email` FROM `student` WHERE `stud_email`='".$stud_email."'";

//$checkEmail = mysqli_query($con,$checkExistingUser);
$checkEmail = mysqli_query($con,$checkExistingUser);

if(mysqli_num_rows($checkEmail) >= 1){
    $response["error"]=0;
    $response["message"]="Email id already exists.use another email";
}else{
   $insert =  "INSERT INTO `student`( `stud_name`, `stud_email`, `password`) VALUES ('".$stud_name."','".$stud_email."','".$pwd."')";

   $result = mysqli_query($con,$insert);

   if($result){
    $response['error']=1;
    $response['message']='Registered successfully.';
   }else{
    $response['error']=0;
    $response['message']='Failed to register.';
   }
}
echo json_encode($response);


?>
