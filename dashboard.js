
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

// Function to strip HTML tags from a string
const stripHtmlTags = (html) => {
    const div = document.createElement('div');
    div.innerHTML = html; // Set the inner HTML
    return div.innerText || div.textContent; // Return plain text
};


const getcontent = async () => {

    let response = await fetch("dashboardapi.php");
    let data = await response.json();
    // console.log(data);
    

    const headings = data.filter(item => item.type === 'heading'); // Use 'para_type' from the API response
    const paragraphs = data.filter(item => item.type === 'para');   // Use 'para_type' from the API response



    const headingContent = headings[0].content;
    document.querySelector(".heading-div").innerHTML = `
    <h1 class="font-medium text-3xl text-primary mb-12 editable">${headingContent}</h1>`;

    // console.log(paragraphs);
    paragraphs.forEach((para) => {
        
        document.querySelector(".pragraphs").innerHTML += `
        <p class="text-xl mb-4 editable" data-order="${para.order}" data-field="content"> ${para.content}
         </p>
            `
    });
    document.querySelectorAll(".editable").forEach((element) => {
        element.addEventListener("mousedown", (event) => {
            if (event.button === 2) {
                event.preventDefault();
                let confirmedit = confirm("Do you want to open the editor for the clicked element?");
                if (confirmedit) {
                    let currentElement = element.innerText;
                    window.editor.setData(currentElement.trim());
                    window.currentEditableElement = element;
                    window.currentEditableOrder = element.getAttribute('data-order');
                    window.currentEditableField = element.getAttribute('data-field');
                    document.getElementById('editor-container').style.display = 'block';
                    console.log("Editor opened for element:", currentElement, "order:", window.currentEditableOrder, "Field:", window.currentEditableField);
                }
            }
        });
    });



}
getcontent();

document.getElementById('cancel-edit').addEventListener('click', () => {
    document.getElementById('editor-container').style.display = 'none';
    console.log("Editor canceled.");
}); 

document.getElementById('submit-edit').addEventListener('click', async () => {
    let editedContent = window.editor.getData();
    // Strip HTML tags
    editedContent = stripHtmlTags(editedContent);
    
    let order = window.currentEditableOrder;
    let field = window.currentEditableField;

    console.log("Submitting edit:", editedContent, "order:", order, "Field:", field);

    // Create a POST request to update the data in the database
    let response = await fetch('dashboardupdate.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'order': order,
            'field': field,
            'content': editedContent
        })
    });

    let result = await response.text();
    console.log(result);

    if (result.includes("Record updated successfully")) {
        window.currentEditableElement.innerHTML = editedContent; // Update UI
        // Temporarily remove the transition property
        window.currentEditableElement.style.transition = "none";
        window.currentEditableElement.style.backgroundColor = "#008000";
        window.currentEditableElement.style.color = "#ffffff";
        document.getElementById('editor-container').style.display = 'none';
        console.log("UI updated successfully.");
        setTimeout(() => {
            window.currentEditableElement.style.transition = "all .3s ease";
            window.currentEditableElement.style.backgroundColor = "";
            window.currentEditableElement.style.color = "";
        }, 1000); // Revert colors after 1 second
    } else {
        alert("Error updating record");
    }
});





let addbtn = document.querySelector(".addbtn");
let textarea = document.querySelector("#addparagraph");
let toggleparagaphtxt = document.querySelector(".toggleparagaphtxt");


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




