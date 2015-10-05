jQuery(document).ready(function(){

    jQuery( "#sortable" ).sortable({
        update: function() {

            var selected_ids = '';
            jQuery(".wip_sort").each(function() {
                selected_ids += jQuery(this).attr("data-identifier")+"@";
            });
            
            jQuery.post(conf.ajaxURL, { 
                action: "wpintro_update_step_order", 
                data: selected_ids,
 
            }, function(data) { }, "json" );
        }

    });
    jQuery( "#sortable" ).disableSelection();

});
