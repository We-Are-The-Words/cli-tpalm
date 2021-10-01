jQuery(document).ready(function($) {
    'use strict';

    /**
     * Background image
     */
    $('*[data-background-image]').each(function() {
        $(this).css({
            'background-image': 'url(' + $(this).data('background-image') + ')'
        });
    });

    $("select").each(function() {
        $(this).wrap( "<div class='select-wrapper'></div>" );
    });

    /**
     * Detail gallery
     */
    var propertyGallery = $('.property-detail-gallery');
    var propertyGalleryPreview = $('.property-detail-gallery-preview-inner');
    var propertyGalleryPreviewCount = propertyGalleryPreview.data('count');
    var propertyGalleryPreviewItems = 4;

    if (propertyGallery.length != 0) {
        var loop = true;

        if (propertyGallery.length === 1) {
            loop = false;
        }

        propertyGallery.owlCarousel({
            items: 1,
            loop: loop,
            autoHeight: true,
            autoplay: true,
            autoplayTimeout:5000,
            smartSpeed: 700,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
        });
    }

    if (propertyGalleryPreview.length != 0) {
        propertyGalleryPreview.owlCarousel({
            items: propertyGalleryPreviewItems,
            nav: (propertyGalleryPreviewCount > propertyGalleryPreviewItems),
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
        });
    }

    $('.property-detail-gallery-preview-inner .owl-item:first').addClass('highlighted');

    propertyGallery.on('changed.owl.carousel', function(event) {
        var currentIndex = event.item.index - 0; // bug because of "loop: true";
        var firstActiveIndex = $('.property-detail-gallery-preview-inner .owl-item.active:first').children().data('item-id');
        var lastActiveIndex = $('.property-detail-gallery-preview-inner .owl-item.active:last').children().data('item-id');

        if ( currentIndex == event.item.count ) {
            currentIndex = 0;
        }

        // Highlight current item
        $('.property-detail-gallery-preview-inner .owl-item.highlighted').removeClass('highlighted');
        $('.property-detail-gallery-preview-inner .owl-item:eq(' + currentIndex + ')').addClass('highlighted');

        // Move preview if it is necessary
        if (firstActiveIndex >= currentIndex) {
            for (var i = 0; i <= ( firstActiveIndex - currentIndex ); i++) {
                propertyGalleryPreview.trigger('prev.owl.carousel');
            }
        } else if (lastActiveIndex <= currentIndex) {
            for (var i = 0; i <= ( currentIndex - lastActiveIndex ); i++) {
                propertyGalleryPreview.trigger('next.owl.carousel');
            }
        }
    });

    // Show in gallery image from preview
    $('.property-detail-gallery-preview-inner .owl-item').click(function(){
        var itemIndex = $(this).children().data('item-id');
        propertyGallery.trigger('to.owl.carousel', [itemIndex, 300]);
    });

    $('.property-detail-gallery').on('click', function() {
        propertyGallery.trigger('stop.owl.autoplay');
    });

    /**
     * Colorbox
     */
    $('.property-detail-gallery a').colorbox({
        ref: 'property-gallery',
        maxHeight: '90%',
        maxWidth: '85%'
    });


    //if ($('.property-gallery-index').length != 0) {
    //    $('.property-gallery-index').owlCarousel({
    //        items: 4,
    //        nav: true,
    //        dots: true,
    //        navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>']
    //    });
    //}
    //
    //$('.property-gallery-list-item a').on('click', function(e) {
    //    e.preventDefault();
    //
    //    var link = $(this).attr('rel');
    //    $('.property-gallery-preview img').attr('src', link);
    //    $('.property-gallery-preview a').attr('href', link);
    //});

    // 'easeInOutQuart'
    $.extend($.easing,
        {
            easeInOutQuart: function (x, t, b, c, d) {
                if ((t/=d/2) < 1) return c/2*t*t*t*t + b;
                return -c/2 * ((t-=2)*t*t*t - 2) + b;
                },
            easeOutExpo: function (x, t, b, c, d) {
                return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
            }
        }
    );

    $('.stats-value').each(function(){
        statsCounterAnimation(this);
    });

    function statsCounterAnimation(element) {
        var inView = false;

        if (isScrolledIntoView(element)) {
            if (inView) {
                return;
            }
            inView = true;
            $(element).each(function() {
                $(this).animateNumber({ number: $(this).data('value'), easing: 'easeOutExpo'}, 3000);
            });
        }

        $(window).scroll(function() {
            if (isScrolledIntoView(element)) {
                if (inView) {
                    return;
                }
                inView = true;
                $(element).each(function() {
                    $(this).animateNumber({ number: $(this).data('value'), easing: 'easeOutExpo'}, 3000);
                });
            }
        });
    }


    /**
     * Property valuation animation
     */
    $('.property-valuation').each(function() {
        propertyValuationAnimation('.bar-valuation')
    });

    function propertyValuationAnimation(element) {
        var inView = false;

        if (isScrolledIntoView(element)) {
            if (inView) {
                return;
            }
            inView = true;
            $(element).each(function() {
                console.log($(this));
                var steps = Math.floor(Math.random() * 1000) + 1000;
                var width = $(this).data('percentage');
                $(this).animate(
                    {width: width + '%'},
                    steps,
                    'easeInOutQuart'
                );
            });
        }

        $(window).scroll(function() {
            if (isScrolledIntoView(element)) {
                if (inView) {
                    return;
                }
                inView = true;
                $(element).each(function() {
                    console.log($(this));
                    var steps = Math.floor(Math.random() * 1000) + 1000;
                    var width = $(this).data('percentage');
                    $(this).animate(
                        {width: width + '%'},
                        steps,
                        'easeInOutQuart'
                    );
                });
            }
        });
    }

    // Check if scrolled to element
    function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemTop <= docViewBottom) && (elemBottom >= docViewTop));
    }
});