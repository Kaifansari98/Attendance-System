const attendance = document.querySelector('.attendance_area form'),
saveattendance = document.querySelector('.save_attendance_btn input');

attendance.onsubmit = (e) =>{
    e.preventDefault();         //stops the default action
}

saveattendance.onclick = () =>{
    // start ajax

    let xhr = new XMLHttpRequest(); // create xml object
    xhr.open("POST","./php/attendancerecordnewteacher.php",true);
    xhr.onload = () =>{

        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                    if(data == "success"){
                        alert("Attendance Save");
                        location.href = "attendance.php";
                    }
                    else{
                        alert(data);
                    }
            }
        }

    }
    // send data through ajax to php
    let formData = new FormData(attendance); //creating new object from form data
    xhr.send(formData);  //sending data to php
}