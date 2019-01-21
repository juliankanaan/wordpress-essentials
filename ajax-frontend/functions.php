
<?php

// Enqueue and register your .js file 

add_action( 'init', 'my_script_enqueuer' );
function my_script_enqueuer() {
   wp_register_script( "random", WP_PLUGIN_URL.'/random/js/random.js', array('jquery') );
   wp_localize_script( 'random', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
   wp_enqueue_script( 'jquery' );
   wp_enqueue_script( 'random' );
}
/*
Make wordpress aware of our AJAX action "random"
*/
add_action("wp_ajax_random", "random");
add_action("wp_ajax_nopriv_random", "random");




// callback function: note that the name is the same as "action" from the .js
function random() {


  // take that random number and do something with it
  $number = $_REQUEST['num'];

  $new_num = rand(0, 10);

  $number = $number + $new_num;

  if ( $number ) {
      // notify this was a sucess

      $result['type'] = "success";

      $result['new_num'] = $number;
  }
  else {

    $result['type'] = "error";

  }

  // json encode the $result and send it back over to the front end

  $result = json_encode($result);
  echo $result;

  // always die() with Wordpress to close connection

  die();



}
?>
