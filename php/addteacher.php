

<div class="add_teacher" id="add_teacher">
                <div class="card_header">
                    <h2>Add Teachers</h2>
                </div>
                <form action="" enctype="multipart/form-data" autocomplete="off">
                <div class="error-text"></div>
                    <div class="form_control">
                        <label for="teachername">Teacher Name</label>
                        <input type="text" placeholder="Teacher name" id="teachername" name="teachername" required>
                    </div>
                    <div class="form_control">
                        <label for="specialist">Subject Specialist <span style="float:right;color: #666;">(optional)</span></label>
                        <input type="text" placeholder="Subject Specialist" id="specialist" name="specialist">
                    </div>
                    <div class="form_control">
                        <label for="teacheremail">Email</label>
                        <input type="email" placeholder="Teacher Email" id="teacheremail" name="teacheremail" required>
                    </div>
                    <div class="form_group">
                    <div class="form_control">
                        <label for="teachercontact">Contact #</label>
                        <input type="tel" placeholder="Contact #" id="teachercontact" name="teachercontact" required>
                    </div>
                    <div class="form_control">
                        <label for="teachersalary">Salary</label>
                        <input type="number" placeholder="Teacher Salary" id="teachersalary" name="teachersalary" required>
                    </div>
                    </div>
                    <div class="form_control">
                        <label for="teacheraddress">Address</label>
                        <input type="text" placeholder="Teacher Address" id="teacheraddress" name="teacheraddress" required>
                    </div>
                    <div class="form_control">
                        <label for="teacherpassword">Password</label>
                        <input type="password" placeholder="Teacher Password" id="teacherpassword" name="teacherpassword" required>
                    </div>
                    <div class="teacher_pic">
                            <label for="teacherpic">Picture</label>
                            <input type="file" placeholder="Upload Picture" id="teacherpic" name="image" required>
                        </div>
                        <div class="addteacherbtn">
                    <input type="submit" value="Add Teacher" class="btn">
                    </div>
                </form>
            </div>
        </div>

        <script src="./js/addteacher.js"></script>
