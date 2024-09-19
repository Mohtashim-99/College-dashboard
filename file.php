<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CKEditor 5 - Quick start ZIP</title>
        <link rel="stylesheet" href="./ckeditor5/ckeditor5.css">
        <style>
            * {
                margin: 0;
                padding: 0;
            }
            .main-container {
                width: 795px;
                margin-left: auto;
                margin-right: auto;
                border: 2px solid red;
                position: absolute;
                top: 200px;
                display: none; /* Hide initially */
            }
            .editor-bottom {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px;
            }
            #submit-edit {
                background-color: rgb(24, 24, 215);
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 23px;
                font-size: 16px;    
            }
            #cancel-edit {
                border: 1px solid rgb(24, 24, 215);
                color: rgb(24, 24, 215);
                font-size: 16px;
                background: transparent;
                border-radius: 23px;
                padding: 10px 20px;
            }
            .box {
                display: grid;
                border: 2px solid red;
                width: 500px;
                align-items: center;
                justify-content: space-between;
                padding: 10px;
                grid-template-columns: 1fr 1fr 1fr;
            }
            #email {
                width: 200px;
                margin: 0px 5px;
            }
            #email p {
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="main-container" id="editor-container">
            <div id="editor"></div>
            <div class="editor-bottom">
                <button id="submit-edit">Submit</button>
                <button id="cancel-edit">Cancel</button>
            </div>
        </div>

        <div class="container">
            <h1 class="editable" id="header1">Mohtashim Anayat</h1>
            <div class="box">
                <div class="firstrow editable"><p>Sno</p></div>
                <div class="firstrow editable"><p>Name</p></div>
                <div class="firstrow editable" id="email"><p>Email</p></div> 

                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "contactus";
                    $conn = mysqli_connect($servername, $username, $password, $database);
                    if (!$conn) {
                        die("Sorry, we failed to connect: " . mysqli_connect_error());
                    }

                    $sql = "SELECT * FROM `contact_table`";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="firstrow editable" data-id="' . $row['Sno'] . '" data-column="Sno"><p>' . $row['Sno'] . '</p></div>';
                            echo '<div class="firstrow editable" data-id="' . $row['Sno'] . '" data-column="name"><p>' . $row['name'] . '</p></div>';
                            echo '<div class="firstrow editable" id="email" data-id="' . $row['Sno'] . '" data-column="email"><p>' . $row['email'] . '</p></div>';
                        }
                    } else {
                        echo 'No data found.';
                    }

                    mysqli_close($conn);
                ?>
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
        <script src="script.js"></script>
        <!-- A friendly reminder to run on a server, remove this during the integration. -->
        <script>
            window.onload = function() {
                if (window.location.protocol === "file:") {
                    alert("This sample requires an HTTP server. Please serve this file with a web server.");
                }
            };
        </script>
    </body>
</html>
