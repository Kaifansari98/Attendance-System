const attendance = document.querySelector('.attendance_area form'),
update_attendance_btn = document.querySelector('.update_attendance_btn input');

attendance.onsubmit = (e) =>{
    e.preventDefault();         //stops the default action
}

update_attendance_btn.onclick = () =>{
    // start ajax

    let xhr = new XMLHttpRequest(); // create xml object
    xhr.open("POST","./php/attendancerecordupdate.php",true);
    xhr.onload = () =>{
        
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                    if(data == "success"){
                        alert("Attendance Update");
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