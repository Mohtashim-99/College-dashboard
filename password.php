<?php
session_start(); 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location:login.php");
    exit;
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'connectiondb.php';
    $existingPass = $_POST['existing-password'];
    $newPass = $_POST['new-password'];
    $username = $_SESSION['username'];
    $showError = false;
    $showSuccess = false;

    $sql = "SELECT * FROM admins WHERE username ='$username' AND PASSWORD ='$existingPass'";
    $result = mysqli_query($conn, $sql);
    if($result){
        $num = mysqli_num_rows($result);
        if($num > 0){
            $sql_update = "UPDATE admins SET password = '$newPass' WHERE username ='$username'";
            if($result_update = mysqli_query($conn, $sql_update)){
                $showSuccess = true;
            } else {
                echo mysqli_error($conn);
            }
        } else {
            $showError = true;
        }
    } else {
        echo "Some error occurred: ".mysqli_error($conn);
    }

    mysqli_close($conn);

    // Redirect to avoid resubmission
    if($showSuccess) {
        header("Location: ".$_SERVER['PHP_SELF']."?success=true");
        exit();
    }
    if ($showError) {
        header("Location: ".$_SERVER['PHP_SELF']."?error=true");
        exit();
    }
}

// Handle success or error message on GET request
if(isset($_GET['success'])){
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('.success-div').style.display = 'flex';
            });
          </script>";
}

if(isset($_GET['error'])){
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelector('.error-div').style.display = 'flex';
            });
          </script>";
}

// Clear the URL parameters after displaying the message
echo "<script>
        if(window.location.search.includes('success=true') || window.location.search.includes('error=true')) {
            // Use history.replaceState to clear the query parameters
            window.history.replaceState(null, null, window.location.pathname);
        }
      </script>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <link rel="stylesheet" href="src/output.css">
    <!-- font awesome link below -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Ck editor css link below  -->
    <link rel="stylesheet" href="./ckeditor5/ckeditor5.css">
    <!-- Custom ck editor css link below -->
    <link rel="stylesheet" href="src/customckeditor.css">
    <!-- Common css link below -->
    <link rel="stylesheet" href="src/common.css">
    <style>
      
       table td,
        table th {
            padding: 1rem;
            vertical-align: middle;
            text-align: center;
        }

        table tr {
            border-top: 1px solid black;
        }

        table th {
            color: blue;

        }
      
        .password-li {
            background-color: rgb(241, 245, 254);
        }

        .password-li a {
            color: #1062fe;
        }
        .password-li i {
            color: #1062fe;
        }
      

    </style>
</head>

<body>
    <div class="main-container" id="editor-container">
        <div id="editor">ELEMENT HERE</div>
        <div class="editor-bottom">
            <button id="submit-edit">Submit</button>
            <button id="cancel-edit">Cancel</button>
        </div>
    </div>


    <div class="main-outer-container flex ">
        <div class="left-container w-full max-w-80 min-w-60   text-black py-4 bg-white relative">
        <div class="left-container-inner">

        </div>
        </div>
        
        <div class="right-main max-w-full w-full ">
            <div class="main-top h-14 flex justify-end items-center px-5 w-full border-b border-b-primary ">
                <div class="bars-div hidden">
                    <i class="fa-solid fa-bars text-iconColor text-2xl"></i>
                </div>
                <div class="main-top-right max-w-full w-full  ">
                </div>
            </div>
            <div class="second-header my-8 pl-10 ">
                <h1 class="text-5xl font-black">Change password</h1>
            </div>
            <section class="middle p-12  gap-4 justify-between "> 
              
            </section>

            <div class="table-div p-8 m-12 overflow-auto">
               <div class= "flex flex-col justify-center">
                <form action="password.php"  method="post" class="flex flex-col justify-center">
                    <div class="error-div hidden p-6">
                        <span>Your existing password was not correct</span>
                   </div>
                   <div class="success-div hidden p-6">
                        <span>Changes Saved Successfully!</span>
                   </div>
           
                    <label for="" class="mb-2 text-gray_base text-sm">Existing password </label>
                    <input type="password" class="w-full mb-4"  name="existing-password" id ="existing-password">
                    <label for="" class="mb-2 mt-6 text-gray_base text-sm">New Password</label>
                    <input type="password" class="w-full mb-4" name="new-password" id="new-password-1">
                    <label for="" class="mb-2 text-gray_base text-sm">Confirm New Password</label>
                    <input type="password" class="w-full" name="confirm-new-password" id="confirm-new-password">
                    <p class="text-danger my-3 label-error hidden">The passwords entered do not match </p>
                    <div class="flex justify-between py-6">
                        <div>
                            <button type ="submit" class=" bg-primary text-white px-5 py-2 rounded-md save-changes-btn ">Save changes</button>
                        </div>
                        <div>
                            <button type="button" class=" border-slate-300 border px-5 py-2 rounded-md cancel-btn ">Cancel changes</button>
                        </div>
                    </div>
                </form>
               </div>
 
            </div>

            
        </div>
    </div>
   

    <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/infinity.js"></script>
    <script src="scripts/sidebar.js"></script>
    <script src="scripts/common.js"></script>
    <script src="scripts/header.js"></script>
    <script src="scripts/password.js"></script>
   </body>
    </html>