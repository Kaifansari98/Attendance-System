1) Create a Database "std_management" in localhost/phpmyadmin
2) Import "std_management.sql" from database "std_management" file given in database folder
3) Make sure your xampp config to generate an image using GD Library

	 To edit the php.ini file, open the XAMPP Control Panel, and click on the Config button
	 for the Apache web server. Next, select the php.ini file from the menu.
	 The php.ini file should open in your default text or code editor.

	In the php.ini file, search for the text extension=gd

	If the line starts with a semi-colon, remove it (because the semi-colon indicates the rest of the line is a comment). Then save the file.

	Once the php.ini file has been changed, you will need to restart the web server for those changes to take effect.

	Restart the xampp server

	(Optional)  To check that it is running, you can use the phpinfo() function, and then look for the heading "gd". The first line should indicate that "GD Support" is enabled.

Source Code By: Malahim Tech
	
	Follow on Social Profiles:-
	
	https://www.youtube.com/c/malahimtech
	https://www.instagram.com/malahimansari/
	

