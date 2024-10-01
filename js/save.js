
$(document).ready(function(){
    function autoSave()
    {
        var attendance_attend = $('#attendance_attend').val();
        var attendance_id = $('#attendance_id').val();
        var student_name = $('#student_name').val();
        var student_class = $('#student_class').val();

    if(attendance_attend != '' && attendance_id != '' && student_name != '' && student_class != ''){
        $.ajax({
            url: "php/save_attendance.php",
            method: "POST",
            data:{Attendance_Attend: attendance_attend, Attendance_Id: attendance_id, Student_name: student_name, Student_class: student_class},
            dataType: "text",
            succss:function(data){
                if(data != ''){
                    console.log("if data!");
                    $('#attendance_id').val(data);
                }
                $('#autosave').text("Post save as draft");
                setInterval(function(){
                    $('#autosave').text('');
                }, 2000);
            }
        });
    }
    }

    setInterval(function(){
        autoSave();
    }, 10000);

});