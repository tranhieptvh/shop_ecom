function preview() {
    main_frame.src=URL.createObjectURL(event.target.files[0]);
    if ($('#main_frame').hasClass('hidden')) {
        $('#main_frame').removeClass('hidden');
    }
}

var list_img = [];
function image_select() {
    var images = $('#thumbnail')[0].files;
    console.log(images)
    for (var i = 0; i < images.length; i++) {
        list_img.push({
            'name': images[i].name,
            'url': URL.createObjectURL(images[i]),
            'file': images[i],
        })
    }
    // $('#form')[0].reset();
    $('#thumbnail_container')[0].innerHTML = image_show();
}

function image_show() {
    var image = '';
    list_img.forEach((item) => {
        image += `<div class="image_container d-flex justify-content-center position-relative m-r-10">
                               <img src="`+ item.url +`" alt=thumbnail/>
                               <i class="icon-close position-absolute" onclick="delete_image(`+ list_img.indexOf(item) +`)"></i>
                          </div>`;
    });
    return image;
}

function delete_image(pos) {
    list_img.splice(pos, 1);
    $('#thumbnail_container')[0].innerHTML = image_show();
}
