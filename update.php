<?php

require 'connection.php';

$id = $_REQUEST['stud_id'];
$stud_name = $_REQUEST['stud_name'];
$stud_email = $_REQUEST['stud_email'];

$db = new DBConnect();
$con = $db->connection();

$updateUser = "UPDATE `student` SET `stud_email`='$stud_email',`stud_name`='$stud_name' WHERE `stud_id`='$id'";

$result = mysqli_query($con,$updateUser);

if($result>0){
    $fetchUserDetail = "SELECT `stud_id`,`stud_name`,`stud_email` FROM `student` WHERE 
    `stud_email`='$stud_email'";
    $checkResult = mysqli_query($con,$fetchUserDetail);

    if(mysqli_num_rows($checkResult) > 0){
        while($row=$checkResult->fetch_assoc()){
            $response['user'] = $row;
        }
        $response['error'] = 0;
        $response['message'] = "Student Data Updated Successfully.";
    }
}else{
    $response['user']=(object)[];
    $response["error"] = 1;
    $response["message"] = "Student Update Failed!";
}

echo json_encode($response);


?>