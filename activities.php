<?php
session_start(); 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location:login.php");
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities</title>
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
        .activities-li {
            background-color: rgb(241, 245, 254);
        }

        .activities-li a {
            color: #1062fe;

        }
        .images img{
          
           
           
        }
      
        .middle{
            background-color:#f1f0ec;
            margin:0px 30px;
            border-radius:23px;
           
        }
        .middle-top { 
            border-color:#007560;
            
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
                   
                   
                </div>


            </div>
            <div class="second-header my-8 pl-10 ">
                <h1 class="text-5xl font-black">Activities</h1>
            </div>
            <section class="middle p-12 flex gap-4 justify-between flex-col ">
            <div class=" middle-top flex justify-between items-center py-2 border-t-2 border-b-2 max-w-full w-full  ">
                <span class="px-5">NEW POST</span>
                <span class="px-5">Date:19 September 2024</span>
            </div>  
            <div class="my-8">      
                <h1 class="text-4xl  font-medium italic tracking-widest text-center">DRONE AND ITS TECH</h1>
            </div>  
            <div class="w-full flex">
            <div class="w-3/5 pr-3">
                    <p class="mb-3 text-xl">On 1st September, an event focusing on drone technology was held, gathering experts, enthusiasts, and innovators from various fields. The event highlighted the growing significance of drones in industries such as agriculture, logistics, and defense. Keynote speakers shared insights into how drones are transforming modern technology, offering efficient solutions in areas like crop monitoring, package delivery, and aerial surveillance.</p>
                    <p class="mb-3 text-xl">Several live demonstrations were conducted, showcasing the latest advancements in drone technology, including autonomous navigation systems and AI-driven capabilities. Attendees witnessed drones performing complex tasks such as precision farming and real-time data collection, emphasizing the role of drones in boosting productivity while minimizing human intervention Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reprehenderit, molestiae? lorem4000.</p>
                    <p class="mb-3 text-xl">Several live demonstrations were conducted, showcasing the latest advancements in drone technology, including autonomous navigation systems and AI-driven capabilities. Attendees witnessed drones performing complex tasks such as precision farming and real-time data collection, emphasizing the role of drones in boosting productivity while minimizing human intervention. Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia quaerat minus, et voluptate illum totam nesciunt quidem amet sint error veritatis at explicabo tenetur id delectus fugiat laudantium, dolores perferendis.
                    </p>
                
                </div>  
                <div class="w-2/5 images  gap-3 flex flex-col ml-5 items-center overflow-hidden">
                    <div class="flex w-full justify-center gap-5">
                        <img class="aspect-square w-1/2 object-cover" src="img/innovative-team3.webp" alt="">
                        <img class="aspect-square w-1/2 object-cover object-center" src="img/innovative-team4.webp" alt="">
                    </div>
                    <div class="flex w-full justify-center gap-5">
                        <img class="aspect-square w-1/2 object-cover object-center" src="img/innovative-team2.webp" alt="">
                        <img class="aspect-square w-1/2 object-cover" src="img/innovative-team4.webp" alt="">
                    </div> 
                    <div class="flex justify-center w-full">
                        <img class="w-full" src="img\drone landscape1.jpg" alt="">
                    </div>  
                </div>
        
               
            </div>
            <div>
                <p class="mb-3 text-xl">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente laborum eos, deleniti consequuntur obcaecati ipsam vero rem sequi, velit corporis accusantium, quisquam deserunt. Ipsam magnam quisquam consequatur fugiat est dicta. When we want to add something in the code the secret of typing fast is to just practise a lot day and night and you will become a man in typing you just have to focus on something new data types are two types one int and another is float the differnce in these two is nothing but why we use them its because we cannot store decimal valuse in integer type it can only store integer type like 4343 thes are the number without any decimal value</p>
            </div>


            </section>

            <div class="p-12 flex flex-col">
                <div class="mb-5">
                    <button class= "toggle-form-btn addActivitiesBtn bg-primary text-white rounded-full px-5 py-2 float-right" 
                    data-add-text="Add Activity" data-close-text="Close Activity">
                        <i class="fa-solid fa-plus mr-1" style="color: #ffffff;"></i>
                        <span class="addActivitiesBtnTxt"> Add Activity</span>
                    </button>
                </div>
                <form action=""  method = "POST" class="form-bottom hidden ">
                    <table class="w-full border border-black  rounded-lg">
                        <thead>
                            <tr>
                                <th class="p4">PARA 1 *</th>
                                <th class="p4">PARA 2 *</th>
                                <th class="p4">PARA 3 *</th>
                                <th class="p4">PARA 4 *</th>
                                <th class="p4">IMAGE 1 *</th>
                                <th class="p4">IMAGE 2 *</th>
                                <th class="p4">IMAGE 3 *</th>
                                <th class="p4">IMAGE 4 *</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p4">
                                   <input type="text" class="border border-black    " name="title" id="" >
                                </td>
                                <td class="p4">
                                    <input type="text" id="" name="" class="border border-black">
                                      
                                </td>
                                <td class="p4">
                                    <input type="text" id="" name="" class="border border-black">
                                      
                                </td>
                                <td class="p4">
                                    <input type="text" id="" name="" class="border border-black">
                                      
                                </td>
                                <td class="p4">
                                    <input type="text" id="" name="" class="border border-black">
                                      
                                </td>
                                <td class="p4">
                                    <input type="text" id="" name="" class="border border-black">
                                      
                                </td>
                                <td class="p4">
                                    <input type="text" id="" name="" class="border border-black">
                                      
                                </td>
                                <td class="p4">
                                    <input type="text" id="" name="" class="border border-black">
                                      
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

    <script src="scripts/activities.js"></script>
    <script src="scripts/sidebar.js"></script>
    <script src="scripts/common.js"></script>
    <script src="scripts/header.js"></script>

</body>

</html>