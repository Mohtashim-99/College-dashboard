let passwordfiled= document.querySelector("#pass");
let checkbox = document.querySelector("#showpass");
checkbox.addEventListener("click" ,() =>{
    if(checkbox.checked){
    passwordfiled.type="text";

}    else{
    passwordfiled.type="password"
}

})     




let btn = document.querySelector(".login-btn");
btn.addEventListener("click", () => {
    // Get form fields
    let username = document.getElementById("username").value;
    let password = document.getElementById("pass").value;

    // Check if all required fields are filled
    if (username.trim() && password.trim()) {
        // Change button inner HTML if validation passes
        btn.innerHTML = `
            <span>
                <l-infinity
                    size="55"
                    stroke="4"
                    stroke-length="0.15"
                    bg-opacity="0.1"
                    speed="1.3"
                    color="white"
                ></l-infinity>
            </span>
        `;
        // Optional: Submit the form or perform further actions here
    }
    // If validation fails, do nothing and prevent the button update
});

