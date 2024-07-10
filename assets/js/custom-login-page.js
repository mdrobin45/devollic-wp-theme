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
