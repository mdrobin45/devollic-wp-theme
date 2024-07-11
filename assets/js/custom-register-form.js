// ================== Password Show Hide Js Start ==========
function initializePasswordToggle(toggleSelector) {
   $(toggleSelector).on("click", function () {
      $(this).toggleClass("fa-eye-slash");
      $(this).toggleClass("fa-eye");

      const input = $("#user_pass");
      if (input.attr("type") === "password") {
         input.attr("type", "text");
      } else {
         input.attr("type", "password");
      }
   });
}
// Call the function
initializePasswordToggle(".toggle-password");
// ========================= Password Show Hide Js End ===========================

jQuery(document).ready(function ($) {
   $("#clf_regiform").on("submit", function (e) {
      e.preventDefault();

      const formData = {
         action: "ajaxregister",
         username: $("#username").val(),
         email: $("#email").val(),
         password: $("#user_pass").val(),
         condition: $("#condition").is(":checked") ? true : false,
         security: $('input[name="security"]').val(),
      };

      if (!formData.email || !formData.username) {
         $("#login-error").text("Please fill all field");
         return;
      }

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
            console.log(response);
            if (response.status === "success") {
               window.location.href = ajax_register_object.redirecturl;
            } else {
               $("#login-error").text(response.message);
            }
         },
         error: function (res) {
            console.log(res);
            $("#login-error").text(
               "An unexpected error occurred. Please try again."
            );
         },
      });
   });
});
