const edit_form = document.querySelector('.edit_teacher #edit_form'),
editteacherbtn = form.querySelector('.addteacherbtn input'),
editerrortxt = form.querySelector('.edit_error-text');
console.log("Error");
edit_form.onsubmit = (i) =>{
    i.preventDefault();         //stops the default action
}

editteacherbtn.onclick = () =>{
    // start ajax

    let exhr = new XMLHttpRequest(); // create xml object
    exhr.open("POST","./php/editteacherrecord.php",true);
    exhr.onload = () =>{

        if(exhr.readyState === XMLHttpRequest.DONE){
            if(exhr.status === 200){
                let editdata = exhr.response;
                    if(editdata == "success"){
                        location.href = "teachers.php";            //   ./teachers.php
                        console.log("false");

                    }
                    else{
                        console.log("true");

                        editerrortxt.textContent = editdata;
                        editerrortxt.style.display = "block";
                    }
            }
        }

    }
    // send data through ajax to php
    let editformData = new FormData(edit_form); //creating new object from form data
    xhr.send(editformData);  //sending data to php
}