$(document).ready(function() {
    $('#select-sort').change(function() {
        $('.filter input[name="sort"]').val($(this).val());
        $('.filter form#search-product').submit();
    })

    $('.filter form#search-product').submit(function () {
        $(this).find('option:selected[value=""]').attr('disabled', true);
        var sort = $('.filter form#search-product input[name="sort"]');
        var keyword = $('.filter form#search-product input[name="keyword"]');
        if (sort.val() === '') {
            sort.attr('disabled', true);
        }
        if (keyword.val() === '') {
            keyword.attr('disabled', true);
        }
    })

    $('.thumbnail-img .thumbnail-item').click(function () {
        $('.thumbnail-img .thumbnail-item').removeClass('active');
        $(this).addClass('active');
        let target_src = $(this).find('img').attr('src');
        console.log(target_src)
        $('.main-img img').fadeOut(200, function() {
            $('.main-img img').attr('src', target_src);
        }).fadeIn(100);
    })

    $('.thumbnail-img').owlCarousel({
        items:1,
        smartSpeed: 400,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        loop:false,
        nav:true,
        merge:true,
        dots:false,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        responsive:{
            0: {
                items:1,
            },
            300: {
                items:1,
            },
            480: {
                items:2,
            },
            768: {
                items:3,
            },
            1170: {
                items:3,
            },
        }
    });
});
