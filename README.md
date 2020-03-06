# File-Upload-Web-Server---Cookieless

---

The folder `File Upload Web Server` has the main code base for the server. The web functionality is built only on HTML, JS and PHP. The folder is organised into 3 different sub folders - `serve`, `home` and `uploads`. 

## Serve Directory
This directory contains the code for the server i.e., must be the root serving directory. `index.html` is the starting page and the rest is generated on the fly by php. The `php` folder contains different files which handle connections to database in MySQL (SQL server must be set up), handles the login procedure as well as the upload procedure. The uploads are done to a folder outside of the root serving directory, which is a folder called `uploads` in the main folder.

## Home directory
This directory contains scripts to create, delete and list out th existing credentials. The credentials are generated at random and are meant to be given to clients as and when required and follow specific access control procedures to revoke access by deleting the credentials after the required uploads have taken place. An example scenario for use of this is when someone needs a group of people to upload stuff to their web server, but don't need to give permanent access to the database. 

## General security
1. SQL injection is prevented by using parameterised queries. No revealing error messages are printed when errors occur. 
2. History manipulation to invalidate the upload page such that no state of that page is saved on the browser and a login is required each time. This is done to emulate the protection provided by cookies. 
3. File directory navigation must be handled and to prevent loss of data, the uploads folder is outside the web root directory.

## What has not been addressed
The 2 major things that have not been addressed are - 
1. iframe injection
2. Use of bursuite to prevent javascript's ability from manipulating browser states. This is not a major threat as all an adversary can manage is to upload more files for a DDoS, the prevention mechanism for which is simple when using a good firewall policy. Also, credentials are generated for specific clients, therefore, it is assumed that they are shared over a secure channel. Hence, this is possible only when a client system is compromised prior to credential generation. Another probable solution is discussed in the next section.

## Addition of functionalities
PHP can be used to set a file in an outer directory with less privilege. This file is read by a cron job ruuning as root, which removes the credentials for that particular user by running the `cred_del` script.

## Where can it be used
This server can easily be used inside a virtual machine in scenarios when obtaining a box.com or similar service is not possible or recommended. Another use case is in CTF questions, where security can be relaxed at different points to teach InfoSec community about SQL injection or Burpsuite.

---

