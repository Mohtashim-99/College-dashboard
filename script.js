let currentElement = null;

document.addEventListener("DOMContentLoaded", function () {
    fetch('script.php')
        .then(response => response.json())
        .then(data => {
            let tbody = document.getElementById('student-table-body');
            data.forEach((student, index) => {
                let row = `<tr>
                        <td class="editable">${index + 1}</td>
                        <td class="editable">${student.name}</td>
                        <td class="editable">${student.email}</td>
                    </tr>`;
                tbody.innerHTML += row;
            });

            
            document.querySelectorAll('.editable').forEach(element => {
                element.addEventListener('mousedown', (event) => {
                    if (event.button === 2) { // Check if right mouse button was clicked
                        event.preventDefault();
                        const confirmEdit = confirm('Do you want to open the editor for the clicked element?');
                        if (confirmEdit) {
                            currentElement = event.target;
                            window.editor.setData(currentElement.innerHTML.trim());
                            document.getElementById('editor-container').style.display = 'block';
                        }
                    }
                });
            });
        })
        .catch(error => console.error('Error fetching data:', error));

        document.getElementById('cancel-edit').addEventListener('click', () => {
        document.getElementById('editor-container').style.display = 'none'; 
    });
});




    