const getprogrammes =  async () =>{
    let response = await fetch("programmesapi.php");
    let data = await  response.json();
    console.log(data);
    data.forEach(details => {
        document.querySelector("#tbody-programmes-data").innerHTML+=` <tr>
                            <td>${details.order}</td>
                            <td class="editable"  data-order="${details.order}" data-field="degree">${details.degree}</td>
                            <td class="editable"  data-order="${details.order}" data-field="intake_capacity">${details.intake_capacity}</td>
                            <td class="editable"  data-order="${details.order}" data-field="eligibilty">${details.eligibilty}</td>
                            <td class="editable"  data-order="${details.order}" data-field="mode_of_admission">${details.mode_of_admission}</td>
                    </tr>`;
        
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
getprogrammes();


document.getElementById('submit-edit').addEventListener('click', async () => {
    let editedContent = window.editor.getData();
    // Strip HTML tags
    // editedContent = stripHtmlTags(editedContent);
    
    let order = window.currentEditableOrder;
    let field = window.currentEditableField;

    console.log("Submitting edit:", editedContent, "order:", order, "Field:", field);

    // Create a POST request to update the data in the database
    let response = await fetch('Programmesupdate.php', {
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


document.getElementById('cancel-edit').addEventListener('click', () => {
    document.getElementById('editor-container').style.display = 'none';
    console.log("Editor canceled.");
}); 


