
const fetchAdminDataForDashboard = () => {
    fetch("admin-details.php")
        .then(response => response.json())
        .then(data => {

            document.querySelector(".middle-left").innerHTML = ` 
             <div class="middle-left-pp w-28 mb-5 overflow-hidden rounded-full">
                        <img class="aspect-square object-contain "
                            src="img/pngtree-cartoon-color-simple-male-avatar-png-image_1934459.jpg" alt="">
                    </div>

                    <span class="text-xl mb-5">${data.name}</span>
                    <span>${data.designation}</span>
                    <span>Head of the department</span>
                    <span>${data.department}</span>
            `;

            

        })
        .catch(error => {
            console.error('Error fetching admin data:', error);
        })
}


fetchAdminDataForDashboard();



const getcontent = async () => {

    let response = await fetch("dashboardapi.php");
    let data = await response.json();
    console.log(data);
    

    const headings = data.filter(item => item.type === 'heading'); // Use 'para_type' from the API response
    const paragraphs = data.filter(item => item.type === 'para');   // Use 'para_type' from the API response



    const headingContent = headings[0].content;
    document.querySelector(".heading-div").innerHTML = `
    <h1 class="font-medium text-3xl text-primary mb-12 editable">${headingContent}</h1>`;


    paragraphs.forEach((para) => {
        document.querySelector(".pragraphs").innerHTML += `
        <p class="text-xl mb-4 editable"> ${para.content}
         </p>
            `
    });



}
getcontent();


let formdiv = document.querySelector(".form-div");
let addbtn = document.querySelector(".addbtn");
let textarea = document.querySelector("#addparagraph");
let toggleparagaph=document.querySelector(".toggleparagaph");
let toggleparagaphtxt = document.querySelector(".toggleparagaphtxt");


toggleparagaph.addEventListener("click", () => {
    if (formdiv.style.display === "flex") {
        toggleparagaphtxt.innerText = "Add Paragraph";
        toggleparagaph.querySelector("i").className = "fa-solid fa-plus mr-1";
        formdiv.style.display = "none";
    } else {
        toggleparagaphtxt.innerText = "Close Paragraph";
        toggleparagaph.querySelector("i").className = "fa-solid fa-minus mr-1";
        formdiv.style.display = "flex";
    }
});

textarea.addEventListener("input", () => {
    checktextarea();

});


const checktextarea = () => {
    if (textarea.value.trim() == '') {
        if (addbtn) {
            addbtn.classList.add("disabled");
            addbtn.disabled = true;
        }
    }
    else {
        addbtn.classList.remove("disabled");
        addbtn.disabled = false;
    }

}
checktextarea();  //Calling function to check value initailly




