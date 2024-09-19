<?php
session_start(); 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location:login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    include "connectiondb.php";
    $title = $_POST["title"];
    $page_id = 3;
    $dept_id = $_SESSION["dept_id"];
    
    // Set the default timezone to India Standard Time
    date_default_timezone_set('Asia/Kolkata');

    // Check if a file was uploaded
    if (!empty($_FILES['filename']['name'])) {
        // File upload handling
        $file_name = $_FILES['filename']['name'];
        $file_temp = $_FILES['filename']['tmp_name'];
        $file_size = $_FILES['filename']['size'];

        // Extract the file extension
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

        // Create a unique file name using the original name, date, and time
        $unique_file_name = pathinfo($file_name, PATHINFO_FILENAME) . '_' . date('Ymd_His') . '.' . $file_extension;

        // Define the destination path
        $file_dest = "docs/" . $unique_file_name;

        // Validate file size (e.g., max 5MB)
        if ($file_size > 5 * 1024 * 1024) {
            echo "File size must be less than 5MB.";
            exit();
        }

        if (move_uploaded_file($file_temp, $file_dest)) {
            // If the file is successfully uploaded, include it in the database record
            $pdf_path = $file_dest;
        } else {
            echo "Error while uploading the file.";
            exit();
        }
    } else {
        // If no file was uploaded, set PDF path to an empty string
        $pdf_path = '#';
    }

    // Get the current highest order value for the given page_id and dept_id
    $sql_max_order = "SELECT MAX(`order`) AS max_order FROM `notifications` WHERE `page_id` = '$page_id' AND `dept_id` = '$dept_id'";
    $result_max_order = mysqli_query($conn, $sql_max_order);
    $row_max_order = mysqli_fetch_assoc($result_max_order);
    $max_order = $row_max_order['max_order'];

    // Determine the next order value
    $next_order = is_null($max_order) ? 1 : $max_order + 1;

    // Insert the record into the database with or without the PDF
    $sql = "INSERT INTO `notifications` (`page_id`, `dept_id`, `title`, `order`, `pdf`, `date_time`) 
            VALUES ('$page_id', '$dept_id', '$title', '$next_order', '$pdf_path', CURRENT_TIMESTAMP)";
    
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Record updated successfully";
        header("Location: notification.php");
        exit();
    } else {
        echo "Error while inserting data: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link rel="stylesheet" href="src/output.css">
    <!-- font awesome link below -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Common css link below -->
    <link rel="stylesheet" href="src/common.css">

    <style>

       table td,
        table th {
            padding: 1rem;
            vertical-align: middle;
            text-align: center;
            white-space: nowrap;

        }

        table tr {
            border-top: 1px solid black;
        }

        table th {
            color: blue;

        }
     .notification-li {
            background-color: rgb(241, 245, 254);
        }

        .notification-li a {
            color: #1062fe;

        }
    </style>
</head>

<body>
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
                <div class="main-top-right max-w-full w-full   ">
                    <div
                        class="right-main-profile float-right flex items-center px-4 w-auto gap-3 transition-all duration-200 ease-in group  hover:text-primary cursor-pointer ">
                        <div class="profile-photo w-12 overflow-hidden rounded-full ">
                            <img class="aspect-square object-contain w-12 "
                                src="img/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg " alt="">

                        </div>
                        <div class="profile-name inline-block">
                            <span class="whitespace-nowrap "></span>
                        </div>
                        <span><i
                                class="fa-solid fa-caret-down  text-iconColor transition-all duration-200 ease-in group-hover:text-primary"></i></span>
                    </div>
                    <div
                        class="profile-dropdown absolute h-auto min-w-72 box-border right-0  mr-8 z-10 bg-white hidden top-16 whitespace-nowrap flex-col transition-all duration-1000 ease-in ">
                        <div
                            class="profile-dropdown-top flex overflow-hidden  items-center px-6 py-4 gap-2 flex-1 flex-nowrap">
                            <!-- <div class="flex justify-center  overflow-hidden rounded-full">
                                <img class="aspect-square object-contain w-16"
                                    src="img/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg" alt="">
                            </div>
                            <div class="">
                                <span class="whitespace-nowrap text-2xl font-medium">Mohtashim anayat</span>
                            </div> -->
                        </div>
                        <hr>
                        <ul class="py-3">
                            <li>
                                <a class="px-6 py-1.5 text-sm flex items-center gap-3 transition-all duration-200 ease-in group hover:text-primary hover:pl-9"
                                    href="">
                                    <i
                                        class="fa-solid fa-user text-iconColor transition-all duration-200 ease-in group-hover:text-primary"></i>
                                    <span>Your profile</span>
                                </a>
                            </li>

                            <li>
                                <a class="px-6 py-1.5 text-sm flex items-center gap-3 transition-all duration-200 ease-in group hover:text-primary hover:pl-9"
                                    href="">
                                    <i
                                        class="fa-solid fa-circle-info text-iconColor transition-all duration-200 ease-in group-hover:text-primary"></i>
                                    <span>Account details</span>
                                </a>
                            </li>

                            <li>
                                <a class="px-6 py-1.5 text-sm flex items-center gap-3 transition-all duration-200 ease-in group hover:text-primary hover:pl-9"
                                    href="">
                                    <i
                                        class="fa-solid fa-shuffle text-iconColor transition-all duration-200 ease-in group-hover:text-primary"></i>
                                    <span>Switch account</span>
                                </a>
                            </li>

                            <li>
                                <a class="px-6 py-1.5     text-sm flex items-center gap-3 transition-all duration-200 ease-in group hover:text-primary hover:pl-9"
                                    href="">
                                    <i
                                        class="fa-solid   fa-unlock text-iconColor transition-all duration-200 ease-in  group-hover:text-primary "></i>
                                    <span>Change password</span>
                                </a>
                            </li>

                            <hr>

                            <li>
                                <a class="px-6 py-1.5 mt-2 text-sm flex items-center gap-3 transition-all duration-200 ease-in group  hover:text-primary hover:pl-9"
                                    href="logout.php">
                                    <i
                                        class="fa-solid fa-arrow-right-from-bracket  text-iconColor transition-all duration-200 ease-in group-hover:text-primary"></i>
                                    <span>Logout</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>


            </div>
            <div class="second-header my-8 pl-10 ">
                <h1 class="text-5xl font-black">Notifications</h1>
            </div>
            <section class="middle p-12 flex gap-4 justify-between ">
                <div class=" border border-solid border-black rounded-sm max-w-full w-full">
                    <div
                        class=" bg-primary_lighter text-primary  p-3 py-5 flex justify-between border-b text-2xl border-black">
                        <div>
                            <h1>Notifications</h1>
                        </div>
                        <div class="caret-div">
                            <i
                                class="fa-solid fa-xmark text-iconColor transition-all duration-200 ease-in  hover:text-primary cursor-pointer"></i>
                        </div>
                    </div>
                    <div class="notification-bottom overflow-auto max-h-96 transition-all duration-200 ease-in ">

                   
                      <!-- Notification from the database -->


                    </div>

                </div>



            </section>

            <div class="p-12 flex flex-col">
                <div class="mb-5">
                    <button class= "toggle-form-btn addNotificationBtn bg-primary text-white rounded-full px-5 py-2 float-right" 
                    data-add-text="Add Notification" data-close-text="Close Notification">
                        <i class="fa-solid fa-plus mr-1" style="color: #ffffff;"></i>
                        <span class="addNotificationBtnTxt"> Add Notification</span>
                    </button>
                </div>
                <form action="notification.php"  method = "POST" enctype = "multipart/form-data" id="add-notificaton" class="form-bottom hidden">
                    <table class="w-full border border-black  rounded-lg">
                        <thead>
                            <tr>
                                <th class="p4">Title *</th>
                                <th class="p4">PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p4">
                                   <textarea class="border border-black w-full max-h-64 min-h-32 p-2" name="title" id="addparagraph" required></textarea>
                                </td>
                                <td class="p4">
                                    <input type="file" id="myFile" name="filename" class="
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                      file:bg-violet-50 file:text-primary
                                      hover:file:bg-violet-100">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="bg-primary text-white py-1.5 px-5 rounded-full mt-8 float-right submit-btn" >Submit </button>
                </form>
            </div>








            <div class="middle-bottom p-12">

            </div>

        </div>
    </div>
    <div class="footer mt-8 p-9">
        Lorem ipsum, dolor sit amet consectetur adipising elit. Quae sit facilis dolorum, at esse aut tempora minima id
        officia cupiditate non in excepturi commodi perferendis natus eum rem, maiores pariatur.
    </div>

    <script src="notification.js"></script>
    <script src="sidebar.js"></script>
    <script src="common.js"></script>

</body>

</html>