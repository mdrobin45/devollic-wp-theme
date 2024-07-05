// ================== Password Show Hide Js Start ==========
const $ = jQuery;
function initializePasswordToggle(toggleSelector) {
   $(toggleSelector).on("click", function () {
      console.log("hello");
      $(this).toggleClass("fa-eye-slash");
      $(this).toggleClass("fa-eye");

      var input = $($(this).attr("data-toggle"));
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
