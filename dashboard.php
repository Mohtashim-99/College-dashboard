<?php
session_start(); 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location:login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "connectiondb.php";

    $paragraph = $_POST["addparagraph"];
    $page_id = 1; 
    $dept_id = $_SESSION['dept_id'];

    // Get the current highest order value for the given page_id and dept_id
    $sql_max_order = "SELECT MAX(`order`) AS max_order FROM `paragraphs` WHERE `page_id` = '$page_id' AND `dept_id` = '$dept_id'";
    $result_max_order = mysqli_query($conn, $sql_max_order);
    $row_max_order = mysqli_fetch_assoc($result_max_order);
    $max_order = $row_max_order['max_order'];

    // Determine the next order value
    $next_order = is_null($max_order) ? 1 : $max_order + 1;

    $sql = "INSERT INTO `paragraphs` (`page_id`, `type`, `content`, `order`, `dept_id`) VALUES ('$page_id', 'para', '$paragraph', '$next_order', '$dept_id')";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Record updated successfully";
        // Redirect to the same page to prevent resubmission
        header("Location: dashboard.php");
        exit(); 
    } else {
        echo "Error: " . mysqli_error($conn); // Display error if insertion fails
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome
        <?php echo $_SESSION['name']?>
    </title>
    <link rel="stylesheet" href="src/output.css">
    <link rel="stylesheet" href="src/customckeditor.css">
    <!-- font awesome link below -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Ck editor css link below  -->
    <link rel="stylesheet" href="./ckeditor5/ckeditor5.css">
    <!-- Ck editor custom css link below -->
     <link rel="stylesheet" href="src/customckeditor.css">
     <!-- Common css link below -->
     <link rel="stylesheet" href="src/common.css">
    <style>
       
        .dashboard-li {
            background-color: rgb(241, 245, 254);
        }
        .dashboard-txt {
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
    <div class="fixed z-50 right-7 bottom-7 bg-primary ">
        <span>Navigate to website</span>
    </div>


    <div class="main-outer-container flex ">
        <div class="left-container w-full max-w-80 min-w-60  text-black py-4 bg-white relative">
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
                <h1 class="text-5xl font-black">My Dashboard</h1>
            </div>
            <section class="middle p-12 flex gap-4 justify-between ">
                <div class="middle-left bg-white flex  p-4 w-full flex-col max-w-80 min-w-72 max-h-96  justify-center">
                    <!-- From database -->
                    
                    <span class="text-center">               
                        <l-infinity
                        size="55"
                        stroke="4"
                        stroke-length="0.15"
                        bg-opacity="0.1"
                        speed="1.3"
                        color="#0C32F0"
                    ></l-infinity>
                    </span>


                </div>
                <div class="middle-right flex justify-center  gap-4 items-center flex-wrap">
                    <div class="middle-right-card   transition-all duration-200 ease-in">
                        <a class="flex  flex-col px-14 h-48 items-center justify-center" href="">
                            <span class="text-primary text-6xl font-light">1</span>
                            <span>Servies</span>
                        </a>
                    </div>
                    <div class="middle-right-card transition-all duration-200 ease-in ">
                        <a class=" flex  flex-col px-14 h-48 items-center justify-center" href="">
                            <span class="text-primary text-6xl font-light">1</span>
                            <span>Students</span>
                        </a>
                    </div>
                    <div class="middle-right-card transition-all duration-200 ease-in ">
                        <a class=" flex  flex-col px-14 h-48 items-center justify-center t href="">
                        <span class=" text-primary text-6xl font-light">1</span>
                            <span>Lorem</span>
                        </a>
                    </div>
                    <div class="middle-right-card transition-all duration-200 ease-in ">
                        <a class="flex flex-col px-14 h-48 items-center justify-center " href="">
                            <span class="text-primary text-6xl font-light">4</span>
                            <span>lorems</span>
                        </a>

                    </div>
                </div>
            </section>

            

            <div class="middle-bottom p-12">
                <div class="heading-div"> 
                    <h1 class="font-medium text-3xl text-primary mb-12 ">POST GRADUATE DEPARTMENT OF COMPUTER APPLICATIONS</h1>
                </div>
               

                    <div class="pragraphs">
                      <!-- Data from databse -->
                </div>

                <div class="add-para-div flex flex-col">
                    <div class="add-para">
                        <button class="toggle-form-btn bg-primary text-white px-5 py-2 rounded-full float-right toggleparagaph" data-add-text="Add Paragraph" data-close-text="Close Paragraph">
                            <i class="fa-solid fa-plus mr-1" style="color: #ffffff;"></i>
                            <span class=toggleparagaphtxt>Add Paragraph</span>
                        </button>
                      

                    </div>

                    <div class="form-div  mt-5 flex flex-col">
                        <form action="dashboard.php" method="POST" class="hidden form-bottom overflow-auto">
                        <textarea class="border border-sky-500 w-full p-3 min-h-52 max-h-72 " name="addparagraph" id="addparagraph"></textarea>

                        <div class="buttons mt-4 ">
                           <button class="bg-primary text-white px-4 py-1 rounded-md float-right addbtn ">Add</button>
                        </div>
                    </form>
                    </div>
                </div>

                   
            </div>



        </div>
    </div>
    <div class="footer mt-8 p-9">
      Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae sit facilis dolorum, at esse aut tempora minima id officia cupiditate non in excepturi commodi perferendis natus eum rem, maiores pariatur.
    </div>

    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "./ckeditor5/ckeditor5.js",
                "ckeditor5/": "./ckeditor5/"
            }
        }
    </script>
    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Paragraph,
            Bold,
            Italic,
            Font
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#editor'), {
                plugins: [Essentials, Paragraph, Bold, Italic, Font],
                toolbar: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                ]
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <!-- A friendly reminder to run on a server, remove this during the integration. -->
    <script>
        window.onload = function () {
            if (window.location.protocol === "file:") {
                alert("This sample requires an HTTP server. Please serve this file with a web server.");
            }
        };
    </script>
   <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/infinity.js"></script>
    <script src="scripts/dashboard.js"></script>
    <script src="scripts/sidebar.js"></script> 
    <script src="scripts/common.js"></script>
    <script src="scripts/header.js"></script>
     
</body>

</html>