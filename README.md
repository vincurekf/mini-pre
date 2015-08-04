# MINI-PRE

This is just package of some bacis stuff put together to easily start coding a new project with easy front end administration in-line editting.

### Example
[Working exmple](http://mini-pre.meshr.cz), you can login with username 'demo' and password 'demopass'

# How to use MINI-PRE
## Installation
1. Copy MINI-PRE to the root of your future project
2. Create database and execute 'create-tables.sql' (use phpmyadmin or other prefered method)
3. set database credentials in application/config/config.php file
4. create first user by typing yourdomain/register/ - its good thing to delete or rename the register controller (or disable it in whatever way you prefer)
5. That's it! You can start building on top of MINI-PRE with inline text editing, basic login feature, foundation framework and other great libraries prepared four you ;)

## How to add editable content
It's built for easy use, just add element with unique PRE-ID attribute and class .editable

for example.: 
```html
<div class="editable" pre-id="uniqe-paragraph-main-page">Dummy text</div>
```
and MINI-PRE will take care of the rest ;)

## Basic file structure
This project aims to be easily usable so here are the main files that you may want to edit:
#### public/css/style.css
 - main styles (as few as possible for easy redesigning)
#### application/views/:
- home/index.php : default index of your application
- login/: file names are pretty much explaining what's the content ;)
- templates: header and footer for your application

## Contains

### MINI
mini is basic php application setup and is used as a base for this.
 - by [panique](https://github.com/panique/mini)

### PHP-LOGIN MINIMAL
php-login minimal version included for basic login features.
 - by [panique](https://github.com/panique/php-login-minimal)

### FOUNDATION
one of the greatest frameworks around there, implemented for quick start with styling the project with grid, modals and other usefull stuff (normalize, modernizr, jquery and more).
 - by [ZURB](http://foundation.zurb.com/index.html)

### Hallo.js
jQuery plugin fior inline content editting with basic formating capabilites
 - by [bergie](https://github.com/bergie/hallo)

### Underscore.js
Javascript library for easy manipulation with arrays.
 - [Undersore.js](http://underscorejs.org/)

### Mousetrap.js
Javascript library to handle keyboard shortcuts.
 - by [ccampbell](https://github.com/ccampbell/mousetrap)

## NOTE
This project is in early state of development, i started it as tool to help me start and easily manage simple web pages for clients. Feel free to do whatever you want with it ;)
 
### TO-DO
- INSTALLATION
- "admin" section
- DOCS
