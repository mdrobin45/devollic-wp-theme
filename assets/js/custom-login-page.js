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
   $("#clf_loginform").on("submit", function (e) {
      e.preventDefault();

      var formData = {
         action: "ajaxlogin", // Action name for the AJAX handler
         log: $("#user_login").val(),
         pwd: $("#user_pass").val(),
         rememberme: $("#rememberme").is(":checked") ? "forever" : "",
         security: $('input[name="security"]').val(),
         testcookie: "1",
      };

      $.ajax({
         type: "POST",
         dataType: "json",
         url: ajax_login_object.ajaxurl,
         data: formData,
         success: function (response) {
            if (response.loggedin === true) {
               window.location.href = ajax_login_object.redirecturl; // Redirect on success
            } else {
               $("#login-error").text(response.message); // Show error message
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
