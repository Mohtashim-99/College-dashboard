
let ContentContainer = document.querySelector(".content-container");

let fecthcontent =  async()=>{
    let response =  await fetch("activitiesapi.php");
    let data = await response.json();
    data.forEach(data => {
        ContentContainer.innerHTML+=`
         <section class="middle p-12 flex gap-4 justify-between flex-col mb-5">
          <div
                    class=" middle-top flex justify-between items-center py-2 border-t-2 border-b-2 max-w-full w-full  ">
                    <span class="px-5">NEW POST</span>
                    <span class="px-5">Date:19 September 2024</span>
                </div>
                <div class="my-8">
                    <h1 class="text-4xl  font-medium italic tracking-widest text-center">${data.heading}</h1>
                </div>
                <div class="w-full flex">
                    <div class="w-3/5 pr-3">
                        <p class="mb-3 text-xl">${data.paragraph1}</p>
                        <p class="mb-3 text-xl">${data.paragraph2}</p>
                        <p class="mb-3 text-xl">${data.paragraph3}
                        </p>

                    </div>
                    <div class="w-2/5 images  gap-3 flex flex-col ml-5 items-center overflow-hidden">
                        <div class="flex w-full justify-center gap-5">
                            <img class="aspect-square w-1/2 object-cover" src="${data.image1}" alt="">
                            <img class="aspect-square w-1/2 object-cover object-center" src="${data.image2}"
                                alt="">
                        </div>
                        <div class="flex w-full justify-center gap-5">
                            <img class="aspect-square w-1/2 object-cover object-center" src="${data.image3}"
                                alt="">
                            <img class="aspect-square w-1/2 object-cover" src="${data.image4}" alt="">
                        </div>
                        <div class="flex justify-center w-full">
                            <img class="w-full" src="${data.image5}" alt="">
                        </div>
                    </div>


                </div>
                <div>
                    <p class="mb-3 text-xl">${data.paragraph4}</p>
                </div>
            <section/>

        `
        
    });
    


}
fecthcontent();




let submitBtn = document.querySelector(".submit-btn");
let heading = document.querySelector("#heading");
let para1 = document.querySelector("#para-1");
let para2 = document.querySelector("#para-2");
let para3 = document.querySelector("#para-3");
let para4 = document.querySelector("#para-4");
let img1 = document.querySelector("#img-1");
let img2 = document.querySelector("#img-2");
let img3 = document.querySelector("#img-3");
let img4 = document.querySelector("#img-4");
let img5 = document.querySelector("#img-5");
let disableBtn = true;

const updateButtonState = () => {
    submitBtn.disabled = disableBtn;
    submitBtn.classList.toggle("disabled", disableBtn);
};


const checkInputFields = () => {
    // Set `disableBtn` to false only if all fields meet their conditions
    disableBtn = !( 
        heading.value.trim() !== "" &&
        para1.value.trim().length >= 400 && para1.value.trim().length <= 450 &&
        para2.value.trim().length >= 400 && para2.value.trim().length <= 450 &&
        para3.value.trim().length >= 400 && para3.value.trim().length <= 450 &&
        para4.value.trim().length >= 200 && para4.value.trim().length <= 1000 &&
        img1.files.length > 0 &&
        img2.files.length > 0 &&
        img3.files.length > 0 &&
        img4.files.length > 0 &&
        img5.files.length > 0
    );

    updateButtonState();
};

const checkCharacters = (para, min, max) => {
    para.addEventListener("input", () => {
        const paralength = para.value.length;
        
        const parentdiv = para.closest("div");
        const charLengthSpan = parentdiv.querySelector(".para1Lengthvalue");
        const charText = parentdiv.querySelector(".charaters-txt");

        // Display the current character count
        charLengthSpan.innerHTML = paralength;

        // Update text color based on character length
        if (paralength < min || paralength > max) {
            charText.style.color = "#d92632";
            charLengthSpan.style.color = "#d92632";
        } else {
            charText.style.color = "#000000";
            charLengthSpan.style.color = "#0C32F0";
        }

        // Re-evaluate all fields after updating this one
        checkInputFields();
    });
};

// Initialize character checks for each paragraph with specific character limits
checkCharacters(para1, 400, 450);
checkCharacters(para2, 400, 450);
checkCharacters(para3, 400, 450);
checkCharacters(para4, 200, 1000);

// Add listeners to heading and image fields to re-check inputs on each change
heading.addEventListener("input", checkInputFields);
img1.addEventListener("change", checkInputFields);
img2.addEventListener("change", checkInputFields);
img3.addEventListener("change", checkInputFields);
img4.addEventListener("change", checkInputFields);
img5.addEventListener("change", checkInputFields);

// Initial check on page load
checkInputFields();



// let submitBtn = document.querySelector(".submit-btn");
// let heading = document.querySelector("#heading");
// let para1 = document.querySelector("#para-1");
// let para2 = document.querySelector("#para-2");
// let para3 = document.querySelector("#para-3");
// let para4 = document.querySelector("#para-4");
// let img1 = document.querySelector("#img-1");
// let img2 = document.querySelector("#img-2");
// let img3 = document.querySelector("#img-3");
// let img4 = document.querySelector("#img-4");
// let img5 = document.querySelector("#img-5");
// let disableBtn = true;

// // Define updateButtonState function first
// const updateButtonState = () => {
//     if (disableBtn) {
//         submitBtn.classList.add("disabled");
//         submitBtn.disabled = true;
//     } else {
//         submitBtn.classList.remove("disabled");
//         submitBtn.disabled = false;
//     }
// };

// // Keeping checkInputFields as it is
// const checkInputFields = () => {
//     if (
//         heading.value.trim() !== "" &&
//         para1.value.trim() !== "" &&
//         para2.value.trim() !== "" &&
//         para3.value.trim() !== "" &&
//         para4.value.trim() !== "" &&
//         img1.files.length > 0 &&
//         img2.files.length > 0 &&
//         img3.files.length > 0 &&
//         img4.files.length > 0 &&
//         img5.files.length > 0
//     ) {
//         disableBtn = false;
//     } else {
//         disableBtn = true;
//     }
//     updateButtonState();
// };

// // Attach event listeners to call checkInputFields whenever a field changes
// heading.addEventListener("input", checkInputFields);
// para1.addEventListener("input", checkInputFields);
// para2.addEventListener("input", checkInputFields);
// para3.addEventListener("input", checkInputFields);
// para4.addEventListener("input", checkInputFields);
// img1.addEventListener("change", checkInputFields);
// img2.addEventListener("change", checkInputFields);
// img3.addEventListener("change", checkInputFields);
// img4.addEventListener("change", checkInputFields);
// img5.addEventListener("change", checkInputFields);

// // Initial check when the page loads
// checkInputFields();

// const checkCharacters = (para) => {
//     para.addEventListener("input", () => {
//         let paralength = para.value.length;

//         // Find specific elements within the current paragraph container
//         let parentdiv = para.closest("div");
//         let charLengthSpan = parentdiv.querySelector(".para1Lengthvalue");
//         let charText = parentdiv.querySelector(".charaters-txt");

//         charLengthSpan.innerHTML = paralength;

//         if (paralength < 400 || paralength > 450) {
//             disableBtn = true;
//             charText.style.color = "#d92632";
//             charLengthSpan.style.color = "#d92632";
//         } else {
//             disableBtn = false;
//             charText.style.color = "#000000";
//             charLengthSpan.style.color = "#0C32F0";
//         }
//         updateButtonState();
//     });
// };

// checkCharacters(para1);
// checkCharacters(para2);
// checkCharacters(para3);

// const checkCharactersForPara4 = (para) => {
//     para.addEventListener("input", () => {
//         let paralength = para.value.length;

//         // Find specific elements within the current paragraph container
//         let parentdiv = para.closest("div");
//         let charLengthSpan = parentdiv.querySelector(".para1Lengthvalue");
//         let charText = parentdiv.querySelector(".charaters-txt");

//         charLengthSpan.innerHTML = paralength;

//         if (paralength < 200 || paralength > 1000) {
//             disableBtn = true;
//             charText.style.color = "#d92632";
//             charLengthSpan.style.color = "#d92632";
//         } else {
//             disableBtn = false;
//             charText.style.color = "#000000";
//             charLengthSpan.style.color = "#0C32F0";
//         }
//         updateButtonState();
//     });
// };

// checkCharactersForPara4(para4);

