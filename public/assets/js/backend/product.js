var list_img = [];
function image_select() {
    var images = $('#thumbnail')[0].files;
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
    // show img
    list_img.splice(pos, 1);
    $('#thumbnail_container')[0].innerHTML = image_show();

    // change value of input
    const dt = new DataTransfer();
    const input = $('#thumbnail')[0];
    const { files } = input;

    for (let i = 0; i < files.length; i++) {
        const file = files[i]
        if (pos !== i) {
            dt.items.add(file);
        }
    }

    input.files = dt.files;
}
