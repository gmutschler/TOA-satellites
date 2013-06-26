// # SATELLITES/INDEX screen controller
var timer1;
var scrollDiv = function(divId, depl) {
  var scroll_container = document.getElementById(divId);
  scroll_container.scrollLeft -= depl;
  timer1 = setTimeout('scrollDiv("'+divId+'", '+depl+')', 10);
}

document.observe("dom:loaded", function() {

     document.getElementById('location_slider_previous').onmouseover = function() { scrollDiv('scrollarea1', 4); }
     document.getElementById('location_slider_previous').onmouseout = function() { clearTimeout(timer1); }
     document.getElementById('location_slider_previous').onmousedown = function() { scrollDiv('scrollarea1', 8); }
     document.getElementById('location_slider_previous').onmouseup = function() { clearTimeout(timer1); }
     document.getElementById('location_slider_next').onmouseover = function() { scrollDiv('scrollarea1', -4); }
     document.getElementById('location_slider_next').onmouseout = function() { clearTimeout(timer1); }
     document.getElementById('location_slider_next').onmousedown = function() { scrollDiv('scrollarea1', -8); }
     document.getElementById('location_slider_next').onmouseup= function() { clearTimeout(timer1); }

});
