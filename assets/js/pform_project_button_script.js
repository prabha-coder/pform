jQuery(document).ready(function() {
	jQuery(".PForm_button_form").click(function() {
        jQuery(".pform_outer_layout").show({ effect: "scale", direction: "horizontal" });
        jQuery(".PForm_button_form").hide({ effect: "scale", direction: "horizontal" });
    });

    jQuery(".pform_outer_close_icon").click(function() {
        jQuery(".pform_outer_layout").hide({ effect: "scale", direction: "horizontal" });
        jQuery(".PForm_button_form").show({ effect: "scale", direction: "horizontal" });
    });
});