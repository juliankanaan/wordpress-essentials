When trying to make JQuery-AJAX work on the front-end, you'll need two files: a .js and your regular functions.php.

functions.php handles the requests. 

In the example, we'll just use a button (#trigger) to send some json data to the server and get data back. Use this as a framework to build similar things. 

# Important things to note

The **AJAX url** (your .js file) needs to be registered with Wordpress in functions.php with wp_register_script. Otherwise the request is ignired.  

A **action** needs to be specified in the JQuery.ajax function's data property. The name of this action is declared in functions.php
