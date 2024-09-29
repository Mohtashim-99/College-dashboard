
            let sidebarHTML = `<div class="left-container-logo-div w-28 py-3 pl-7 box-border max-w-full h-auto">
                <img class="aspect-square object-contain max-w-full" src="img/Degree_college_boya_baramulla_logo.jpeg"
                    alt="">
            </div>
            <ul class="sidebarul">
                 <li class=" dashboard-li ">
                    <a class="dashboard-txt side-a w-full inline-block py-4  px-6 pl-8 hover:pl-10 "
                        href="dashboard.php">Dashboard
                    </a>
                </li>

                <li class="faculty-li">
                    <a class="faculty-txt w-full side-a inline-block py-4 px-6 pl-8 hover:pl-10 hover:"
                        href="faculty.php">Faculty</a>
                </li>
                <li class="notification-li">
                    <a class="w-full side-a inline-block py-4 px-6 pl-8 hover:pl-10" href="notification.php">Notifcations</a>
                </li>
                <li class="infrastructure-li">
                    <a class="w-full side-a inline-block py-4 px-6 pl-8 hover:pl-10" href="infrastructure.php">Infrastructure</a>
                </li>
                <li class="activities-li">
                    <a class="w-full side-a inline-block py-4 px-6 pl-8 hover:pl-10" href="activities.php">Activties </a>
                </li>
                <li class="Programmes-li">
                    <a class="w-full side-a inline-block py-4 px-6 pl-8 hover:pl-10" href="Programmes.php">Programmes </a>
                </li>

                <li class="services-li">
                    <a class="w-full side-a inline-block py-4 px-6 pl-8 hover:pl-10" href="services.php">Services</a>
                </li>

            </ul>`;
            document.querySelector(".left-container-inner").innerHTML=sidebarHTML;