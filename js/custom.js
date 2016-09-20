if (typeof jQuery === 'undefined') { throw new Error('myscript\'s JavaScript requires jQuery') }

+function ($) {

  /*--------------------------------
    Main Scripts
  --------------------------------*/

    /*-- smooth scrolling for anchor links --*/
    $(function() {
      $('a.smooth').click(function() {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });

    /*-- images respinsive --*/
    $(function(){
        $("img").addClass("img-responsive");
    });

    /*-- iframe responsive --*/
    $(function(){
      $("iframe").addClass("embed-responsive-item");
      $("iframe").parent().addClass('embed-responsive embed-responsive-16by9');
    });

    /*-- wp admin toolbar --*/
    $(function(){
      if( ($('#wpadminbar').length > 0 ) && ( window.location.href.indexOf( 'wp-admin' ) === 0 ) ) {
        $('<div class="toolbar-button"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></div>').insertAfter('#wpadminbar');
      }
    });

    $(function(){
      $(".toolbar-button").click(function() {
        $("#wpadminbar").toggleClass('active');
        $('.toolbar-button').toggleClass('down');
      });
    });

    /*--------------------------------
      Extra Scripts
    --------------------------------*/

    /*-- bootstrap carousel settings --*/

    $(function() {

      $('.carousel').carousel({
        interval: 6000,
        pause: "hover"
      });

      $('.carousel-inner').children('.item:first-child').addClass('active');

      $('.slide').each(function(i) {
        $(this).attr('id', 'id_' + i).appendTo(this);
        $('a.left.carousel-control').attr('href', '#id_' + i);
        $('a.right.carousel-control').attr('href', '#id_' + i);
      });

      $('.carousel-indicators > li').first().addClass('active');

      $('.carousel-inner').each(function() {
        if ($(this).children('.item').length === 1) {
          $('.carousel-control').remove();
        }
      });

    });



}(jQuery);
