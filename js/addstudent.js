const form = document.querySelector('.add_student form'),
addstudentbtn = form.querySelector('.addstudent_btn input'),
errortxt = form.querySelector('.error-text');

form.onsubmit = (e) =>{
    e.preventDefault();         //stops the default action
}

addstudentbtn.onclick = () =>{
    // start ajax

    let xhr = new XMLHttpRequest(); // create xml object
    xhr.open("POST","./php/addstudentrecord.php",true);
    xhr.onload = () =>{

        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                    if(data == "success"){
                        location.href = "students.php";            //   ./classes.php
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