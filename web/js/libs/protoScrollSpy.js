    var ScrollSpy = Class.create();

    ScrollSpy.prototype = {
           initialize: function(options) {
              this.options = Object.extend({
                           container: window,
                           min: 0,
                           max: 0,
                           mode: 'vertical'  
              },options || {});
              this.container = $(this.options.container);
              this.enters = this.leaves = 0;
              this.inside = false;
              var self = this;

              var getScrollTop = function() {
                  return (window.pageYOffset) ? window.pageYOffset : (document.documentElement && document.documentElement.scrollTop) ? document.documentElement.scrollTop : document.body.scrollTop;
              }

              this.listener = function(event) {

                   if(event) {event.stop();}

                   var xy = getScrollTop();

                   if(xy >= self.options.min && (self.options.max == 0 || xy <= self.options.max)) {
                            if(!self.inside) {

                                self.inside = true;
                                self.enters++; 
                                /* fire enter event */
                                self.options.onEnter(xy,self.inside,self.enters,self.leaves,event);
                            }

                          if(self.options.onTick) {self.options.onTick(xy,self.inside,self.enters,self.leaves,event);}

                   } else if(self.inside){
                          self.inside = false;
                          self.leaves++;
                          if(self.options.onLeave) {self.options.onLeave(xy,self.leaves,event);}
                   }

              } 
             
              /*make it happen */
              this.addListener();  
           },

           start: function() {
               Event.observe(this.container, 'scroll', this.listener);
           },

           stop: function() {
               Event.stopObserving(this.container, 'scroll', this.listener);
           },

           addListener: function() {
                this.start();
           } 
    }  