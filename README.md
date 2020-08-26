# Camagru
### 42 Project ###
Camagru is an image sharing and editing website that is similar to instagram

## Requirements ##
1.  PHP
2. Javascript
3. XAMPP [https://www.apachefriends.org/download.html] **note that you can use any other web server of your choice** 

## Project Installation ## 

  **How To Download Sorce Code**
    Visit [https://github.com/rnyakuti/Camagru] and click on the code button and select either **Open with GitHub Desktop** or **Download the Zip** or **Clone with HTTPS
    by copying the link and cloning it to a path on your machine**
    
##    Database and Web Server Setup and Configuration ##
      * Download XAMPP ( or a webserver of your choice) from the apachefriends.org website, 
        a link is provided in the requirements
        
      * Copy the Camagru source code folder into the htdocs directory of your web server
      
      * Run the XAMPP Manager ( or the manager for your web server of choice) underneath servers, 
        press the start button for the MySQL database and Apache server,if they are not already running.
        
      * Once the server and database are up and running, pay attention to the console output of the XAMPP manager 
        as it will give you the port for the localhost
        
      * Open your web browser and type into the URL bar 
        [http://localhost:{port number}/camagru{or whatever you named the source code folder/config]
        A page will open up, click on the setup link, this will create your Camagru database for you. 
        Upon database creation the page will notify you if the creation has been successful.
        If not successful, an error message will let you know what has gone wrong. 
        You will need to ensure that the username and password in the source code matches 
        the phpMyAdmin access credetials.
        
      * Open a separate tab and type into the URL bar  http://localhost:{port number}/phpmyadmin , 
        log in and under Databases you should see a Camagru database that was created by the setup
        
      * For troubleshooting with the username and password, check out the following link 
        [https://stackoverflow.com/questions/17759776/how-to-get-login-option-for-phpmyadmin-in-xampp/17760139]

## How To Run Program ##

    * In your browser URL type in the path to the source code in the following format 
       http://localhost:{port number}/camagru{or whatever you named the source code folder}
       
     * This will lead you to the home page of the website and you can begin using it


## Code Breakdown ##

   ### Back End Technologies ###
   - [x] PHP
   - [x] JavaScript
   
   ### Front End Technologies ###
   - [x] HTML
   - [x] CSS
   
   ### Database Management Systems ###
   - [x] MySQL
   
   ### Source Code Folder Structure ###
   
     *README.md                - read me file with documentation
   
     *SetNewPassword.php       - setting of new password for user upon request functionality and page layout
   
     *author                   - author file containing student username
   
     *camagru.en.pdf           - a pdf file containing the project brief and requirements
   
     *camagru.markingsheet.pdf - a pdf file containing the project test and expected results
   
     *index.php                -  contains code for the landing page for camagru which is the sign in page
   
     *userverification.php     - contains code for verification of user functionality
   
     *validate_login.php       - validate user login functionality
   
     **config**
         *database.php
         
         *setup.php
       
     **images**
          *---This folder contains all the icon images used for the front end design---
       
      **pages**
         **Stickers**
              *---This folder contains all the icon images used for stickers that will be superimposed onto images from the webcam---
         **functions**
           *DeleteImage.php    - contains the code for deleting images from the database
           *LikeComment.php    - contains the code that allows for liking images and commenting on images on the website
           *LogOut.php         - contains the code for the logging out functionality
           *Register.php       - contains the code for the registering functionality
           *ResetPassword.php  - contains the code for requesting a new password functionality
           *UpdateDetails.php  - contains the code for the updating user details functionality 
           *UploadFromPC.php   - contains the code for uploading images from the user's machine functionality
        *Home.php               - contains the code for the user's profile page
        *PhotoGalleryPage.php   - contains the code for public photo gallery functionality 
        *Settings.php           - contains the code for the settings page layout
        *UploadPicture.php      - contains the code for the upload from webcam functionality, the sticker superimpose functionality
        *forgotPasswordPage.php - contains the code for the forgot password page layout
        *signUpPage.php         - contains the code for the register form layout
       
  
## Testing ##

The following tests and expected results outlined are based on the Camagru marking sheet from the following marksheet that can be found in the root directory of
this repository [https://github.com/rnyakuti/Camagru/blob/master/camagru.markingsheet.pdf]

### Test That Are Run ###

**Preliminary Check**
- This application is develloped in PHP
- It uses no framework, micro-framework or external libraries.
- It does not need any package manager like "npm" or "composer"
- The following files are present and correctly configured
* index.php
* config/database.php
* config/setup.php
- Start the webserver that should serve the app. The server must produce no
  errors. You can go to the served address without any errors 
  {http://localhost:{port number}/camagru{or whatever you named the source code folder}

**User Creation**
- This application has a registration form if the user wants to create a
  new account. An user have to fullfill it with :
     - a username
     - a secure password ( a simple word in lowercase must be refused by the app )
     - a email address.
- The form have validators on inputs and server-side to make sure the correct
  data are well transmitted. At the end of the registration, it should be
  completed with the sending of a account confirmation mail, that 
  contains a unique link.
- The user can't connect until they confirm it via this unique link.

**User authentification**
- The user can connect with their credentials, once its a confirmed account.
- The user can reset their password by clicking on the forgot password, by 
  receiving a password reinitialisation email.
- There's always a way to logout when the user is connected.

**Image sharing and editing**
- Once logged in, a user can go to the editing view.
- The editing view, will contains:
   - A webcam preview
   - A list of the previous edited pictures as thumbnails
   - A way to save the final edited picture
   - A list of 'stickers'
   - A way to upload a base image instead of the webcam
   - You can save and upload a photo only if a base media is loaded ( webcam or
     uploaded image ).
   - You can upload an image with no stickers, one sticker or some stickers
     (all the cases must be handled )
   - The image editing pipeline must be started server-side

**Photo Gallery** 
- There's a public gallery view in the app, that can be accessible with
  and without authentification.
- The gallery displays all of the images took by app users, ordered by
  date of creation.
- The images are displayed in infinite scroll.
- Every pictures is like-able and commentable if the user is logged in.
- For each comment, the user must receive a notification mail, only if
  the user preference for email notification is true otherwise no email is sent
  
**User Settings**
- Once logged in, a user can modify with no errors :
  - their username
  - their password
  - their mail address
  - the notification email preference
- Every modification made on those fields should have repercussions on
  the user's data and authentification. Upon clicking the update button
  the values changed and updated in the database and the user is
  logged out and the user has to log in again with new details if they
  changed their username and/or password.
  
**User Rights**
- A user can delete their own uploaded images but not the other user's imges.
- The editing view is only accessible if the user is correctly logged in.
- Trying to reach the view anonymously redirects you to the login view.
- Gallery is public, but only a logged user can like and comment on images.

**UI and UX**
- The app must be compatible on Firefox( >= 41 ) and Chrome ( >= 46 ). All
  features aboves must work, without any warning, error or log ( except as
  always for getUserMedia ).
- When you set the app on mobile mode ( you can do it on Chrome ), elements
  must not overlap each other and have a correct layout.
 
**Security**
- Deepdive into the database either in command-line, or with something like
  PHPMyAdmin or Adminer.
- Check the Users table and verify the password is crypted.
- Check for XSS by going on a form containing inputs that generates displayable HTML
  (like the comments) add this and submit :
   ` <script type='text/javascript'>alert('THE GAME');</script> `
  On reload, no alertbox should appear
- Check for SQL injections by logging out, once logged out, 
  try to log in with this as a password ( without braces ):
  `[ blahblah' OR 1='1 ] `
  If you can authentify, this app is not protected against SQL injections.
  This part is count as false and you go to the next part.
  
**Webcam**
-A live preview of the webcam 
