jQuery(document).ready(function ($) {
   $("#clf_regiform").on("submit", function (e) {
      e.preventDefault();

      var formData = {
         action: "ajaxregister",
         username: $("#username").val(),
         email: $("#email").val(),
         password: $("#password").val(),
         condition: $("#condition").is(":checked") ? true : false,
         security: $('input[name="security"]').val(),
      };

      // Return if condition not checked
      if (!formData.condition) {
         $("#login-error").text("Please agree our terms and condition");
         return;
      }

      $.ajax({
         type: "POST",
         dataType: "json",
         url: ajax_register_object.ajaxurl,
         data: formData,
         success: function (response) {
            if (response.status === "success") {
               window.location.href = ajax_register_object.redirecturl; // Redirect on success
            } else {
               $("#login-error").text(response.message);
            }
         },
         error: function () {
            $("#login-error").text(
               "An unexpected error occurred. Please try again."
            );
         },
      });
   });
});
