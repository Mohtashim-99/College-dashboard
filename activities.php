<?php
session_start(); 

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location:login.php");
    exit();
}



if($_SERVER["REQUEST_METHOD"] =="POST"){
    include "connectiondb.php";
    $dept_id =$_SESSION['dept_id'];
    $page_id=5;
    $para1=$_POST["para-1"];
    $para2=$_POST["para-2"];
    $para3=$_POST["para-3"];
    $para4=$_POST["para-4"];
    $heading=$_POST["heading"];
   
    $name1 = $_FILES['img-1']['name'];
    $tmpname1 = $_FILES['img-1']['tmp_name'];
    $folder1 = "activities-imgs/".$name1;

    $name2 = $_FILES['img-2']['name'];
    $tmpname2 = $_FILES['img-2']['tmp_name'];
    $folder2 = "activities-imgs/".$name2;

    
    $name3 = $_FILES['img-3']['name'];
    $tmpname3 = $_FILES['img-3']['tmp_name'];
    $folder3 = "activities-imgs/".$name3;

    
    $name4 = $_FILES['img-4']['name'];
    $tmpname4 = $_FILES['img-4']['tmp_name'];
    $folder4 = "activities-imgs/".$name4;

    $name5 = $_FILES['img-5']['name'];
    $tmpname5 = $_FILES['img-5']['tmp_name'];
    $folder5 = "activities-imgs/".$name5;

    if(move_uploaded_file( $tmpname1,$folder1)&&move_uploaded_file( $tmpname2,$folder2) &&move_uploaded_file( $tmpname3,$folder3) &&move_uploaded_file( $tmpname4,$folder4) &&move_uploaded_file( $tmpname5,$folder5) ){
        echo "Files uploaded succefully<br>";
        $img1_path= $folder1;
        $img2_path= $folder2;
        $img3_path= $folder3;
        $img4_path= $folder4; 
        $img5_path= $folder5;



    }

    $sql = "INSERT INTO activities (image1, image2 , image3 , image4, image5,paragraph1,paragraph2,paragraph3,paragraph4,heading,dept_id,page_id) VALUES ('$img1_path','$img2_path','$img3_path','$img4_path','$img5_path','$para1','$para2','$para3','$para4','$heading','$dept_id','$page_id')";
    // echo $sql;
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<br>Good<br>";
    }
    else{
        echo mysqli_error($conn);
    }


  
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

    .images img {}

    .middle {
        background-color: #f1f0ec;
        margin: 2rem;
        border-radius: 23px;

    }

    .middle-top {
        border-color: #007560;

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
            <div class="content-container">
                <section class="middle p-12 flex gap-4 justify-between flex-col mb-5">
                    <div
                        class=" middle-top flex justify-between items-center py-2 border-t-2 border-b-2 max-w-full w-full  ">
                        <span class="px-5">NEW POST</span>
                        <span class="px-5">Date:19 September 2024</span>
                    </div>
                    <div class="my-8">
                        <h1 class="text-4xl  font-medium italic tracking-widest text-center">DRONE AND ITS TECH</h1>
                    </div>
                    <div class="w-full flex">
                        <div class="w-3/5 pr-3">
                            <p class="mb-3 text-xl">Drones are revolutionizing various sectors, with their applications
                                spanning agriculture, logistics, and security. These unmanned aerial vehicles enable
                                faster delivery, precision farming, and enhanced surveillance. Experts believe that as
                                technology advances, drones will play a crucial role in optimizing efficiency and
                                reducing costs. Events and seminars provide a platform for innovators to discuss
                                potential advancements and address challenges</p>
                            <p class="mb-3 text-xl">Drones are revolutionizing various sectors, with their applications
                                spanning agriculture, logistics, and security. These unmanned aerial vehicles enable
                                faster delivery, precision farming, and enhanced surveillance. Experts believe that as
                                technology advances, drones will play a crucial role in optimizing efficiency and
                                reducing costs. Events and seminars provide a platform for innovators to discuss
                                potential advancements and address challenges</p>
                            <p class="mb-3 text-xl">On 1st September, an event focusing on drone technology was held,
                                gathering experts, enthusiasts, and innovators from various fields. The event
                                highlighted the growing significance of drones in industries such as agriculture,
                                logistics, and defense. Keynote speakers shared insights into how drones are , gathering
                                experts, enthusiasts, and innovators from various fields. The event highlighted the
                                growing significance of drones in industries such as
                                highlighted
                                the growing significance of drones in industries such as
                                highlighted
                                the growing significance of drones in industries such as
                            </p>

                        </div>
                        <div class="w-2/5 images  gap-3 flex flex-col ml-5 items-center overflow-hidden">
                            <div class="flex w-full justify-center gap-5">
                                <img class="aspect-square w-1/2 object-cover" src="img/innovative-team3.webp" alt="">
                                <img class="aspect-square w-1/2 object-cover object-center"
                                    src="img/innovative-team4.webp" alt="">
                            </div>
                            <div class="flex w-full justify-center gap-5">
                                <img class="aspect-square w-1/2 object-cover object-center"
                                    src="img/innovative-team2.webp" alt="">
                                <img class="aspect-square w-1/2 object-cover" src="img/innovative-team4.webp" alt="">
                            </div>
                            <div class="flex justify-center w-full">
                                <img class="w-full" src="img\drone landscape1.jpg" alt="">
                            </div>
                        </div>


                    </div>
                    <div>
                        <p class="mb-3 text-xl">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente
                            laborum
                            eos, deleniti consequuntur obcaecati ipsam vero rem sequi, velit corporis accusantium,
                            quisquam
                            deserunt. Ipsam magnam quisquam consequatur fugiat est dicta. When we want to add something
                            in
                            the code the secret of typing fast is to just practise a lot day and night and you will
                            become a
                            man in typing you just have to focus on something new data types are two types one int and
                            another is float the differnce in these two is nothing but why we use them its because we
                            cannot
                            store decimal valuse in integer type it can only store integer type like 4343 thes are the
                            number without any decimal value</p>
                    </div>


                </section>
            </div>

            <div class="p-12 flex flex-col">
                <div class="mb-5">
                    <button
                        class="toggle-form-btn addActivitiesBtn bg-primary text-white rounded-full px-5 py-2 float-right"
                        data-add-text="Add Activity" data-close-text="Close Activity">
                        <i class="fa-solid fa-plus mr-1" style="color: #ffffff;"></i>
                        <span class="addActivitiesBtnTxt"> Add Activity</span>
                    </button>
                </div>
                <form action="activities.php" method="POST" enctype="multipart/form-data" class="form-bottom hidden ">
                    <div class=" w-full my-7">
                        <label class="" for="">Enter heading</label>
                        <input class=" w-full" type="text" name="heading" id="heading">
                    </div>
                    <div class="grid grid-cols-2 gap-5  w-full ">

                        <div class="">
                            <label for="">Paragraph 1 </label>
                            <textarea class="border border-sky-500 w-full p-3 min-h-52 max-h-72 " name="para-1"
                                id="para-1"></textarea>
                            <div class="flex justify-between">
                                <span class="charaters-txt">Your charaters:
                                    <span class="text-primary para1Lengthvalue">0</span>
                                </span>
                                <span class="text-yellow-600">400 < characters < 450 </span>
                            </div>
                        </div>
                        <div class="">
                            <label for="">Paragraph 2</label>
                            <textarea class="border border-sky-500 w-full p-3 min-h-52 max-h-72 " name="para-2"
                                id="para-2"></textarea>
                            <div class="flex justify-between">
                                <span class="charaters-txt">Your charaters:
                                    <span class="text-primary para1Lengthvalue">0</span>
                                </span>
                                <span class="text-yellow-600">400 < characters < 450 </span>
                            </div>
                        </div>
                        <div class="">
                            <label for="">Paragraph 3</label>
                            <textarea class="border border-sky-500 w-full p-3 min-h-52 max-h-72 " name="para-3"
                                id="para-3"></textarea>
                            <div class="flex justify-between">
                                <span class="charaters-txt">Your charaters:
                                    <span class="text-primary para1Lengthvalue">0</span>
                                </span>
                                <span class="text-yellow-600">400 < characters < 450 </span>
                            </div>
                        </div>
                        <div class="">
                            <label for="">Paragraph 4</label>
                            <textarea class="border border-sky-500 w-full p-3 min-h-52 max-h-72 " name="para-4"
                                id="para-4"></textarea>
                                <div class="flex justify-between">
                                <span class="charaters-txt">Your charaters:
                                    <span class="text-primary para1Lengthvalue">0</span>
                                </span>
                                <span class="text-yellow-600">200 < characters < 1000 </span>
                            </div>
                        </div>
                    </div>

                    <h1 class="my-3 text-xl">
                        Upload four Square images

                    </h1>

                    <div class="grid grid-cols-2 gap-5  w-full justify-between mt-5">


                        <div class="">

                            <label class="block">Image 1</label>
                            <input type="file" name="img-1" id="img-1" class="
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                      file:bg-violet-50 file:text-primary
                                      hover:file:bg-violet-100">
                        </div>
                        <div class="">
                            <label class="block">Image 2</label>
                            <input type="file" name="img-2" id="img-2" class="
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                      file:bg-violet-50 file:text-primary
                                      hover:file:bg-violet-100">
                        </div>
                        <div class="">
                            <label class="block">Image 3</label>
                            <input type="file" name="img-3" id="img-3" class="
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                      file:bg-violet-50 file:text-primary
                                      hover:file:bg-violet-100">
                        </div>
                        <div class="">
                            <label class="block">Image 4</label>
                            <input type="file" name="img-4" id="img-4" class="
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                      file:bg-violet-50 file:text-primary
                                      hover:file:bg-violet-100">
                        </div>
                    </div>

                    <div class="mt-6">
                        <h1 class="my-3  text-xl">
                            Upload one landsacape images

                        </h1>
                        <div class="">
                            <label class="block">Image 5</label>
                            <input type="file" name="img-5" id="img-5" class="
                                        file:mr-4 file:py-2 file:px-4
                                        file:rounded-full file:border-0
                                        file:text-sm file:font-semibold
                                      file:bg-violet-50 file:text-primary
                                      hover:file:bg-violet-100">
                        </div>
                    </div>



                    <button class="bg-primary text-white py-1.5 px-5 rounded-full mt-8 float-right submit-btn">Submit
                    </button>
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