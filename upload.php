<?php

session_start();

    $username="root";
    $password="ashwin92";
    $db="CorpSocNet";

    $conn=mysqli_connect("localhost",$username,$password,$db,0,'/tmp/mysql.sock');

    if(!$conn){
        die("Could not connect: " + mysqli_error($conn));
        echo "Connection Failed";
    }
    else {
        echo 'Connection sucessful!';
    }
    
$sql="SELECT * from Event";    
$result = mysqli_query($conn, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}


$date = date('m/d/Y h:i:s a', time());
echo $date;

while($row = mysqli_fetch_assoc($result)) {

        echo "<br>";
        $loc_id= $row["loc_id"];
        // echo $loc_id;

        $sql1="SELECT location_name from locations where loc_id='$loc_id'"; 
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_assoc($result1);
        //echo $row1['location_name'];

        $t1 = strtotime($date);
       $t2 = strtotime($row['startdate']);
       //echo $t1;
      // echo "<br>";
       //echo $t2;

       if($t2>$t1){
        echo "<td>" . $row["event_name"]. "</td><td>" ." from ". $row["startdate"]. "</td><td>" ." To ". $row["enddate"]." At ". $row1['location_name'];
       }
        //echo "<td>" . $row["event_name"]. "</td><td>" ." from ". $row["startdate"]. "</td><td>" ." To ". $row["enddate"]." At ". $row1['location_name'];

}


?>