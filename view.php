<?php
require 'connection.php';


$db = new DBConnect();
$con = $db->connection();


$checkuser = "SELECT `stud_id`,`stud_name`,`stud_email` FROM `student`";

$result = mysqli_query($con,$checkuser);

if(mysqli_num_rows($result)>0){
    while($row=$result->fetch_assoc()){
        $response['user'][] = $row;
        $response['error'] = 0;
        }
        }
        else{
            $response['user'] =(object)[];
            $response['error'] = 1;
        }
        echo json_encode($response);

?>