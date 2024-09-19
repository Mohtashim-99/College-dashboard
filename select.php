<?php
$servername = "localhost";
$username = "root";
$password = "";
$database ="contactus";
$conn = mysqli_connect ($servername,$username,$password,$database);
if(!$conn){
    die("sorry we failed to connect".mysqli_connect_error());
}
else{
    echo "connection was succefull<br>";
}

$sql = "SELECT * FROM `contact_table`";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
echo $num;
echo "<br>";
if($num>0){  
    // $row = mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo "<br>";
    while($row = mysqli_fetch_assoc($result)){
        // echo var_dump($row);
        echo $row['Sno'] . ". Your name is " . $row['name'] . " and email is " . $row['email'];

                echo "<br>";
    }



    }

?>