

let caretdiv = document.querySelector(".caret-div");
let notfication = document.querySelector(".notification-bottom");

caretdiv.addEventListener("click", () => {
    if (notfication.style.maxHeight !== "0px") {
        notfication.style.maxHeight = "0px";
        caretdiv.querySelector("i").className = "fa-solid fa-caret-down text-iconColor transition-all duration-200 ease-in hover:text-primary cursor-pointer";
    } else {
        notfication.style.maxHeight = "24rem";
        caretdiv.querySelector("i").className = "fa-solid fa-xmark text-iconColor transition-all duration-200 ease-in hover:text-primary cursor-pointer";
    }
});


let textarea = document.querySelector("#addparagraph");
let submitbtn = document.querySelector(".submit-btn");



textarea.addEventListener("input", () => {
    checktextarea();

})

const checktextarea = () => {
    if (textarea.value.trim() == '') {
        if (submitbtn) {
            submitbtn.classList.add("disabled");
            submitbtn.disabled = true;
        }
    }
    else {
        submitbtn.classList.remove("disabled");
        submitbtn.disabled = false;
    }

}
checktextarea();  //Calling function to check value initailly


const getnotification = async () => {
    let response = await fetch('notificationapi.php');
    let data = await response.json();
    let newdata = data.reverse();
    if (newdata.length === 0) {
        document.querySelector(".notification-bottom").innerHTML += `
        <div class=" p-8 text-center m-auto text-xl flex flex-col justify-center items-center ">
            <div class=" max-w-56">
                <img class="w-full aspect-square" src="img/no-notificaton.svg" alt="" />
            </div>
             <p class="mt-5 text-2xl">No notifications added yet
             </p>
             <p class="mt-1 max-w-96 text-sm text-gray_base" >To start, simply add a new notification. Keep your dashboard current and organized.
             </p>
            <a class="inline-block bg-primary text-white py-2 px-5 rounded-full mt-5 p-2"  id="add-notification-empty" href="#add-notificaton" > 
            Upload notification
            </a>
        </div>`;
        let notificationButton = document.querySelector("#add-notification-empty");

        if (notificationButton) {
            notificationButton.addEventListener("click", (event) => {
            document.querySelector(".addNotificationBtnTxt") .innerText = "Close Notification";
            formDiv.style.display = "block";
            document.querySelector(".addNotificationBtn").querySelector("i").className = "fa-solid fa-minus mr-1";
            });
        }

    }
    else {
        newdata.forEach(content => {

            document.querySelector(".notification-bottom").innerHTML += `
                            <div
                            class=" border-b cursor-pointer justify-center align-middle flex items-center">
                            <a href="${content.pdf}" class="hover:text-primary p-3 inline-block w-full transition-all duration-200 ease-in text-center "> ${content.title},${content.order} ${content.id}</a>
                                <span class="px-6 border-l-2 border-solid border-iconColor delete-notification group" data-content="${content.title}" data-order="${content.order}" data-id="${content.id}">
                                    <i class="fa-solid fa-trash-can text-iconColor transition-all duration-200 ease-in group-hover:text-primary "  title="Delete this notification"></i>
                                </span>
                            </div>`;

        });

    }

}



document.addEventListener("DOMContentLoaded", () => {

    getnotification(); // Ensure this is called within DOMContentLoaded


});


document.querySelector(".notification-bottom").addEventListener("click", function (event) {
    let deleteNotification = event.target.closest(".delete-notification");
    if (deleteNotification) {
        let contentValue = deleteNotification.getAttribute("data-content");
        let order = deleteNotification.getAttribute("data-order");
        let id = deleteNotification.getAttribute("data-id");  // Fixed this line
        if (confirm(`Are you sure you want to delete ( ${contentValue} )`)) {
            deleteNotificationFun(id, order);
        }
    }
});



const deleteNotificationFun = (id, order) => {
    const url = `notificationdelete.php?id=${encodeURIComponent(id)}&order=${encodeURIComponent(order)}`;

    fetch(url, {
        method: 'POST',
    })
    .then(response => response.text())
    .then(response => {
        console.log(response)
        if (response.includes("Deleted notification")) {
            alert("Notification deleted please refresh the page");
        } else {
            console.log("From line 128", response);
        }
    })
    .catch(error => console.log("Error", error));
};







