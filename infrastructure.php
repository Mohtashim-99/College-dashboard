<?php
session_start(); 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location:login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infrastructure</title>
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

        .infrastructure-li{
            background-color: rgb(241, 245, 254);
        }
        .infrastructure-li a{
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
                <i class="fa-solid fa-bars text-iconColor text-2xl" ></i>
                </div>
                <div class="main-top-right max-w-full w-full   ">
                    <div
                        class="right-main-profile float-right flex items-center px-4 w-auto gap-3 transition-all duration-200 ease-in group  hover:text-primary cursor-pointer ">
                        <div class="profile-photo w-12 overflow-hidden rounded-full ">
                            <img class="aspect-square object-contain w-12 "
                                src="img/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg "alt="">

                        </div>
                        <div class="profile-name inline-block">
                            <span class="whitespace-nowrap "></span>
                        </div>
                        <span><i
                                class="fa-solid fa-caret-down  text-iconColor transition-all duration-200 ease-in group-hover:text-primary"></i></span>
                    </div>
                    <div
                        class="profile-dropdown absolute h-auto min-w-72 box-border right-0  mr-8 z-10 bg-white hidden top-16 whitespace-nowrap flex-col transition-all duration-1000 ease-in ">
                        <div class="profile-dropdown-top flex overflow-hidden  items-center px-6 py-4 gap-2 flex-1 flex-nowrap">
                           <!-- From database -->
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
                <h1 class="text-5xl font-black">Infrastructure</h1>
            </div>
            <section class="middle p-12  gap-4 justify-between  hidden">  
            </section>

            <div class="table-div p-8 m-12 overflow-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Degree</th>
                            <th>Intake Capacity</th>
                            <th>Eligibilty</th>
                            <th>Mode of admission</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-faculty-data">

                    <tr>
                            <td>1</td>
                            <td>Bachelors in Computer Applications (Hons) (3+1)</td>
                            <td>80</td>
                            <td>The Candidate must have passed Senior Secondary Part-II (10+2) Examination in any stream and obtained in aggregate a minimum of 45% Marks (40% in case of reserved category) or equivalent grade scale of respective Boards/Universities at the 10+2 level</td>
                            <td>Through Common University Entrance Test (CUET)</td>
                    </tr>

                    <tr>
                            <td>2</td>
                            <td>Masters in Computer Applications (M.C.A)</td>
                            <td>20</td>
                            <td>Have pursued Bachelors degree in computer application</td>
                            <td>Through Entrance conducted by Kashmir University</td>
                    </tr>

                    <tr>
                            <td>3</td>
                            <td>Applied computing as Minor course</td>
                            <td>40</td>
                            <td>The Candidate must have passed Senior Secondary Part-II (10+2) Examination in any stream and obtained in aggregate a minimum of 45% Marks (40% in case of reserved category) or equivalent grade scale of respective Boards/Universities at the 10+2 level</td>
                            <td>Through Entrance conducted by Kashmir University</td>
                    </tr>
                        <!-- <tr id="loading-row">
                            <td colspan="4">
                                <l-infinity size="55" stroke="4" stroke-length="0.15" bg-opacity="0.1" speed="1.3"
                                    color="#0C32F0">
                                </l-infinity>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            
        </div>
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
    <script src="sidebar.js"></script>
    <script src="common.js"></script>
   </body>
    </html>