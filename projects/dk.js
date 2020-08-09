var dk = function() {
 // console.log("This is the gede script");
    
  th = new TimelineLite();
    
  th.from('.dkInfo', 1, {'transform':"rotateX(85deg)", "lrighteft":"-20px", "opacity":0,  ease: Circ.easeOut,}, "+=1")
  ;
}