$(document).ready(function() {
    // check and display backdrop 18+
    if (!sessionStorage.getItem('check18')) {
        $('.popup-confirm').removeClass('d-none');
        $('.backdrop-18').removeClass('d-none');
    }
    $('#btn-over-18').click(function () {
        $('.popup-confirm').addClass('d-none');
        $('.backdrop-18').addClass('d-none');
        sessionStorage.setItem('check18', true);
    });

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

    // Call API update cart
    $('.qty .plus').on('click', function () {
        let $qty = $(this).parent().find('input[name="quantity"]');
        $qty.attr('disabled', true);
        $(this).parent().find('button').attr('disabled', true);
        let cart_id = $(this).parent().data('cart_id');
        let cart_index = $(this).parent().data('cart_index');
        let quantity = parseInt($qty.val(), 10) + 1;
        updateCart(cart_id, cart_index, quantity);
    });
    $('.qty .minus').on('click', function () {
        let $qty = $(this).parent().find('input[name="quantity"]');
        if ( parseInt($qty.val(), 10) > 1) {
            $qty.attr('disabled', true);
            $(this).parent().find('button').attr('disabled', true);
            let cart_id = $(this).parent().data('cart_id');
            let cart_index = $(this).parent().data('cart_index');
            let quantity = parseInt($qty.val(), 10) - 1 ;
            updateCart(cart_id, cart_index, quantity);
        } else {
            console.log('delete')
        }
    });

    $('.input-number').blur(function() {
        $(this).attr('disabled', true);
        $(this).parent().find('button').attr('disabled', true);
        let cart_id = $(this).parent().data('cart_id');
        let cart_index = $(this).parent().data('cart_index');
        let quantity = $(this).val();
        updateCart(cart_id, cart_index, quantity);
    })

    // delete cart
    $('.delete-cart-item').click(function() {
        let cart_id = $(this).parent().data('cart_id');
        let cart_index = $(this).parent().data('cart_index');
        deleteCartItem(cart_id, cart_index);
    })

    // checkout
    $('.checkout-form .method-item').click(function() {
        if (!$(this).hasClass('active')) {
            $('.checkout-form .method-item').removeClass('active');
            $(this).addClass('active');
        }
        if ($(this).hasClass('method-banking')) {
            $('.info-banking').addClass('open');
        } else {
            $('.info-banking').removeClass('open');
        }
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

function updateCart(cart_id = null, cart_index ,quantity) {
    $.ajax({
        type:'POST',
        url:'/api/cart/update',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            cart_id: cart_id,
            cart_session_index: cart_index,
            quantity: quantity,
        },
        success:function(data){
            console.log(data);
            setTimeout(function() {
                let view_cart = $('#cart_' + cart_index)
                view_cart.find('input[name="quantity"]').attr('disabled', false);
                if (data.cart.quantity > 1) {
                    view_cart.find('button').attr('disabled', false);
                } else {
                    view_cart.find('button.btn-plus').attr('disabled', false);
                }

                view_cart.find('input[name="quantity"]').val(data.cart.quantity);
                view_cart.find('.total-amount span').text(new Intl.NumberFormat().format(data.cart.price * data.cart.quantity));
                $('.total-amount .total_bill span').text(new Intl.NumberFormat().format(data.total_price) + ' VNĐ')
                $('.total-amount .vat span').text(new Intl.NumberFormat().format(data.vat) + ' VNĐ')
                $('.total-amount .last span').text(new Intl.NumberFormat().format(data.total_price + data.vat) + ' VNĐ')
                $('.header .sinlge-bar .total-count').text(data.total_quantity);
            }, 1000)
        }
    });
}

function deleteCartItem(cart_id, cart_index) {
    $.ajax({
        type:'POST',
        url:'/api/cart/delete_cart_item',
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: {
            cart_id: cart_id,
            cart_session_index: cart_index,
        },
        success:function(data){
            console.log(data);
            if (data.result) {
                $('tr#cart_'+data.cart_index).remove();
                $('.total-amount .total_bill span').text(new Intl.NumberFormat().format(data.total_price) + ' VNĐ')
                $('.total-amount .vat span').text(new Intl.NumberFormat().format(data.vat) + ' VNĐ')
                $('.total-amount .last span').text(new Intl.NumberFormat().format(data.total_price + data.vat) + ' VNĐ')
                $('.header .sinlge-bar .total-count').text(data.total_quantity);
            }
        }
    });
}

function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
    if ($('#frame').hasClass('d-none')) {
        $('#frame').removeClass('d-none');
    }
}

function preview_evd() {
    preview();
    $('.wrap-submit').removeClass('d-none');
}
