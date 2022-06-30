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
});
