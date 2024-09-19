<?php
session_start();

if(!isset($_SESSION['loggedin'])|| ($_SESSION['loggedin']!=true)){
    echo json_encode(['error' =>'User not logged in']);
    exit();
}
    $admindetails=
    [
        'id'=> $_SESSION['id'],
        'name'=> $_SESSION['name'],
        'username' =>$_SESSION['username'],
        'phoneno' =>$_SESSION['phoneno'],
        'email' =>$_SESSION['email'],
        'designation' =>$_SESSION['designation'],
        'department' =>$_SESSION['department'],
        'photo'=> $_SESSION['photo'],
        'dept_id' =>$_SESSION['dept_id'],
    ];
    

    echo json_encode($admindetails);



?>