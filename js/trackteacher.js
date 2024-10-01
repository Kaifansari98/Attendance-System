const track = document.querySelector('.trackstd form'),
trackbtn = track.querySelector('.trackbtn input'),
errortxt = track.querySelector('.error-text');

track.onsubmit = (e) =>{
    e.preventDefault();         //stops the default action
}

trackbtn.onclick = () =>{
    // start ajax

    let xhr = new XMLHttpRequest(); // create xml object
    xhr.open("POST","./php/trackteacherlogin.php",true);
    xhr.onload = () =>{

        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                    if(data == "success"){
                        location.href = "./trackteacher_data.php";
                    }
                    else{
                        errortxt.textContent = data;
                        errortxt.style.display = "block";
                    }
            }
        }

    }
    // send data through ajax to php
    let formData = new FormData(track); //creating new object from form data
    xhr.send(formData);  //sending data to php
}