const getprogrammes =  async () =>{
    let response = await fetch("programmesapi.php");
    let data = await  response.json();
    console.log(data);
    data.forEach(details => {
        document.querySelector("#tbody-programmes-data").innerHTML+=` <tr>
                            <td>${details.order}</td>
                            <td>${details.degree}</td>
                            <td>${details.intake_capacity}</td>
                            <td>${details.eligibilty}</td>
                            <td>${details.mode_of_admission}</td>
                    </tr>`;
        
    });

}
getprogrammes();