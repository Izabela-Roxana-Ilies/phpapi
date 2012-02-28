# PHP API [http://www.phpapi.org/](http://www.phpapi.org/)
## Version: v.2.0 : Feb 28, 2012


### What's this about ?
This is the skeleton upon which you can develop a web-system from a simple Web Calculator to the most sofisticated CRM/ERP/CMS/ETC.

### What PHPAPI provides is:

1) a general structure of the code

2) an very simple extendable API code structure

3) JavaScript connectivity with the API ( with an easy way of adding new modules/method handlers )

4) low count of resources loaded into the browser ( the API and the init JavaScript files that are first loaded are a few lines of code, the rest is pulled only if required )

5) Templating using Smarty [http://www.smarty.net](http://www.smarty.net)


### How to "install" it ?
1) Copy the repository

2) Create a database ( import phpapi.sql into the database ) // just create a database, the phpapi.sql is leftover from V1 .. if you won't use a database in your project just remove the initiation of MysqlConnection in boot.php

3) Edit the config.inc.php file to suit your application ( database connection, the document root of your application and application URL )

4) Run it ( comes with a Hello world implementation and a basic calculator )

### How to extend it ?
1) Take the Calculator module in the API and make a new one that will do whatever you want ;) use it as a template.

I will update more with docs and specs and all it needs

### Enjoy
#### Author: Robert Doroftei
