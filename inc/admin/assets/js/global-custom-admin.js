window.Project = (function (window, document, $, undefined) {
    'use strict';

    var globalAdmin = {
        initialize: function () {
            globalAdmin.initAny();
        },

        initAny: function () {
            if ($('.custom_layout_on_off').is(':checked')) {
                $('.layout-option-area').show();
            } else {
                $('.layout-option-area').hide();
            }
            $('.custom_layout_on_off').click(function () {
                if ($(this).is(':checked')) {
                    $('.layout-option-area').show();
                } else {
                    $('.layout-option-area').hide();
                }
            });
        }

    };
    $(document).ready(globalAdmin.initialize);
    return globalAdmin;
})(window, document, jQuery);


