jQuery(document).ready(function ($) {
    $('html').removeClass('no-js');

    var executiveBioAccordion =
    {
        init: function () {
            this.transitionDuration = 500;
            this.addEventListeners();
        },

        closeAllBios: function () {
            $('.grid-loop-item-executive').removeClass('active');
        },

        viewBio: function () {
            var self = this;

            if (this.anyBiosOpen()) {
                this.closeAllBios();

                setTimeout(function () {
                    $(self.parent).addClass('active');
                }, self.transitionDuration + 200);
            } else {
                $(self.parent).addClass('active');
            }
        },

        anyBiosOpen: function () {
            var isOpen = false;

            $('.grid-loop-item-executive').each(function (i) {
                if ($(this).hasClass('active')) {
                    isOpen = true;
                }
            });

            return isOpen;
        },

        getParent: function (ev) {
            return ev.delegateTarget;
        },

        addEventListeners: function () {
            var self = this;

            $('.grid-loop-item-executive').on('click', '.view-bio', function (ev) {
                self.parent = self.getParent(ev);
                self.viewBio();
            });

            $('.grid-loop-item-executive').on('click', '.close-bio', function () {
                self.closeAllBios();
            });
        }
    };
    executiveBioAccordion.init();

    var searchForm = {

        init: function () {
            this.addEventListeners();
        },

        showSearchForm: function () {
            $('.search-form-container').addClass('active');
        },

        addEventListeners: function () {
            var self = this;

            $('.search-form-container').on('click', '#openSearchForm', function () {
                self.showSearchForm();
            });
        }
    };
    // searchForm.init();

    var moreInformationBar = {
        init: function () {
            this.$element = $('#moreInformationBar');
            this.height = this.$element.height();
            this.lastScroll;
            this.addEventListeners();
        },

        detectScrollDown: function () {
            console.log("HELLO");
            var scrollDistance = $(window).scrollTop();

            if (scrollDistance > moreInformationBar.height) {
                moreInformationBar.$element.addClass('hidden');
                moreInformationBar.removeEventListeners();
            }
        },

        scrollToContent: function () {
            var speed = 1000;
            var offset = Math.round($('#cta-slideshow-0').offset().top) - $('.site-header').height();

            $('html,body').animate({
                scrollTop: offset
            }, speed, 'swing');

            moreInformationBar.$element.addClass('hidden');
        },

        removeEventListeners: function () {
            $(window).off('scroll', this.detectScrollDown);
            moreInformationBar.$element.off('click', this.scrollToContent);
        },

        addEventListeners: function () {
            var self = this;

            this.$element.on('click', this.scrollToContent);
            $(window).on('scroll', this.detectScrollDown);
        }
    };
    moreInformationBar.init();

    var ubermenuNavigation;
    ubermenuNavigation = {

        $overlay: $('#backdropOverlayContainer'),
        activeClass: 'activated',

        init: function () {
            this.addEventListeners();
        },

        openOverlay: function () {
            this.$overlay.addClass(this.activeClass);
        },

        closeOverlay: function () {
            this.$overlay.removeClass(this.activeClass);
        },

        addEventListeners: function() {
            var self = this;

            $('.nav-primary').on('mouseenter', '.ubermenu-has-submenu-drop', function () {

                console.info('*** UBER MENU OPEN ***');
                $('.slick').slick('slickPause');
                self.openOverlay();
            });

            $('.nav-primary').on('mouseleave', '.ubermenu-has-submenu-drop', function () {
                console.info('*** UBER MENU CLOSE ***');
                $('.slick').slick('slickPlay');
                self.closeOverlay();
            });
        }
    };
    ubermenuNavigation.init();


// START UberMenu Force Open Menu Items for Styling
//     var ubermenuOpenSubmenus = function() {
//
//         $( '.ubermenu' ).ubermenu( 'openSubmenu' , $( '.ubermenu-item' ) );
//         // Mobile trigger
//         $('.ubermenu-responsive-toggle').trigger('click');
//     };
//
//     window.setTimeout( ubermenuOpenSubmenus, 500 );
// END UberMenu Force Open Menu Items for Styling

    var slickCubeRotator = function (element, translateZ) {
        this.element = element;
        this.translateZ = translateZ;
        this.degreesRotated = 0;
        this.previousSlideIndex = 0;
        this.slick = {};
    }

    slickCubeRotator.prototype = $.extend(slickCubeRotator, {
        init: function () {
            this.addEventListeners();
        },

        setup: function (slick) {
            this.slick = slick;
            var $prevSlide = $(slick.$slides[slick.slideCount - 1]);
            var $currentSlide = $(slick.$slides[0]);
            var $nextSlide = $(slick.$slides[1]);
            var $lastSlide = $(slick.$slides[2]);

            $prevSlide.addClass('cube-top');
            $currentSlide.addClass('cube-front');
            $nextSlide.addClass('cube-bottom');
            $lastSlide.addClass('cube-back');

            slick.$slideTrack.css({
                transform: 'translateZ(' + self.translateZ + ') rotateX(' + self.degreesRotated + 'deg)'
            });
            // slick.slickSetOption('speed', 1500, true);
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
                var slideDiff = nextSlide - currentSlide;
                console.log('slideDiff', slideDiff);
                console.log('in on beforeChang current = ', currentSlide);
                console.log('in on beforeChang next = ', nextSlide);

                if (currentSlide === nextSlide) {
                    return;
                }
                else if (currentSlide === slick.slideCount - 1 && nextSlide === 0) {
                    self.degreesRotated += 90;
                }
                else if (currentSlide === 0 && nextSlide === slick.slideCount - 1) {
                    self.degreesRotated -= 90;
                }
                else {
                    self.degreesRotated += 90 * slideDiff;
                }

                slick.$slideTrack.css({
                    transform: 'translateZ(' + self.translateZ + ') rotateX(' + self.degreesRotated + 'deg)'
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

                else {
                    console.log('else {');
                    $prevSlide.addClass('cube-top');
                    $currentSlide.addClass('cube-front');
                    $nextSlide.addClass('cube-bottom');
                    $lastSlide.addClass('cube-back');
                }

            });
        }
    });

    var dualRotator = function (element, translateZ) {
        slickCubeRotator.call(this, element, translateZ);
    }
    dualRotator.prototype = $.extend(slickCubeRotator);
    // dualRotator.prototype.addEventListeners = function() {
    //     slickCubeRotator.addEventListeners.call(this);
    //
    //     $(this.element).on('init', function(event, slick){
    //         console.log(slick);
    //         slick.slickSetOption('speed', 1000);
    //     });
    //     $(this.element).on('beforeChange', function(event, slick, currentSlide, nextSlide){
    //         console.log("HELLO", this, event, slick);
    //     });
    // }

    var leftSideSlideshow = new dualRotator('#leftSideSlideshow', '-163px');
    var rightSideSlideshow = new dualRotator('#rightSideSlideshow', '-163px');
    var heroSlideshow = new slickCubeRotator('#heroSlideshow', '-44vh');
    leftSideSlideshow.init();
    rightSideSlideshow.init();
    heroSlideshow.init();

    $('.dual-rotating-slideshow-container .slick').on('click', '.slick-dots', function (event) {
        var leftSlick = $('#leftSideSlideshow').slick('getSlick');
        var rightSlick = $('#rightSideSlideshow').slick('getSlick');

        console.log($(event.target).closest('.slick'));
        if ($(event.target).closest('.slick').attr('id') === 'leftSideSlideshow') {
            rightSlick.slickGoTo(leftSlick.currentSlide);
        } else {
            leftSlick.slickGoTo(rightSlick.currentSlide);
        }
    });

    $('.dual-rotating-slideshow-container .slick').on('swipe', function (event) {
        var leftSlick = $('#leftSideSlideshow').slick('getSlick');
        var rightSlick = $('#rightSideSlideshow').slick('getSlick');

        console.log($(event.target).closest('.slick'));
        if ($(event.target).closest('.slick').attr('id') === 'leftSideSlideshow') {
            rightSlick.slickGoTo(leftSlick.currentSlide);
        } else {
            leftSlick.slickGoTo(rightSlick.currentSlide);
        }
    });

    $('.dual-rotating-slideshow-container .slick').on('afterChange', function (event, slick, currentSlide, nextSlide) {
        console.log('CHECK THIS SHIT OUT', event, slick, currentSlide);
        if (slick.$slider.attr('id') === 'leftSideSlideshow') {
            $('#rightSideSlideshow').slick('slickGoTo', currentSlide, true);
        }
    });

    $('.slick').slick();
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