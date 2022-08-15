// add slug
$('input#name').keyup(function () {
    var title, slug;

    //Lấy text từ thẻ input title
    title = $(this).val();

    //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    $('input#slug').val(slug);
});

// convert format price
// $("input[name='price']").keyup(function (e) {
//     formatMoney($(this), e);
// });
// $("input[name='ship_fee']").keyup(function (e) {
//     formatMoney($(this), e);
// });

function formatMoney(target, e) {
    // When user select text in the document, also abort.
    var selection = window.getSelection().toString();
    if ( selection !== '' ) {
        return;
    }

    // When the arrow keys are pressed, abort.
    if ( $.inArray( e.keyCode, [38,40,37,39] ) !== -1 ) {
        return;
    }

    // Get the value.
    var input = target.val();

    var input = input.replace(/[\D\s\._\-]+/g, "");
    input = input ? parseInt( input, 10 ) : 0;

    target.val( function() {
        return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
    } );
}

function preview() {
    frame.src=URL.createObjectURL(event.target.files[0]);
    if ($('#frame').hasClass('hidden')) {
        $('#frame').removeClass('hidden');
    }
}

function previewQrCode(idFrame) {
    idFrame.src=URL.createObjectURL(event.target.files[0]);
    if ($('#'+idFrame.id).hasClass('hidden')) {
        $('#'+idFrame.id).removeClass('hidden');
    }
}

function deleteQrCode(idFrame, targetInput) {
    targetInput.value = 1;
    console.log(idFrame);
    console.log(targetInput);
    idFrame.remove();
}

$('#form_update_order').on('submit', function() {
    let ship_fee = $("input[name='ship_fee']");
    ship_fee.val(ship_fee.val().replace(/,/g, ''));

    let total = $("input[name='total']");
    total.val(total.val().replace(/,/g, ''));
});
$('#form_update_info').on('submit', function() {
    let ship_fee = $("input[name='ship_fee']");
    ship_fee.val(ship_fee.val().replace(/,/g, ''));
});