// # COMMON screen controller
document.observe("dom:loaded", function() {
	
	
	$('bottom-logo').setStyle({'top':'60px'});

    // Google Maps default layout styling
    // - http://gmaps-samples-v3.googlecode.com/svn/trunk/styledmaps/wizard/index.html
    // - https://developers.google.com/maps/documentation/javascript/styling
    GoogleMapStyles = [
	{
		stylers: [
			{ saturation: -100 }
		]
	},
	{
		featureType: 'road',
		elementType: 'geometry',
		stylers: [
			{ lightness: 100 },
			{ visibility: 'simplified' }
		]
	},
	{
		featureType: 'road',
		elementType: 'labels',
		stylers: [
			{ visibility: 'off' }
		]
	}
    ];

     // Parallax-alike scrolling
     if ($('hero') == undefined) {
     	var submenu_offset = 116;
     } else {
     	var submenu_offset = 596;
     }
 
     new ScrollSpy({
               container: window,
               min: submenu_offset,
               onEnter: function(c) {
               	if ($('submenu-content') != undefined) {
                  $('submenu-content').setStyle({'position':'fixed'});
                  $('submenu-content').setStyle({'left':'50%'});
                  $('submenu-content').setStyle({'top':'5px'});
                  $('submenu-content').setStyle({'margin':'0 0 0 -480px'});
                  $('sect').setStyle({'margin':'0 6px 0 -6px'});
               	}
                  $('login-bg').setStyle({'borderBottom':'1px solid #dedede'});
				},
                  
               onLeave: function(c) {
               	if ($('submenu-content') != undefined) {
                  $('submenu-content').setStyle({'position':'relative'});
                  $('submenu-content').setStyle({'left':'0'});
                  $('submenu-content').setStyle({'top':'8px'});
                  $('submenu-content').setStyle({'margin':'0'});
                  $('sect').setStyle({'margin':'0 6px 0 12px'});
               	}
                  $('login-bg').setStyle({'borderBottom':'none'});

               }
     });
     
     
     if ($('hero_background') != undefined) {    
	     new ScrollSpy({
	               container: window,
	               min: 82,
	               onEnter: function(c) {
	                  $('hero_background').setStyle({'position':'fixed'});
	                  $('hero_background').setStyle({'top':'30px'});
	                  $('hero_background').setStyle({'left':'50%'});
	                  $('hero_background').setStyle({'margin':'0 0 0 -480px'});
					},
	                  
	               onLeave: function(c) {
	                  $('hero_background').setStyle({'position':'static'});
	                  $('hero_background').setStyle({'top':'auto'});
	                  $('hero_background').setStyle({'left':'auto'});
	                  $('hero_background').setStyle({'margin':'0'});
	               }
	     });
     }
     
     
     if ($('hero') != undefined) {
	     new ScrollSpy({
	               container: window,
	               min: 580,
	               onEnter: function(c) {
	                  $('hero').setStyle({'visibility': 'Hidden'});
	
					},
	                  
	               onLeave: function(c) {
	                  $('hero').setStyle({'visibility': 'visible'});
	               }
	     });
     }
     
     new ScrollSpy({
     	container: window,
     	min: 96,
     	onEnter: function( c ) { $('bottom-logo').setStyle({'top':'-13px'}); },
     	onLeave: function( c ) { $('bottom-logo').setStyle({'top':'60px'}); }
     });

});
