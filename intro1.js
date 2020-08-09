ddw_intro= function() {
   //console.log('running intro.');
   var windowWidth = $(window).width() *.92;
   var newLeft = 0-windowWidth;

    t = new TimelineLite( );
    t.to(".introContainer",1,{"height":"500px"})
    .to(".wire",2,{"opacity":"1",ease: Power0.easeIn}, "-=.5")
    .to(".landscape",1.5,{  "clip": "rect(0px "+windowWidth+"px 500px 0px)", ease: Power2.easeIn}, "-=.5")
    .to(".landscape", 3.5,{   "opacity": "1"}, "-=1" )
    .to(".stag",1,{"opacity":"1"}, "-=2.3")
    .to(".stag2",1.8,{"opacity":"1"}, "-=1.7")
    .to(".stag",1,{"opacity":"0"}, "-=.5")
    .to(".tagline",1,{"left":"45%","opacity":"1",  ease: Elastic.easeOut.config(1, 1),},"-=1.5")
;


    
}

