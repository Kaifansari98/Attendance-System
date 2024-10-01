<div class="teachers">
                <div class="card_header">
                    <h2>Teachers</h2>
                    <a href="php/exportteachers.php?data=teachers" class="btn">View All</a>
                </div>
                <table>
                        <thead>
                            <tr>
                                <td>Teacher Name's</td>
                                <td>Email</td>
                                <td>Contact#</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody id="teachersdata">
                      
                    </tbody>
                </table>
            </div>

            <script>
                // call ajax
    var ajax = new XMLHttpRequest();
    var method = "POST";
    var url = "php/teachersrecord.php";
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    //sending request
    ajax.send();

    //receiving response from teachersrecord.php
    ajax.onreadystatechange = function()
    {  
        if(this.readyState == 4 && this.status == 200){
            //converting JSON back to array
            var teachersdata = JSON.parse(this.responseText);
            //html value for <tbody>
            var html = "";
            //looping through the teachersdata
            for(var a = 0; a < teachersdata.length; a++){
                // var teacherid = teachersdata[a].teacher_id;
                var teachername = teachersdata[a].teacher_name;
                var teacheremail = teachersdata[a].teacher_email;
                var teachercontact = teachersdata[a].teacher_contact;
                var teacheruid = teachersdata[a].teacher_uid;
                var firstName = teachername.split(' ').slice(0, 1).join(' ');
                // appending in html
                html += "<tr>";
                html += "<td>" + firstName + "</td>";
                html += "<td>" + teacheremail + "</td>"
                html += "<td>" + teachercontact + "</td>";
                html += "<td><a href='./php/deleteteacherrecord.php?uid="+teacheruid+"' class='btn'>Delete</a></td>";
                html += "</tr>";
            }
            // replacing the <tbody> of <table>
            document.getElementById("teachersdata").innerHTML = html;
        }
    }

</script>