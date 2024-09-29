<?php
session_start();


// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connectiondb.php';

    $username = $_POST["username"];
    $password = $_POST["pass"];
    $showError = false;

    // Execute the SQL query
    $sql = "SELECT * FROM ADMINS WHERE USERNAME = '$username' AND PASSWORD = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            $details = mysqli_fetch_assoc($result);
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $details['id'];
            $_SESSION['username'] = $details['username'];
            $_SESSION['name'] = $details['name'];
            $_SESSION['phoneno'] = $details['phoneno'];
            $_SESSION['email'] = $details['email'];
            $_SESSION['designation'] = $details['designation'];
            $_SESSION['department'] = $details['department'];
            $_SESSION['photo'] = $details['photo'];
            $_SESSION['dept_id'] = $details['dept_id'];
            header("location:dashboard.php");
            exit();
        } else {
            $showError = true;
        }
    } else {
        echo "Error in SQL execution.";
    }

    mysqli_close($conn);

    if ($showError) {
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.querySelector('.error-div').style.display = 'flex';
                });
              </script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="src/output.css">
    <style>
          @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
          body {
            font-family: Roboto, sans-serif;

        }
         .main-container{
          
            box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.1), 0px 2px 24px rgba(0, 0, 0, 0.08);
        }
        #username,#pass{
            border: 2px solid rgb(222, 224, 227);
            margin-bottom: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 4px;

        }
        #showpass{
            border: none;
        }
        .error-div{
            border:1px solid rgb(250, 225, 226);
            color:#b6202a;
            background-color :rgb(252, 238, 239);
            padding:  1rem 1.5rem;
            margin:1rem  0 1rem  0;
            
            

        }
    </style>
</head>

<body>
    <div class="main-body flex items-center h-screen  flex-col p-8  pt-12">
        <div class="top-logo m-8  w-28">
            <img class="aspect-square object-contain" 
            src="img/Degree_college_boya_baramulla_logo.jpeg"
            alt="Collelge logo">
        </div>
        <div class="main-container py-5 px-6 pb-6 flex w-full max-w-96 justify-center flex-col">
        <div class="error-div hidden p-6">
             <span>Login Details Incorrect. Please try again.</span>
        </div>

            <form class="flex flex-col  w-full"action="login.php" method="post">
                <h1 class="text-center text-3xl font-medium mb-5" >Admin Login</h1>
                <label class="text-sm mb-2" for="username">Username</label>
                <input class="font-normal" type="text" id="username" placeholder="Enter username" name="username" required  autofocus>
               <div class="flex  items-center mb-2 justify-between"> 
                <label class="text-sm  inline-block" for="pass">Password</label>
                <a class="text-primary" href="">Forgot?</a>
                </div>
                <input class="" type="password" id="pass" placeholder="Password" name="pass" required>
                <div class="show flex  mb-4">
                    <input class="mr-3" type="checkbox" id="showpass" >
                    <label class="text-sm" for="showpass">Show password</label>
                </div>
                <button class="mt-4 text-white bg-primary py-2 rounded h-12 text-lg login-btn">Login</button>
              
            </form>
       
        </div>
    </div>
    <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/infinity.js"></script>
    <script src="scripts/login.js"></script>
</body>

</html>