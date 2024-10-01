const form = document.querySelector('#add_teacher form'),
addteacherbtn = form.querySelector('.addteacherbtn input'),
errortxt = form.querySelector('.error-text');

form.onsubmit = (e) =>{
    e.preventDefault();         //stops the default action
}

addteacherbtn.onclick = () =>{
    // start ajax

    let xhr = new XMLHttpRequest(); // create xml object
    xhr.open("POST","./php/addteacherrecord.php",true);
    xhr.onload = () =>{

        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                    if(data == "success"){
                        location.href = "teachers.php";            //   ./teachers.php
                    }
                    else{
                        errortxt.textContent = data;
                        errortxt.style.display = "block";
                    }
            }
        }

    }
    // send data through ajax to php
    let formData = new FormData(form); //creating new object from form data
    xhr.send(formData);  //sending data to php
}