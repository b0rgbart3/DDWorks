var muscle2 = function() {
  console.log("This is the muscle 2 script");



ms = new TimelineLite();

ms.to(".phone",2,{top:'-170px',left:'15%',
    rotationX:20,rotationY:10, rotationZ:'-20',scaleX:.8,scaleY:.8,translateZ:'-200'})
.to(".highlighter",.1,{rotation:40, scale:3, top:"+=100"} )
.to(".highlighter",3,{ top:-540, right:"+=100", opacity:0 })
.to(".infoBox",2,{opacity:1, right: 0})
.to(".bmmiddle1",.5,{opacity:1}, 1.25)
.to(".bmmiddle1",.5,{opacity:.01},"+=3")
.to(".bmmiddle2",.5,{opacity:1})
.to(".bmmiddle2",.5,{opacity:.01},"+=3")
.to(".bmmiddle3",.5,{opacity:1});


}

$('.moreInfo').click(function() {
    $('.muscleInfo').css({display:"inline-block"});
})

$('.bigmuscle').click(function() {
    $('.muscleInfo').css({display:"none"});

})

$('.closer').click(function(event) {
    let parent = $(event.target).parent();
    parent.hide();
})