


const getAdminDetails = async()  =>{
    let data = await fetch("admin-details.php");
    let response = await data.json();
    document.querySelector("#full-name").value=response.name;
    document.querySelector("#username").value=response.username;
    document.querySelector("#email").value=response.email;


}

getAdminDetails();