<?php

include 'connection.php';

$stud_email = $_REQUEST['stud_email'];
$pwd = $_REQUEST['pwd'];

$db = new DBConnect();
$con = $db->connection();

$query = "SELECT `stud_id`,`stud_name`,`stud_email` FROM `student` WHERE `stud_email`='".$stud_email."' AND `password`='".$pwd."'";

$result = mysqli_query($con,$query);

if(mysqli_num_rows($result)>0){
     //login successful..
     while($row=$result->fetch_assoc()){
         $response['user'] = $row;
     }
     $response['error']=0;
     $response['message']="LOgin Successfully.";
}else{
    $response['user'] = (object)[];
    $response['error']=1;
     $response['message']="Login Failed!.";

}
echo json_encode($response);

?>