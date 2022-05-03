<?php

require 'connection.php';

$id = $_REQUEST['stud_id'];

$db = new DBConnect();
$con = $db->connection();

$deleteuser = "DELETE FROM `student` WHERE `stud_id`='$id'";

$result = mysqli_query($con,$deleteuser);

if($result>0){
        $response['success'] = 1;
        $response['message'] = "Deleted";
        }
        else{
            $response['success'] = 0;
            $response['message'] = "Not Deleted";
        }
        echo json_encode($response);
    
?>