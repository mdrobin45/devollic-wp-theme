let $ = jQuery;
(function ($) {
   $.fn.scrollImage = function () {
      var imageScrollGetHeight = function ($this) {
         var imageh = $this.find("img.product-screenshot-image").height(),
            screenh = $this.height();
         return parseInt(screenh - imageh);
      };
      console.log("Hello");
      var onHover = function () {
         // Don't scroll the image if image's height is smaller that screen's height
         if (imageScrollGetHeight($(this)) > 0) return;

         $ele = $(this).find("img.product-screenshot-image");
         $ele.stop();

         var duration = $(this).attr("data-duration");

         if (!duration) {
            duration = 2000;
         }

         $ele.animate(
            {
               bottom: 0,
            },
            parseInt(duration)
         );
      };

      var onRelease = function () {
         $ele.stop();
         $ele.animate(
            {
               bottom: imageScrollGetHeight($(this)),
            },
            500
         );
      };

      var setImagePosition = function ($this) {
         $this.find("img.product-screenshot-image").css({
            bottom: imageScrollGetHeight($this),
         });
      };

      this.hover(onHover, onRelease);

      var that = this;

      $(window).resize(function () {
         that.each(function () {
            setImagePosition($(this));
         });
      });

      return this.each(function () {
         setImagePosition($(this));
      });
   };
})(jQuery);

$(window).on("load", function () {
   $(".screen-image").scrollImage();
});
