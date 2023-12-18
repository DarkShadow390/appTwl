// clock
let actualTime = () => {
    let date = new Date();
    let h = date.getHours();
    if(h<10){
        h = "0" + h;
    }
    let m = date.getMinutes();
    if(m<10){
        m = "0" + m;
    }
    let s = date.getSeconds();
    if(s<10){
        s = "0" + s;
    }
	return h + ":" + m + ":" + s;
};	

let tagDate = document.querySelector("#tagDate");
if(tagDate != null){
    let show = () => {
        tagDate.innerText = actualTime(); 
        setTimeout("show()",500);
    };
    window.onload = show();
}



//btn calendar
let btnCalendar = document.querySelector(".btnCalendar");
let calendar = document.querySelector("#calendar");
btnCalendar.addEventListener("click",()=>{
    calendar.classList.toggle("visibilityCalendar");
});



// btn modify task
// let btnModify = document.querySelector(".btnModify");

// btnModify.addEventListener("click",()=>{
//     calendar.classList.remove("visibilityCalendar");
//     txtTask.disabled =false;
//     txtTask.style.textDecoration= "none";
//     txtTask.style.background = "white";
// });


// btn validate task
let btnValidate = document.querySelector(".btnValidate");
let txtTask = document.querySelector(".txtTask");

btnValidate.addEventListener("click",()=>{
    txtTask.classList.toggle("btnValidateLineThrough");
});


// btn remove task
let btnRemove = document.querySelector(".btnRemove");
let task = document.querySelector(".task");


btnRemove.addEventListener("click",()=>{
    let message = document.createElement("div");
    let btnConfirm = document.createElement("button");
    let btnCancel = document.createElement("button");

    message.innerText = "Être vous sur de vouloir supprimer la tâche ?";
    btnConfirm.innerText = "comfirmer";
    btnCancel.innerText = "annuler";

    message.classList.add("stlyeBtnRemove");
    calendar.classList.remove("visibilityCalendar");

    message.appendChild(btnCancel);
    message.appendChild(btnConfirm);
    document.body.append(message);

    btnConfirm.addEventListener("click",()=>{
        message.remove();
        let timeTask = ()=>{
            calendar.remove();
            task.remove();
        }
        setTimeout(timeTask,800);
        
    });
    btnCancel.addEventListener("click",()=>{
        message.remove();
    });
});


// btn add task
let espace = document.querySelector(".espace");
let buttonAdd = document.querySelector(".buttonAdd");

buttonAdd.addEventListener("click",()=>{

    // create task component
    let blockArticle = document.createElement("article");
    let blockDiv = document.createElement("div");
    let blockInput = document.createElement("input");
    let blockBtnCalendar = document.createElement("button");
    let blockBtnModify = document.createElement("button");
    let blockBtnValide = document.createElement("button");
    let blockBtnRemove = document.createElement("button");
    let blockIone = document.createElement("i");
    let blockItwo = document.createElement("i");
    let blockIthree = document.createElement("i");
    let blockIfour = document.createElement("i");


    // add type input
    blockInput.type = "text";

    //define button names

    blockIone.className = "bx bx-edit";
    blockIone.style.color = "orange";

    blockItwo.className = "bx bx-calendar";
    blockItwo.style.color = "blue";

    blockIthree.className = "bx bx-calendar-check";
    blockIthree.style.color = "green";

    blockIfour.className = "bx bx-trash";
    blockIfour.style.color = "red";

    
    //adds classes
    blockBtnCalendar.className = "btnTask btnCalendar";
    blockBtnModify.className = "btnTask btnModify";
    blockBtnValide.className = "btnTask btnValidate";
    blockBtnRemove.className = "btnTask btnRemove";
    blockInput.className = "txtTask";
    blockArticle.className = "task";

    //adds style
    blockArticle.style.marginTop = "20px";
    blockInput.placeholder = "Tapez votre tâche :";
    

    //adds task composer to html
    blockArticle.appendChild(blockDiv);
    blockDiv.appendChild(blockInput);
    blockDiv.appendChild(blockBtnModify);

    blockBtnModify.appendChild(blockIone);
    blockBtnCalendar.appendChild(blockItwo);
    blockBtnValide.appendChild(blockIthree);
    blockBtnRemove.appendChild(blockIfour);

    blockDiv.appendChild(blockBtnCalendar);
    blockDiv.appendChild(blockBtnValide);
    blockDiv.appendChild(blockBtnRemove);
    espace.append(blockArticle);

    //modify task
    // blockBtnModify.addEventListener("click",()=>{
    //     blockInput.disabled =false;
    //     blockInput.style.textDecoration = "none";
    //     blockInput.style.background = "white";
    // })

    //validate task
    blockBtnValide.addEventListener("click",()=>{
        blockInput.classList.toggle("btnValidateLineThrough");
    })

    //remove task
    blockBtnRemove.addEventListener("click",()=>{
        blockArticle.remove();
    })
    ;
});





// display mouth 
let displayMonth = document.querySelector(".itemMouth");
let month2023 = ["JANVIER","FÉVRIER","MARS","AVRIL","MAI","JUIN","JUILLET","AOÛT","SEPTEMBRE","OCTOBRE","NOVEMBRE","DÉCEMBRE"]
let date = new Date();
let dateMonth = date.getMonth();
let dateYear = date.getFullYear();
displayMonth.innerText = month2023[dateMonth] + " " + dateYear;

//switch months
let btnMonthRight = document.querySelector("#btnMonthRight")
btnMonthRight.addEventListener("click",()=>{
    if(dateMonth == 11){
        dateMonth = 0;
        dateYear += 1;
        displayMonth.innerText = month2023[dateMonth]  + " " + dateYear;
    }
    else{
        displayMonth.innerText = month2023[dateMonth +=1]  + " " + dateYear;
    }
});

let btnMonthLeft = document.querySelector("#btnMonthLeft")
btnMonthLeft.addEventListener("click",()=>{
    if(dateMonth == 0){
        dateMonth = 11;
        dateYear -= 1;
        displayMonth.innerText = month2023[dateMonth]  + " " + dateYear;
    }
    else{
        displayMonth.innerText = month2023[dateMonth -=1]  + " " + dateYear;
    }

});






//display week in progress
let week2023 = ["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];
let dateWeek = date.getUTCDay();

let itemMonday = document.querySelector("#itemMonday");
let itemTuesday = document.querySelector("#itemTuesday");
let itemWednesday = document.querySelector("#itemWednesday");
let itemThursday = document.querySelector("#itemThursday");
let itemFriday = document.querySelector("#itemFriday");
let itemSaturday = document.querySelector("#itemSaturday");
let itemSunday = document.querySelector("#itemSunday");


const date8 = new Date('SEPTEMBRE 1, 2023 23:15:30 GMT+11:00');
// console.log(date8);
// console.log("date8",date8.getUTCDay());

itemMonday.innerText = week2023[date8.getUTCDay()];
itemTuesday.innerText = week2023[dateWeek];
itemWednesday.innerText = week2023[dateWeek];
itemThursday.innerText = week2023[dateWeek];
itemFriday.innerText = week2023[dateWeek];
itemSaturday.innerText = week2023[dateWeek];
itemSunday.innerText = week2023[dateWeek];



// display day in progress

const date1 = new Date(`${month2023[dateMonth]} ${date.getUTCDate()}, ${dateYear} 23:15:30 GMT+11:00`);
const date2 = new Date('August 2, 2023 23:15:30 GMT+11:00');
const date3 = new Date('August 3, 2023 23:15:30 GMT+11:00');
const date4 = new Date('August 4, 2023 23:15:30 GMT+11:00');
const date5 = new Date('August 5, 2023 23:15:30 GMT+11:00');
const date6 = new Date('August 6, 2023 23:15:30 GMT+11:00');
const date7 = new Date('August 7, 2023 23:15:30 GMT+11:00');

dateDays = date1.getUTCDate();
dateDays2 = date2.getMonth();
// console.log("date1",date1);
// console.log("date1 e",dateDays);
function test(){

    while(dateWeek < 31){
        console.log(dateDays);
        dateDays +=7;
    };
};

