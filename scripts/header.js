let headerHTML = `
    <div class="right-main-profile float-right flex items-center px-4 w-auto gap-3 transition-all duration-200 ease-in group hover:text-primary cursor-pointer">
        <div class="profile-photo w-12 overflow-hidden rounded-full">
            <img class="aspect-square object-contain w-12" src="img/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg" alt="">
        </div>
        <div class="profile-name inline-block">
            <span class="whitespace-nowrap"></span>
        </div>
        <span>
            <i class="fa-solid fa-caret-down text-iconColor transition-all duration-200 ease-in group-hover:text-primary"></i>
        </span>
    </div>
    
    <div class="profile-dropdown absolute h-auto min-w-72 box-border right-0 mr-8 z-10 bg-white hidden top-16 whitespace-nowrap flex-col transition-all duration-1000 ease-in">
        <div class="profile-dropdown-top flex overflow-hidden items-center px-6 py-4 gap-2 flex-1 flex-nowrap">
            <!-- From database -->
        </div>
        <hr>
        <ul class="py-3">
            <li>
                <a class="px-6 py-1.5 text-sm flex items-center gap-3 transition-all duration-200 ease-in group hover:text-primary hover:pl-9" href="">
                    <i class="fa-solid fa-user text-iconColor transition-all duration-200 ease-in group-hover:text-primary"></i>
                    <span>Your profile</span>
                </a>
            </li>
            <li>
                <a class="px-6 py-1.5 text-sm flex items-center gap-3 transition-all duration-200 ease-in group hover:text-primary hover:pl-9" href="">
                    <i class="fa-solid fa-circle-info text-iconColor transition-all duration-200 ease-in group-hover:text-primary"></i>
                    <span>Account details</span>
                </a>
            </li>
            <li>
                <a class="px-6 py-1.5 text-sm flex items-center gap-3 transition-all duration-200 ease-in group hover:text-primary hover:pl-9" href="">
                    <i class="fa-solid fa-shuffle text-iconColor transition-all duration-200 ease-in group-hover:text-primary"></i>
                    <span>Switch account</span>
                </a>
            </li>
            <li>
                <a class="px-6 py-1.5 text-sm flex items-center gap-3 transition-all duration-200 ease-in group hover:text-primary hover:pl-9" href="password.php">
                    <i class="fa-solid fa-unlock text-iconColor transition-all duration-200 ease-in group-hover:text-primary"></i>
                    <span>Change password</span>
                </a>
            </li>
            <hr>
            <li>
                <a class="px-6 py-1.5 mt-2 text-sm flex items-center gap-3 transition-all duration-200 ease-in group hover:text-primary hover:pl-9" href="logout.php">
                    <i class="fa-solid fa-arrow-right-from-bracket text-iconColor transition-all duration-200 ease-in group-hover:text-primary"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
`;

document.querySelector(".main-top-right").innerHTML = headerHTML;

let profile = document.querySelector(".right-main-profile");
let profieDropdown = document.querySelector(".profile-dropdown");





profile.addEventListener("click", (event) => {
    event.stopPropagation();  // Prevent the click from propagating to the window
    if (profieDropdown.style.display === "none" || profieDropdown.style.display === "") {
        profieDropdown.style.display = "flex";
    } else {
        profieDropdown.style.display = "none";
    }
});

window.addEventListener("click", (event) => {
    if (!profieDropdown.contains(event.target) && event.target !== profile) {
        profieDropdown.style.display = "none";
    }
});

const fetchadmindata = () => {
    fetch("admin-details.php")
        .then(response => response.json())
        .then(data => {

           
            document.querySelector(".profile-name").innerHTML = `
                <span class="whitespace-nowrap ">${data.name}</span>`;
            document.querySelector(".profile-dropdown-top").innerHTML = `
            <div class="flex justify-center  overflow-hidden rounded-full">
                    <img class="aspect-square object-contain w-16"
                    src="${data.photo}" alt="">
            </div>
            <div class="">
                    <span class="whitespace-nowrap text-2xl font-medium">${data.name}</span>
            </div>`
            document.querySelector(".profile-photo").innerHTML=`
            <img class="aspect-square object-contain w-12 "
                                src="${data.photo}" alt="">`;

        })
        .catch(error => {
            console.error('Error fetching admin data:', error);
        })
}


fetchadmindata();
