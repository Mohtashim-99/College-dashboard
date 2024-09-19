const URL = "facultyapi.php";

// Function to strip HTML tags from a string
const stripHtmlTags = (html) => {
    const div = document.createElement('div');
    div.innerHTML = html; // Set the inner HTML
    return div.innerText || div.textContent; // Return plain text
};

const getfacultydata = async () => {
    let response = await fetch(URL);
    let data = await response.json();
    let tbodyHTML = "";
    console.log(data);
    data.forEach((details, index) => {
        tbodyHTML += `<tr>
                        <td class=""         data-order="${details.order}" data-field="order">${details.order}</td>
                        <td class="editable" data-order="${details.order}" data-field="name">${details.name}</td>
                        <td class="editable" data-order="${details.order}" data-field="designation">${details.designation}</td>
                        <td class="editable" data-order="${details.order}" data-field="qualification">${details.qualification}</td>
                    </tr>`;
    });
    document.querySelector("#tbody-faculty-data").innerHTML = tbodyHTML;

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

getfacultydata();

document.getElementById('cancel-edit').addEventListener('click', () => {
    document.getElementById('editor-container').style.display = 'none';
    console.log("Editor canceled.");
});

document.getElementById('submit-edit').addEventListener('click', async () => {
    let editedContent = window.editor.getData();
    // Strip HTML tags
    // editedContent = stripHtmlTags(editedContent);
    
    let order = window.currentEditableOrder;
    let field = window.currentEditableField;

    console.log("Submitting edit:", editedContent, "order:", order, "Field:", field);

    // Create a POST request to update the data in the database
    let response = await fetch('facultyupdate.php', {
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



// Input validation code...


const inputs = document.querySelectorAll(".form-bottom input");
const submitBtn = document.querySelector(".submit-btn");

const checkInputs = () => {
    let disableBtn = false;
    inputs.forEach(input => {
            if (input.value.trim() == "") {
                disableBtn = true;

            }
        });
      
        if(disableBtn){
        submitBtn.disabled= true;
        submitBtn.classList.add("disabled"); 

        }
        else{
            submitBtn.classList.remove("disabled"); 
            submitBtn.disabled = false; 
        }

    

};

inputs.forEach(input =>{
    input.addEventListener("input" ,() =>{
        checkInputs();
    })
}) 


checkInputs();

