$(document).ready(function () {
    
    var updateOutput = function () {
        $('#nestable-output').val(JSON.stringify($('#nestable').nestable('serialize')));
    };

    $('#nestable').nestable().on('change', updateOutput);

    updateOutput();

    $("#add-page-menu").on('click', function (e) {

        e.preventDefault();
        id = Date.now();
        var page_id = [];
        var content_type = '1';

        if ($("[name='chk[]']:checked").length > 0) {
            var i = 0;
            $('.page:checked').each(function (i) {
                page_id[i] = $(this).val();
                title = $(this).next("label").text();
                title = $.trim(title);
                slug = $(this).data('target-element');
                slug = $.trim(slug);

                

                $("#nestable > .dd-list").append('<li class="dd-item dd3-item" data-id="' + i + '" data-pid="' + page_id[i] + '" data-label="' + title + '" data-url="' + slug + '" data-content="' + content_type + '">' +
                    '<div class="dd-handle dd3-handle" > Drag</div>' +
                    '<div class="dd3-content"><span>' + title + '</span>' +
                    '<div class="item-edit">Edit</div>' +
                    '</div>' +
                    '<div class="item-settings d-none">' +
                    '<p><label for="">Navigation Label<br><input class="form-control" type="text" name="navigation_label" value="' + title + '"></label></p>' +
                    '<p><label for="">Navigation Url<br><input class="form-control" type="text" name="navigation_url" value="' + slug + '"></label></p>' +
                    '<p><a class="item-delete" href="javascript:;">Remove</a> |' +
                    '<a class="item-close" href="javascript:;">Close</a></p>' +
                    '</div>' +
                    '</li>');

                $(this).prop('disabled', true);
                // $i++;

            });

            $('.page').prop('checked', false);

        }

        // alert(id); exit;
        var label = $("#add-item > [name='name']").val();
        var url = $("#add-item > [name='url']").val();

        $("#nestable").find('.dd-empty').remove();
        $("#add-item > [name='name']").val('');
        $("#add-item > [name='url']").val('');
        updateOutput();
    });



    $("#add-post-menu").on('click', function (e) {

        e.preventDefault();
        id = Date.now();
        var post_id = [];
        var content_type = '2';

        if ($("[name='post[]']:checked").length > 0) {
            var i = 0;
            $('.post:checked').each(function (i) {
                post_id[i] = $(this).val();
                title = $(this).next("label").text();
                title = $.trim(title);
                slug = $(this).data('target-element');
                slug = $.trim(slug);

                $("#nestable > .dd-list").append('<li class="dd-item dd3-item" data-id="' + i + '" data-pid="' + post_id[i] + '" data-label="' + title + '" data-url="' + slug + '" data-content="' + content_type + '">' +
                    '<div class="dd-handle dd3-handle" > Drag</div>' +
                    '<div class="dd3-content"><span>' + title + '</span>' +
                    '<div class="item-edit">Edit</div>' +
                    '</div>' +
                    '<div class="item-settings d-none">' +
                    '<p><label for="">Navigation Label<br><input class="form-control" type="text" name="navigation_label" value="' + title + '"></label></p>' +
                    '<p><label for="">Navigation Url<br><input class="form-control" type="text" name="navigation_url" value="' + slug + '"></label></p>' +
                    '<p><a class="item-delete" href="javascript:;">Remove</a> |' +
                    '<a class="item-close" href="javascript:;">Close</a></p>' +
                    '</div>' +
                    '</li>');

                // console.log(slug);

                $(this).prop('disabled', true);

            });

            $('.post').prop('checked', false);

        }

        // alert(id); exit;
        var label = $("#add-item > [name='name']").val();
        var url = $("#add-item > [name='url']").val();

        $("#nestable").find('.dd-empty').remove();
        $("#add-item > [name='name']").val('');
        $("#add-item > [name='url']").val('');
        updateOutput();
    });



    $("#add-category-menu").on('click', function (e) {
        e.preventDefault();
        id = Date.now();
        var cat_id = [];
        var content_type = '3';

        if ($("[name='category[]']:checked").length > 0) {
            var i = 0;
            $('.category:checked').each(function (i) {

                cat_id[i] = $(this).val();
                title = $(this).next("label").text();
                title = $.trim(title);
                slug = $(this).data('target-element');
                slug = $.trim(slug);

                $("#nestable > .dd-list").append('<li class="dd-item dd3-item" data-id="' + i + '" data-pid="' + cat_id[i] + '" data-label="' + title + '" data-url="' + slug + '" data-content="' + content_type + '">' +
                    '<div class="dd-handle dd3-handle" > Drag</div>' +
                    '<div class="dd3-content"><span>' + title + '</span>' +
                    '<div class="item-edit">Edit</div>' +
                    '</div>' +
                    '<div class="item-settings d-none">' +
                    '<p><label for="">Navigation Label<br><input class="form-control" type="text" name="navigation_label" value="' + title + '"></label></p>' +
                    '<p><label for="">Navigation Url<br><input class="form-control" type="text" name="navigation_url" value="' + slug + '"></label></p>' +
                    '<p><a class="item-delete" href="javascript:;">Remove</a> |' +
                    '<a class="item-close" href="javascript:;">Close</a></p>' +
                    '</div>' +
                    '</li>');

                // console.log(slug);

                $(this).prop('disabled', true);

            });

            $('.category').prop('checked', false);

        }

        // alert(id); exit;
        var label = $("#add-item > [name='name']").val();
        var url = $("#add-item > [name='url']").val();

        $("#nestable").find('.dd-empty').remove();
        $("#add-item > [name='name']").val('');
        $("#add-item > [name='url']").val('');
        updateOutput();
    });



    $("#add-custom-link-menu").on('click', function (e) {


        e.preventDefault();
        var content_type = '4';
        var title = $("#cs_link").val();
        var slug = $("#cs_url").val();

        $("#nestable > .dd-list").append('<li class="dd-item dd3-item" data-pid="NULL" data-label="' + title + '" data-url="' + slug + '" data-content="' + content_type + '">' +
            '<div class="dd-handle dd3-handle" > Drag</div>' +
            '<div class="dd3-content"><span>' + title + '</span>' +
            '<div class="item-edit">Edit</div>' +
            '</div>' +
            '<div class="item-settings d-none">' +
            '<p><label for="">Navigation Label<br><input class="form-control" type="text" name="navigation_label" value="' + title + '"></label></p>' +
            '<p><label for="">Navigation Url<br><input class="form-control" type="text" name="navigation_url" value="' + slug + '"></label></p>' +
            '<p><a class="item-delete" href="javascript:;">Remove</a> |' +
            '<a class="item-close" href="javascript:;">Close</a></p>' +
            '</div>' +
            '</li>');
        // $(this).prop('disabled', true);
        // $('.category').prop('checked', false);
        // alert(id); exit;
        $("#cs_link").val('');
        $("#cs_url").val('');
        var label = $("#add-item > [name='name']").val();
        var url = $("#add-item > [name='url']").val();

        $("#nestable").find('.dd-empty').remove();
        $("#add-item > [name='name']").val('');
        $("#add-item > [name='url']").val('');
        updateOutput();
    });

    $("body").delegate(".item-delete", "click", function (e) {
        $(this).closest(".dd-item").remove();
        updateOutput();
    });


    $("body").delegate(".item-edit, .item-close", "click", function (e) {
        var item_setting = $(this).closest(".dd-item").find(".item-settings");
        if (item_setting.hasClass("d-none")) {
            item_setting.removeClass("d-none");
        } else {
            item_setting.addClass("d-none");
        }
    });

    $("body").delegate("input[name='navigation_label']", "change paste keyup", function (e) {
        $(this).closest(".dd-item").data("label", $(this).val());
        $(this).closest(".dd-item").find(".dd3-content span").text($(this).val());
    });

    $("body").delegate("input[name='navigation_url']", "change paste keyup", function (e) {
        $(this).closest(".dd-item").data("url", $(this).val());
    });




    

});