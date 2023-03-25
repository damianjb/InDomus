// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.

  /*==================================================================
  [ Focus Contact2 ]*/
  $('.input2').each(function(){
    $(this).on('blur', function(){
      if($(this).val().trim() != "") {
        $(this).addClass('has-val');
      }
      else {
        $(this).removeClass('has-val');
      }
    })
  })


  $("form[name='formulario']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      name: "required",

      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },

      message: "required",
    },
    // Specify validation error messages
    messages: {
      name: "Ingrese su nombre",
      email: "Ingrese un email válido",
      message: "Ingrese su mensaje"
    },

    //    errorPlacement: function(error, element) {
    //    error.insertBefore(element);
    //}

    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid



    submitHandler: function(form) {
      // Create variables from the form
      var name = $("#name").val();
      var email = $("#email").val();
      var message = $("#message").val();

      $("#loader").fadeIn('slow');

      $.ajax({
        type: "POST",
        url: "mailg.php",
        data: $(form).serialize(),
        success : function(text){
          //  timeout: 3000,
          //          success: function() {alert('works');},
          //        error: function() {alert('failed');}
          if (text == "Procesado"){

            formSuccess();
          }
  
        }

      });
      
      return false;
    }
  });
});

function formSuccess(){
//  spinner.stop(spinner_div);
  $("#formulario")[0].reset();
  //  $( "#enviado" ).removeClass( "oculto" );
  $("#loader").fadeOut();
  $("#enviado").fadeIn('slow').delay(5000).fadeOut('slow');
}

function formError(){
//  spinner.stop(spinner_div);
  $("#formulario")[0].reset();
  //  $( "#enviado" ).removeClass( "oculto" );
  $("#loader").fadeOut();
  $("#no-enviado").fadeIn('slow').delay(5000).fadeOut('slow');
}
