let newPass = document.querySelector("#new-password-1");
let confirmPass = document.querySelector("#confirm-new-password");
let error = document.querySelector(".label-error");
let saveChanges = document.querySelector(".save-changes-btn");

// Initially disable the button
saveChanges.classList.add("disabled");
saveChanges.disabled = true;

const checkPasswords = () => {
    if (newPass.value.trim() === "" && confirmPass.value.trim() === "") {
        error.style.display = "none";
        
    }
    else if (newPass.value.trim() === confirmPass.value.trim()) {
        error.style.display = "none";
        saveChanges.classList.remove("disabled");
        saveChanges.disabled = false; // Enable the button
    } else {
        error.style.display = "block";
        saveChanges.classList.add("disabled");
        saveChanges.disabled = true; // Disable the button
    }
}

confirmPass.addEventListener("input", () => {
    checkPasswords();
   
});


newPass.addEventListener("input", () => {
    if (confirmPass.value.trim() !== "") {
        checkPasswords();

    }
    if (newPass.value.trim() === "" && confirmPass.value.trim() === "") {
        error.style.display = "none";
        console.log("Hide the error message");
    }
}); 



//Check intially
if (newPass.value.trim() === "" && confirmPass.value.trim() === "") {
    error.style.display = "none";
    console.log("Hide the error message");
}







document.querySelector(".cancel-btn").addEventListener("click", function () {
    // Reset the form fields (optional)
    document.querySelector("form").reset();

});
