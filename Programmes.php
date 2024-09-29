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
    <title>Programmes</title>
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

        .Programmes-li{
            background-color: rgb(241, 245, 254);
        }
        .Programmes-li a{
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
                
                </div>


            </div>
            <div class="second-header my-8 pl-10 ">
                <h1 class="text-5xl font-black">Programmes</h1>
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
                    <tbody id="tbody-programmes-data">
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
    <script src="scripts/sidebar.js"></script>
    <script src="scripts/common.js"></script>
    <script src="scripts/Programmes.js"></script>
    <script src="scripts/header.js"></script>
   </body>
    </html>