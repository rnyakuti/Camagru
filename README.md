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
      * Download XAMPP ( or a webserver of your choice) from the apachefriends.org website, a link is provided in the requirements
      * Copy the Camagru source code folder into the htdocs directory of your web server
      * Run the XAMPP Manager ( or the manager for your web server of choice) underneath servers, press the start button for the MySQL database and Apache server,
        if they are not already running.
      * Once the server and database are up and running, pay attention to the console output of the XAMPP manager as it will give you the port for the localhost
      * Open your web browser and type into the URL bar http://localhost:{port number}/camagru{or whatever you named the source code folder/config , a page will open up
        click on the setup link, this will create your Camagru database for you. Upon database creation the page will notify you if the creation has been successful,
        if not successful, an error message will let you know what has gone wrong. You will need to ensure that the username and password in the source code matches 
        the phpMyAdmin access credetials.
      * Open a separate tab and type into the  http://localhost:{port number}/phpmyadmin , log in and under Databases you should see a Camagru database that was created by
        the setup
      * For troubleshooting with the username and password, check out the following link [https://stackoverflow.com/questions/17759776/how-to-get-login-option-for-phpmyadmin-in-xampp/17760139]

## How To Run Program ##

    * In your browser URL type in the path to the source code in the following format http://localhost:{port number}/camagru{or whatever you named the source code folder
     * This will lead you to the hope page of the website and you can begin using it


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
   * Bullet list
              * Nested bullet
                  * Sub-nested bullet etc
          * Bullet list item 2
