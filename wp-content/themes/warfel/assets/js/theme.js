jQuery(document).ready(function($) {
	$('html').removeClass('no-js');

    var executiveBioAccordion =
    {
        init: function()
        {
            this.transitionDuration = 500;
            this.addEventListeners();
        },

        closeAllBios: function()
        {
            $('.grid-loop-item-executive').removeClass('active');
        },

        viewBio: function()
        {
            var self = this;

            if ( this.anyBiosOpen() ) {
                this.closeAllBios();

                setTimeout(function() {
                    $(self.parent).addClass('active');
                }, self.transitionDuration + 200);
            } else {
                $(self.parent).addClass('active');
            }
        },

        anyBiosOpen: function()
        {
            var isOpen = false;

            $('.grid-loop-item-executive').each(function(i) {
                if ( $(this).hasClass('active') ) {
                    isOpen = true;
                }
            });

            return isOpen;
        },

        getParent: function(ev)
        {
            return ev.delegateTarget;
        },

        addEventListeners: function()
        {
            var self = this;

            $('.grid-loop-item-executive').on( 'click', '.view-bio', function(ev) {
                self.parent = self.getParent(ev);
                self.viewBio();
            });

            $('.grid-loop-item-executive').on( 'click', '.close-bio', function() {
                self.closeAllBios();
            });
        }
    };
    executiveBioAccordion.init();

    var searchForm = {

        init: function()
        {
            this.addEventListeners();
        },

        showSearchForm: function()
        {
            $('.search-form-container').addClass('active');
        },

        addEventListeners: function()
        {
            var self = this;

            $('.search-form-container').on( 'click', '#openSearchForm', function() {
                self.showSearchForm();
            });
        }
    };
    // searchForm.init();


// // START UberMenu Force Open Menu Items for Styling
//     var ubermenuOpenSubmenus = function() {
//
//         $( '.ubermenu' ).ubermenu( 'openSubmenu' , $( '.ubermenu-item' ) );
//         // Mobile trigger
//         $('.ubermenu-responsive-toggle').trigger('click');
//     };
//
//     window.setTimeout( ubermenuOpenSubmenus, 500 );
// // END UberMenu Force Open Menu Items for Styling
    function slickCubeRotator(element) {
        return {
            element: element,
            degreesRotated: 0,
            previousSlideIndex: 0,

            init: function (element) {
                this.addEventListeners();
            },

            setup: function(slick) {
                var $prevSlide = $(slick.$slides[slick.slideCount - 1]);
                var $currentSlide = $(slick.$slides[0]);
                var $nextSlide = $(slick.$slides[1]);
                var $lastSlide = $(slick.$slides[2]);

                $prevSlide.addClass('cube-top');
                $currentSlide.addClass('cube-front');
                $nextSlide.addClass('cube-bottom');
                $lastSlide.addClass('cube-back');

                slick.slickSetOption('speed', 1500, true);
            },

            removeAllClasses: function () {
                $(this.element).removeClass('cube-top cube-front cube-bottom cube-back');
            },

            addEventListeners: function () {
                var self = this;

                $(this.element).on('init', function (event, slick) {
                    self.setup(slick);
                });

                $(this.element).on('beforeChange', function (ev, slick, currentSlide, nextSlide) {
                    console.log('in on beforeChang current = ', currentSlide);
                    console.log('in on beforeChang next = ', nextSlide);

                    if (currentSlide === nextSlide) {
                        return;
                    }
                    if (currentSlide < nextSlide) {
                        console.log("ROTATING FORWARDS", currentSlide, nextSlide);
                        self.degreesRotated += 90;
                    }
                    else if (currentSlide === slick.slideCount-1) {
                        console.log("RESETING", currentSlide, nextSlide);
                        self.degreesRotated = 0;
                    }
                    else if ( currentSlide > nextSlide && currentSlide !== slick.slideCount-1 ) {
                        console.log("ROTATING BACKWARDS", currentSlide, nextSlide,slick.slideCount);
                        self.degreesRotated -= 90;
                    }

                    slick.$slideTrack.css({
                        transform: 'translateZ(-44vh) rotateX(' + self.degreesRotated + 'deg)'
                    });
                });

                $(this.element).on('afterChange', function (ev, slick, currentSlide) {

                    slick.slickGoTo(currentSlide);

                    var prevSlide = currentSlide === 0 ? slick.slideCount - 1 : currentSlide - 1;
                    var $prevSlide = $(slick.$slides[prevSlide]);
                    var $currentSlide = $(slick.$slides[currentSlide]);
                    var $nextSlide = $(slick.$slides[currentSlide + 1]);
                    var $lastSlide = $(slick.$slides[currentSlide + 2]);

                    self.removeAllClasses();

                    console.log('in on beforeChang current = ', currentSlide);


                    if (currentSlide % 4 === 1) {
                        console.log('if ( currentSlide % 4 === 1 ) {');

                        console.log($prevSlide, $currentSlide, $nextSlide, $lastSlide);
                        self.setup(slick);
                        $currentSlide.addClass('cube-bottom');
                        $prevSlide.addClass('cube-front');
                        $nextSlide.addClass('cube-back');
                        $lastSlide.addClass('cube-top');
                    }

                    else if (currentSlide % 4 === 2) {
                        console.log('else if ( currentSlide % 4 === 2 ) {');
                        $currentSlide.addClass('cube-back');
                        $prevSlide.addClass('cube-bottom');
                        $nextSlide.addClass('cube-top');
                        $lastSlide.addClass('cube-front');
                    }

                    else if (currentSlide % 4 === 3) {
                        console.log('else if ( currentSlide % 4 === 3 ) {');
                        $currentSlide.addClass('cube-top');
                        $prevSlide.addClass('cube-back');
                        $nextSlide.addClass('cube-front');
                        $lastSlide.addClass('cube-bottom');
                    }

                    // else if (currentSlide === 0) {
                    //     console.log('else if ( currentSlide === 0 ) {');
                    //     $currentSlide.addClass('cube-back');
                    //     $prevSlide.addClass('cube-bottom');
                    //     $nextSlide.addClass('cube-top');
                    //     $lastSlide.addClass('cube-front');
                    // }

                    else {
                        console.log('else {');
                        $prevSlide.addClass('cube-top');
                        $currentSlide.addClass('cube-front');
                        $nextSlide.addClass('cube-bottom');
                        $lastSlide.addClass('cube-back');
                    }

                });

                // function getRelativeMousePosition(ev, element)
                // {
                //     console.log(ev.pageY);
                //     console.log($(element).offset().top);
                //     console.log($(element).height());
                //     return ( ev.pageY - $(element).offset().top ) / $(element).height();
                // }
                // // Event to initiate drag, include touchstart events
                // // _.$list.on('touchcancel.slick mouseleave.slick', {
                // $('.slick').on('touchstart mousedown', function(ev){
                //
                //     var offset = $(this).offset();
                //     var start = ev.pageY; // relative to the slide
                //     var slideHeight = $(ev.target).height();
                //
                //
                //     var mousepos = getRelativeMousePosition(ev, this);
                //     console.log('mousepos',mousepos);
                //     window.mousepos = mousepos;
                //
                //     window.eli = {};
                //     window.eli.start = start;
                //     window.eli.offset = offset;
                //     window.eli.slideHeight = slideHeight;
                //
                //     // Drag start logic
                //     // ...
                //
                //     // Event to end drag, may want to include touchend events
                //     $(this).one('touchend mouseup', function(ev){
                //
                //         $(this).off('mousemove');
                //         // Drag stop logic
                //         // ...
                //
                //     }).on('touchmove mousemove', function(ev){
                //         var diff = ev.pageY - start;
                //
                //         // var diff = diff - 450;
                //         //
                //         // var diff = diff * 90;
                //         console.log(diff, 'diff');
                //         console.log(ev.pageY, 'actualDiff');
                //         console.log(start, 'actualDiff');
                //         console.log(ev.pageY - start, 'actualDiff');
                //         console.log( 'divide this bitch by 90', slideHeight - ( diff / slideHeight ) );
                //
                //
                //
                //         var mousepos = getRelativeMousePosition(ev, this);
                //         console.log('mousepos',mousepos);
                //         console.log( 'this is it', 90 * mousepos );
                //
                //         // if ( Math.sign(diff) === -1 ) {
                //         //     console.log("GOING DOWN");
                //         // }
                //         //
                //         // if ( Math.sign(diff) === 1 ) {
                //         //     console.log('GOING UP');
                //         // }
                //         var elHeight = ev.target.offsetHeight;
                //         console.log(elHeight);
                //         console.log(start, ev.pageY, diff);
                //         $('.slick-track').css({
                //             transform: 'translateZ(-250px) rotateX(' + (90 * mousepos ) + 'deg)'
                //         })
                //     });
                // });
            }
        }
    };
    var leftSideSlideshow = new slickCubeRotator('#leftSideSlideshow');
    var rightSideSlideshow = new slickCubeRotator('#rightSideSlideshow');
    var heroSlideshow = new slickCubeRotator('#heroSlideshow');
    leftSideSlideshow.init();
    rightSideSlideshow.init();

    $('.slick').slick();
});
