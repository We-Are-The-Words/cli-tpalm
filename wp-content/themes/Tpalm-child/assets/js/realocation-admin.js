jQuery(document).ready(function($) {
    function disablePanels(element) {
        var count = ($(element).val());

        var parent = $(element).parent().parent();
        var index = 1;
        parent.children(".accordion-panel").each(function() {
            if (index++ > count) {
                $(this).css("display", "none");
            } else {
                $(this).css("display", "block");
            }
        });
    }

    var selectElement = "select.panel-count";

    // Just active elements dragged to some sidebar. ID of this area is 'widgets-right'.
    $('#widgets-right').delegate( selectElement, 'change', function () {
        disablePanels(this);
    });
});