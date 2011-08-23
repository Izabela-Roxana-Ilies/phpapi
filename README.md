# PHP API [http://www.phpapi.org/](http://www.phpapi.org/)
## Version: v.1.0 : August 22nd, 2011


### What's this about ?
This is the skeleton upon which you can develop a web-system from a simple Web Calculator to the most sofisticated CRM/ERP/CMS/ETC.

### What PHPAPI provides is:

1) a general structure of the code

2) a very simple extendable API code structure

3) JavaScript connectivity with the API ( with an easy way of adding new modules/method handlers )

4) low count of resources loaded into the browser ( the API and the init JavaScript files that are first loaded are a few lines of code, the rest is pulled only if required )

5) a Facebook PHP SDK integration ready to go ( and easily removable if not needed ) ( this uses the Facebook PHP SDK [https://github.com/facebook/php-sdk](https://github.com/facebook/php-sdk) )

6) Templating using Smarty [http://www.smarty.net](http://www.smarty.net)

7) Cross browser code ( using [jQuery](http://jquery.com) and [HTML5 boiler plate project](https://github.com/paulirish/html5-boilerplate)

### How to "install" it ?
1) Copy the repository

2) Create a database ( import phpapi.sql into the database )

3) Edit the config.inc.php file to suit your application ( facebook app id, database connection, the document root of your application and application URL )

4) Run it ( comes with a Hello world implementation and a basic calculator )

### How to extend it ?
1) Extend the API functionality with new modules by copying /engine/theapi/modules/test.php and rename it to /engine/theapi/modules/yourmodule.php, 
  
  replace 
  
  class test{ 
  
  with 
  
  class yourmodule{
  
  
Create new methods inside the class ( if they are public they can be called trough the api )

2) If you want a handler of the response that the API call returns, in /static/js/api/modules/ add yourmodule.js file, use test.js as a template :)

3) Nothing else :P


### Enjoy
#### Author: Robert Doroftei
