$(document).ready(function() {
	animate.init();
});

var animate = {

	init: function() {
		var setup = this.setup;
		setup.animateEvents();
	},

	setup: {

		animateEvents: function() {

			// Init ScrollMagic
			var controller = new ScrollMagic.Controller();


			 /*
            * General:
            * gnrlfrm : General Frame
            */

            $('.animate-up').each(function() {
                var tl = new TimelineMax()
                .fromTo(this, 1,
                    { y: "10%", opacity: "0", ease:Power0.easeIn },
                    { y: "0%", opacity: "1", ease:Power0.easeIn })

                var fadeScene = new ScrollMagic.Scene({
                    triggerElement: this,
                    triggerHook: .8,
                    reverse:false,
                    })
                    .setTween(tl)
                    .addTo(controller);
            });

            $('.fadeIn').each(function() {
                var tl = new TimelineMax()
                .fromTo(this, 1,
                    { y: "0px", opacity: 0, ease:Power0.easeIn },
                    { y: "0px", opacity: 1, ease:Power0.easeIn })

                var fadeScene = new ScrollMagic.Scene({
                    triggerElement: this,
                    triggerHook: .8,
                    reverse:false,
                    })
                    .setTween(tl)
                    .addTo(controller);
            });

            $('.animate-down').each(function() {
                var tl = new TimelineMax()
                .fromTo(this, 1,
                    { y: "-10%", opacity: "0", ease:Power0.easeIn },
                    { y: "0%", opacity: "1", ease:Power0.easeIn })

                var fadeScene = new ScrollMagic.Scene({
                    triggerElement: this,
                    triggerHook: .7,
                    reverse:false,
                    })
                    .setTween(tl)
                    .addTo(controller);
            });

            $('.animate-scale').each(function() {
                var tl = new TimelineMax()
                .fromTo(this, 1,
                    { scale: "0.8", opacity: "0", ease:Power0.easeIn },
                    { scale: "1", opacity: "1", ease:Power0.easeIn })

                var fadeScene = new ScrollMagic.Scene({
                    triggerElement: this,
                    triggerHook: .7,
                    reverse:false,
                    })
                    .setTween(tl)
                    .addTo(controller);
            });

            $('.animate-right').each(function() {
                var tl = new TimelineMax()
                .fromTo(this, 1,
                    { x: "10%", opacity: "0", ease:Power0.easeIn },
                    { x: "0%", opacity: "1", ease:Power0.easeIn })

                var fadeScene = new ScrollMagic.Scene({
                    triggerElement: this,
                    triggerHook: .7,
                    reverse:false,
                    })
                    .setTween(tl)
                    .addTo(controller);
            });

            $('.animate-left').each(function() {
                var tl = new TimelineMax()
                .fromTo(this, 1,
                    { x: "-10%", opacity: "0", ease:Power0.easeIn },
                    { x: "0%", opacity: "1", ease:Power0.easeIn })

                var fadeScene = new ScrollMagic.Scene({
                    triggerElement: this,
                    triggerHook: .7,
                    reverse:false,
                    })
                    .setTween(tl)
                    .addTo(controller);
            });

			/** 
			 * Home : Animations
			 */

			$('.staggerup_hldr').each(function() {
	            var tl = new TimelineMax({delay:0, repeat:0, repeatDelay:0});
	            tl.staggerFrom(".staggerup", 1, { y: "30%", opacity: 0, ease: Bounce.easeNone }, 0.5,)
	              .staggerTo(".staggerup", 1, { y: "0%", opacity: 1, ease: Bounce.easeOut }, 0.5,)

	            var fadeScene = new ScrollMagic.Scene({
	                triggerElement: this,
	                triggerHook: .1,
	                offset:-300,
	                reverse:false,
	            })
	            .setTween(tl)
	            .addTo(controller);
        	});

     

        	$('.staggerup_hldr1').each(function() {
	            var tl = new TimelineMax({delay:0, repeat:0, repeatDelay:0});
	            tl.staggerFrom(".staggerup1", 1.00, { y: "30%", opacity: 0, ease: Bounce.easeNone }, 0.5,)
	              .staggerTo(".staggerup1", 1.00, { y: "0%", opacity: 1, ease: Bounce.easeOut }, 0.5,)

	            var fadeScene = new ScrollMagic.Scene({
	                triggerElement: this,
	                triggerHook: .1,
	                offset:-300,
	                reverse:false,
	            })
	            .setTween(tl)
	            .addTo(controller);
        	});

        	$('.staggerscale_hldr').each(function() {
	            var tl = new TimelineMax({delay:0, repeat:0, repeatDelay:0});
	            tl.staggerFrom(".staggerscale", 2.00, { scale: 0, opacity: 0, ease: Bounce.easeNone }, 0.5,)
	              .staggerTo(".staggerscale", 2.00, { scale: 1, opacity: 1, ease: Bounce.easeOut }, 0.5,)

	            var fadeScene = new ScrollMagic.Scene({
	                triggerElement: this,
	                triggerHook: .1,
	                offset:-300,
	                reverse:false,
	            })
	            .setTween(tl)
	            .addTo(controller);
        	});


        	$('.staggerup_hldr2').each(function() {
	            var tl = new TimelineMax({delay:0, repeat:0, repeatDelay:0});
	            tl.staggerFrom(".staggerup2", 1.00, { y: "30%", opacity: 0, ease: Bounce.easeNone }, 0.5,)
	              .staggerTo(".staggerup2", 1.00, { y: "0%", opacity: 1, ease: Bounce.easeOut }, 0.5,)

	            var fadeScene = new ScrollMagic.Scene({
	                triggerElement: this,
	                triggerHook: .1,
	                offset:-500,
	                reverse:false,
	            })
	            .setTween(tl)
	            .addTo(controller);
        	});

        	$('.staggerup_hldr3').each(function() {
	            var tl = new TimelineMax({delay:0, repeat:0, repeatDelay:0});
	            tl.staggerFrom(".staggerup3", 1.00, { y: "30%", opacity: 0, ease: Bounce.easeNone }, 0.5,)
	              .staggerTo(".staggerup3", 1.00, { y: "0%", opacity: 1, ease: Bounce.easeOut }, 0.5,)

	            var fadeScene = new ScrollMagic.Scene({
	                triggerElement: this,
	                triggerHook: .1,
	                offset:-500,
	                reverse:false,
	            })
	            .setTween(tl)
	            .addTo(controller);
        	});

        	$('.staggerup_hldr4').each(function() {
	            var tl = new TimelineMax({delay:0, repeat:0, repeatDelay:0});
	            tl.staggerFrom(".staggerup4", 1.00, { y: "30%", opacity: 0, ease: Bounce.easeNone }, 0.5,)
	              .staggerTo(".staggerup4", 1.00, { y: "0%", opacity: 1, ease: Bounce.easeOut }, 0.5,)

	            var fadeScene = new ScrollMagic.Scene({
	                triggerElement: this,
	                triggerHook: .1,
	                offset:-500,
	                reverse:false,
	            })
	            .setTween(tl)
	            .addTo(controller);
        	});

        	$('.staggerup_hldr5').each(function() {
	            var tl = new TimelineMax({delay:0, repeat:0, repeatDelay:0});
	            tl.staggerFrom(".staggerup5", 1.00, { y: "30%", opacity: 0, ease: Bounce.easeNone }, 0.5,)
	              .staggerTo(".staggerup5", 1.00, { y: "0%", opacity: 1, ease: Bounce.easeOut }, 0.5,)

	            var fadeScene = new ScrollMagic.Scene({
	                triggerElement: this,
	                triggerHook: .1,
	                offset:-500,
	                reverse:false,
	            })
	            .setTween(tl)
	            .addTo(controller);
        	});

        	$('.staggerup_hldr6').each(function() {
	            var tl = new TimelineMax({delay:0, repeat:0, repeatDelay:0});
	            tl.staggerFrom(".staggerup6", 1.00, { y: "30%", opacity: 0, ease: Bounce.easeNone }, 0.5,)
	              .staggerTo(".staggerup6", 1.00, { y: "0%", opacity: 1, ease: Bounce.easeOut }, 0.5,)

	            var fadeScene = new ScrollMagic.Scene({
	                triggerElement: this,
	                triggerHook: .1,
	                offset:-500,
	                reverse:false,
	            })
	            .setTween(tl)
	            .addTo(controller);
        	});

        	$('.staggerup_hldr7').each(function() {
	            var tl = new TimelineMax({delay:0, repeat:0, repeatDelay:0});
	            tl.staggerFrom(".staggerup7", 1.00, { y: "30%", opacity: 0, ease: Bounce.easeNone }, 0.5,)
	              .staggerTo(".staggerup7", 1.00, { y: "0%", opacity: 1, ease: Bounce.easeOut }, 0.5,)

	            var fadeScene = new ScrollMagic.Scene({
	                triggerElement: this,
	                triggerHook: .1,
	                offset:-500,
	                reverse:false,
	            })
	            .setTween(tl)
	            .addTo(controller);
        	});

        	$('.staggerup_hldr8').each(function() {
	            var tl = new TimelineMax({delay:0, repeat:0, repeatDelay:0});
	            tl.staggerFrom(".staggerup8", 1.00, { y: "-30%", opacity: 0, ease: Bounce.easeNone }, 0.5,)
	              .staggerTo(".staggerup8", 1.00, { y: "0%", opacity: 1, ease: Bounce.easeOut }, 0.5,)

	            var fadeScene = new ScrollMagic.Scene({
	                triggerElement: this,
	                triggerHook: .1,
	                offset:-500,
	                reverse:false,
	            })
	            .setTween(tl)
	            .addTo(controller);
        	});

        	$('.staggerup_hldr9').each(function() {
	            var tl = new TimelineMax({delay:0, repeat:0, repeatDelay:0});
	            tl.staggerFrom(".staggerup9", 1.00, { y: "-30%", opacity: 0, ease: Bounce.easeNone }, 0.5,)
	              .staggerTo(".staggerup9", 1.00, { y: "0%", opacity: 1, ease: Bounce.easeOut }, 0.5,)

	            var fadeScene = new ScrollMagic.Scene({
	                triggerElement: this,
	                triggerHook: .1,
	                offset:-500,
	                reverse:false,
	            })
	            .setTween(tl)
	            .addTo(controller);
        	});

		},
		
	},
}