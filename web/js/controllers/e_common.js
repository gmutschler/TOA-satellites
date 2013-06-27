// # COMMON screen controller
document.observe("dom:loaded", function() {

     $('hero_submenu').setStyle({'position':'relative'});
     new ScrollSpy({
               container: window,
               min: 10,
               onEnter: function(c) {
                  $('hero_submenu').setStyle({'position':'fixed'});
               },
               onLeave: function(c) {
                  $('hero_submenu').setStyle({'position':'relative'});
               }
     });
});
