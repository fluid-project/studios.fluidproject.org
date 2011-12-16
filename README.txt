Fluid Studios is a place to incubate new ideas, projects, and collaborations dedicated to improving the usability and accessibility of the open web. This site is an open gallery for contributors to work collaboratively, document their progress, and showcase their projects.

The site is based on WordPress Version 3.2.1 downloaded from wordpress.org
with the CKEditor plugin Version 3.6.2.3 downloaded from http://wordpress.org/extend/plugins/ckeditor-for-wordpress/


To set up an instance of the Studios site follow these steps:

1. Get the code from http://github.com/fluid-project/studios.fluidproject.org
2. Set up a web server 
    * for local development on a Mac, consider using MAMP http://www.mamp.info/en/index.html
3. Ensure that the studios code is inside the web server document root
4. Create a new database and a database user with all privileges 
    * see the WordPress documentation for more details: http://codex.wordpress.org/Installing_WordPress#Step_2:_Create_the_Database_and_a_User
5. Copy the wp-config-sample.php file to wp-config.php and set the db name, db user, db password, db host and auth keys
    * see the WordPress documentation for more details: http://codex.wordpress.org/Installing_WordPress#Step_3:_Set_up_wp-config.php
6. Load the studios application in your web browser and go through the WordPress install http://localhost:8888/
7. Go to the admin interface and configure these settings:
    a) under appearance, activate the studios theme 
    b) under plugins, activate CKEditor
    c) under settings -> media, set the thumbnail size to 240 X 160
    d) under settings -> reading, set the "Blog pages show at most" to 100
