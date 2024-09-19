const URL = "facultyapi.php";

const getfacultydata = async () => {
    let response = await fetch(URL);
    let data = await response.json();
    let tbodyHTML = "";
    console.log(data);
    data.forEach((details, index) => {
        tbodyHTML += `<tr>
                        <td class=""         data-Sno="${details.sno}" data-field="sno">${details.order}</td>
                        <td class="editable" data-Sno="${details.sno}" data-field="name">${details.name}</td>
                        <td class="editable" data-Sno="${details.sno}" data-field="email">${details.designation}</td>
                        <td class="editable" data-Sno="${details.sno}" data-field="datetime">${details.qualification}</td>
                    </tr>`;
    });
    document.querySelector("#tbody-faculty-data").innerHTML = tbodyHTML;


    document.querySelectorAll(".editable").forEach((element) => {
        element.addEventListener("mousedown", (event) => {
            if (event.button === 2) {
                event.preventDefault();
                let confirmedit = confirm("Do you want to open the editor for the clicked element?");
                if (confirmedit) {
                    let currentElement = element.innerHTML;
                    window.editor.setData(currentElement.trim());
                    window.currentEditableElement = element;
                    window.currentEditableSno = element.getAttribute('data-sno');
                    window.currentEditableField = element.getAttribute('data-field');
                    document.getElementById('editor-container').style.display = 'block';
                    console.log("Editor opened for element:", currentElement, "Sno:", window.currentEditableSno, "Field:", window.currentEditableField);
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
    let sno = window.currentEditableSno;
    let field = window.currentEditableField;

    console.log("Submitting edit:", editedContent, "Sno:", sno, "Field:", field);

    // Create a POST request to update the data in the database
    let response = await fetch('facultyupdate.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            'sno': sno,
            'field': field,
            'content': editedContent
        })
    });

    let result = await response.text();
    console.log(result);

    if (result.includes("Record updated successfully")) {
        window.currentEditableElement.innerHTML = editedContent;
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
        }, 1000); // Revert colors after 1 seconds
    } else {
        alert("Error updating record");
    }
});


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

