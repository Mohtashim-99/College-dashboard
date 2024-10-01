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
    <title>Your profile</title>
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
        input{
            border: 2px solid rgb(222, 224, 227);
            padding: 0.5rem 1rem;
            border-radius: 4px;

        }
        .success-div{
            color:rgb(45, 159, 70);
            background-color:#e7f8eb;    
            border: 1px solid #dbf5e1;
            padding:  1rem 1.5rem;
            margin:1rem  0 1rem  0;
        }
        .your-profile-li {
            background-color: rgb(241, 245, 254);
        }

        .your-profile-li a {
            color: #1062fe;
        }
        .your-profile-li i {
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
                <h1 class="text-5xl font-black">Your profile</h1>
            </div>
            <section class="middle p-12  gap-4 justify-between "> 
              
            </section>

            <div class="p-8 m-12" >
                <div class="flex flex-col justify-center">
                        
                        <!-- <div class="error-div hidden p-6">
                            <span>Your existing password was not correct</span>
                        </div>
                        
                        <div class="success-div hidden p-6">
                            <span>Changes Saved Successfully!</span>
                        </div> -->
                        
                        <h1 class="text-2xl font-light mb-9" >Profile</h1>
                        <form action="">
  
                        <div class=" p-8 table-div overflow-auto flex gap-4 " >

                            <div class="w-full">
                        
                                <label for="full-name" class="mb-4 text-gray_base text-sm ">Full name</label>
                                <input type="text" class="w-full " name="full-name" id="full-name">
                            </div>
                            <div class="w-full">
                    
                                <label for="username" class="mb-4 text-gray_base text-sm">Username</label>
                                <input type="text" readonly class="w-full " name="" id="username">
                            </div>

                        </div>

                        <div class="flex justify-between py-6">
                            <div>
                                <button type="submit" class="bg-primary text-white px-5 py-2 rounded-md save-changes-btn">Save changes</button>
                            </div>
                        
                            <div>
                                <button type="button" class="border-slate-300 border px-5 py-2 rounded-md cancel-btn">Cancel changes</button>
                            </div>
                            
                        </div>

                        </form>


                        <h1 class="text-2xl font-light mb-9" >Change Email Address
                        </h1>

                        <form action="profile.php" method ="post">
                        <div class=" p-8 table-div overflow-auto flex gap-4" >

                            <div class="w-1/2 ">

                                <label for="full-name" class="mb-4 text-gray_base text-sm ">Email Address</label>
                                <input type="email" class="w-full " name="email" id="email">
                            </div>

                         </div>
                        
                 
                        
            
                            <div class="flex justify-between py-6">
                                <div>
                                    <button type="submit" class="bg-primary text-white px-5 py-2 rounded-md save-changes-btn">Save changes</button>
                                </div>
                            
                                <div>
                                    <button type="button" class="border-slate-300 border px-5 py-2 rounded-md cancel-btn">Cancel changes</button>
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
    <script src="scripts/profile.js"></script>
   </body>
    </html>