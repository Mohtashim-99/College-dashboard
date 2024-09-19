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

        })
        .catch(error => {
            console.error('Error fetching admin data:', error);
        })
}


fetchadmindata();


//logic for hamburger

let bars = document.querySelector(".bars-div");
let leftContainer = document.querySelector(".left-container");
let body = document.querySelector("body");

bars.addEventListener("click", () => {
    if (leftContainer.style.left === "0" || leftContainer.style.left === "0px") {
        leftContainer.style.left = "-100%"
        body.style.overflow = "unset";
    }
    else {
        leftContainer.style.left = "0"
        body.style.overflow = "hidden";
    }
});
window.addEventListener("click", (event) => {

    if (!bars.contains(event.target) && !leftContainer.contains(event.target) && leftContainer.style.left === "0px") {
        leftContainer.style.left = "-100%";
        body.style.overflow = "unset";



    }
});


//logic for add btn in all pages 
// toggle functionlaity
let toggleBtn = document.querySelector(".toggle-form-btn");
let toggleBtnTxt = document.querySelector(".toggle-form-btn span");
let formDiv = document.querySelector(".form-bottom");


// Get default texts from data attributes
let addText = toggleBtn.getAttribute("data-add-text");
let closeText = toggleBtn.getAttribute("data-close-text");

toggleBtn.addEventListener("click", () => {
    if (formDiv.style.display == "block") {
        toggleBtnTxt.innerText = addText; // Use the data attribute for the add text
        toggleBtn.querySelector("i").className = "fa-solid fa-plus mr-1";
        formDiv.style.display = "none";
    }
    else {
        toggleBtnTxt.innerText = closeText; // Use the data attribute for the close text
        formDiv.style.display = "block";
        toggleBtn.querySelector("i").className = "fa-solid fa-minus mr-1";

    }

});



