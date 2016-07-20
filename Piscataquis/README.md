Web Development Template
========================
##### By [James Addison Pellerano](http://jamespellerano.com/)

Requirements
------------

* Ruby 1.9.2 or greater (*I do not recommend Ruby 2.0 at this time*)
* Ruby Gems
* Git
* SASS & Compass gems installed

Getting Started 
----------------

1. Install above software
2. Using the command line change into the directory you want to work in
  `cd Development && git clone https://github.com/japellerano/Web-Development-Template projectname`


Content Management System Usage
-------------------------------


**Use With WordPress**

1. Rename *index.html* to *index.php*  
2. Create two new files *header.php* and *footer.php*  
3. Copy from the top of *index.php* to just after `<div id="wrapper">` and paste it into *header.php*
4. Copy from the bottom of *index.php* to just above `<!-- Footer -->` and paste it into *footer.php*  
5. In *config.rb* uncomment from line 28 to the end of the file  
6. Update links in *header.php* in accordance with below  

**Updating Header Links with WordPress**  
*Note: The link to jQuery through Google does not need to be updated!*

Current:
  
    <script src="js/custom.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/master.css" type="text/css" />
  
Update To:

    <script src="<?php bloginfo('stylehseet_directory'); ?>/js/custom.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />

**Use With Joomla!**

**Updating Header Links with Joomla**  
*Note: The link to jQuery through Google does not need to be updated!*

Current:

    <script src="js/custom.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/master.css" type="text/css" />
    
Update To:

    <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/custom.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/master.css" type="text/css" />