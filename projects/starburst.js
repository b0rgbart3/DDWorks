
window.sBPlayed = false;
window.sB;
console.log('in Starburst');

var starburst = function() {
	console.log('starburst called');
	if (!window.sBPlayed) {
	 console.log('SB Playing');
	sBPlayed = true;
    var windowWidth = $('.starburst').width();
    var centerPos = windowWidth / 2;
    var phoneWidth = $('.starburstFull1').width();
    var smallphoneWidth = phoneWidth *.9;
    var smallerphoneWidth = phoneWidth *.8;
    var adjustment = windowWidth * .04;

	var left1 = centerPos - (phoneWidth/2) - adjustment;

	var left2 = centerPos - ((smallphoneWidth)/2)- adjustment;
	var left3 = (windowWidth / 3) - (smallerphoneWidth*.75)- adjustment;
	var left4 = ((windowWidth / 3) *2) - (smallerphoneWidth/3)- adjustment;

	//console.log('creating');
	sB = new TimelineLite();

    $(".infoBox").css({opacity:0, right:'-200px'});
    $(".starburstFull2").css({'left':left1});
    $(".starburstFull3").css({'left':left1});


    sB.add(TweenLite.to(".starburstFull1",1, {left:left1}) );
    sB.add(TweenLite.to(".phoneHighlight",1.5,{left:'350px', top:'-120px'},"-=1"));
    sB.add(TweenLite.to(".sb1",.25,{opacity:1},"-=1.7"));
	sB.add(TweenLite.to(".sb2",.75,{opacity:1}));
	sB.add(TweenLite.to(".sb3",.5,{opacity:1},"+=.5"));
	sB.add(TweenLite.to(".sb4",.25,{opacity:1},"+=.5"));
	sB.add(TweenLite.to(".sb5",.25,{opacity:1},"+=.25"));
	sB.add(TweenLite.to(".sb6",.25,{opacity:1},"+=.25"));
	sB.add(TweenLite.to(".sb7",.25,{opacity:1},"+=.25"));
	sB.add(TweenLite.to(".sb8",.25,{opacity:1},"+=.25"));
	sB.add(TweenLite.to(".sb9",.25,{opacity:1},"+=.25"));
	sB.add(TweenLite.to(".sb10",.25,{opacity:1},"+=.25"));
	sB.add(TweenLite.to(".sb11",.25,{opacity:1},"+=.25"));
	sB.add(TweenLite.to(".sb12",.25,{opacity:1},"+=.25"));
	sB.add(TweenLite.to(".sb13",.25,{opacity:1},"+=.25"));
	sB.add(TweenLite.to(".sb14",.25,{opacity:1},"+=.25"));
	sB.add(TweenLite.to(".sb15",.25,{opacity:1},"+=.25"));
	sB.add(TweenLite.to(".sb15, .sb14, .sb13, .sb12, .sb11, .sb10, .sb9, .sb8, .sb7, .sb6",1,{opacity:0},"+=1"));
	sB.add(TweenLite.to(".starburstFull1",.5, {left:left2, scale:.90}, "+=.25"));
	sB.add(TweenLite.to(".starburstFull2, .starburstFull3",.1, {scale:.9}, "-=.25"));
	sB.add(TweenLite.to(".starburstFull2",.5, {scale:.8,left:left3, opacity:1}, "+=.5"));
	sB.add(TweenLite.to(".starburstFull3",1.25, {scale:.8,left:left4, opacity:1}));
	sB.add(TweenLite.to(".infoBox",1,{opacity:1, right: 0},"-=.2"));
	sB.pause();
	sB.seek(0);
	sB.play();
	}
	else {
		sB.seek(0);
		sB.play();
	}

};

