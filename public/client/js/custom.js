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

    $('.product-detail .btn-more').click(function () {
        if ($('.product-detail .wrap-info .info').hasClass('show')) {
            $('.product-detail .wrap-info .info').removeClass('show');
            $(this).text('Xem tiếp...');
        } else {
            $('.product-detail .wrap-info .info').addClass('show');
            $(this).text('Ẩn nội dung');
        }
    })

    // Call API add cart
    $('.add-to-cart').click(function() {
        let user_id = $(this).data('user_id');
        let product_id = $(this).data('product_id');
        addToCart(user_id, product_id);
    });
});

function addToCart(user_id, product_id) {
    $.ajax({
        type:'POST',
        url:'/api/cart/add',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            user_id: user_id,
            product_id: product_id,
        },
        success:function(data){
            console.log(data);
            $('.header .sinlge-bar .total-count').text(data.total_quantity);
        }
    });
}
