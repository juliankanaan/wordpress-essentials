
jQuery(document).ready(function() {

  jQuery("#trigger").click(function(e) {
    // prevent from happening on page load
    e.preventDefault();
    // going to pass a random number
    num = jQuery.randomBetween(0, 10);
    // change color of button on click

    jQuery("#trigger").css("background-color", "#ccc");

    // ajax post starts here

    jQuery.ajax({
         type : "post",
         dataType : "json",
         url : myAjax.ajaxurl,
         data : {action: "random", num: num},
         success: function(response) {
           // check for success & do something:
            if(response.type == "success") {

              alert("Success");

              number = response.new_num;
              // alert user to what the server said
              alert(number);

            }
            else {
               alert("Something failed with the AJAX request");
            }
         }
      });


  });



});

