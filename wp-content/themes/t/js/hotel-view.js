jQuery(function($){
    "use strict";

    var SLZ = window.SLZ || {};


    /*=======================================
    =             MAIN FUNCTION             =
    =======================================*/

    SLZ.mainFunction = function(){
        $('.wrapper-journey').slick({
            infinite: false,
            slidesToShow: 6,
            slidesToScroll: 6,
            autoplay: false,
            speed: 700,
            dots: true,
            arrows: false,
            responsive: [
                {
                    breakpoint: 1201,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 5
                    }
                },
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        dots: true,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 381,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false,
                    }
                }
            ]
        });

        $('.slider-for.group1').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav.group1'
        });
        $('.slider-nav.group1').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.slider-for.group1',
            arrows: false,
            infinite: true,
            // centerMode: true,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 1201,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 381,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
            ]
        });
        $('.slider-for.group2').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav.group2'
        });
        $('.slider-nav.group2').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.slider-for.group2',
            arrows: false,
            infinite: true,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 1201,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
            ]
        });
        $('.slider-for.group3').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav.group3'
        });
        $('.slider-nav.group3').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            asNavFor: '.slider-for.group3',
            arrows: false,
            infinite: true,
            focusOnSelect: true,
            responsive: [
                {
                    breakpoint: 1201,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
            ]
        });

        $('.btn-book-tour').click(function(event) {
            /* Act on the event */
            event.preventDefault();
            $(this).parents('.timeline-content').find('.timeline-book-block').toggleClass('show-book-block');
        });


        };

    /*======================================
    =            INIT FUNCTIONS            =
    ======================================*/

    $(document).ready(function(){
        SLZ.mainFunction();
    });

    /*=====  End of INIT FUNCTIONS  ======*/
});