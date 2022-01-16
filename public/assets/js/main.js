// Select 2 Js

$(".js-select2").select2({
    closeOnSelect: false,
    placeholder: "Select Your Course",
    allowHtml: true,
    allowClear: true,
    tags: true, // создает новые опции на лету
});

$(".icons_select2").select2({
    width: "100%",
    templateSelection: iformat,
    templateResult: iformat,
    allowHtml: true,
    placeholder: "Select Your Course",
    dropdownParent: $(".select-icon"), //обавили класс
    allowClear: true,
    multiple: false,
});

function iformat(icon, badge) {
    var originalOption = icon.element;
    var originalOptionBadge = $(originalOption).data("badge");

    return $(
        '<span><i class="fa ' +
            $(originalOption).data("icon") +
            '"></i> ' +
            icon.text +
            '<span class="badge">' +
            originalOptionBadge +
            "</span></span>"
    );
}

// Select2 js
