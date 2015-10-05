var QueryString = function () {
    // This function is anonymous, is executed immediately and
    // the return value is assigned to QueryString!
    var query_string = {};
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        // If first entry with this name
        if (typeof query_string[pair[0]] === "undefined") {
            query_string[pair[0]] = pair[1];
        // If second entry with this name
        } else if (typeof query_string[pair[0]] === "string") {
            var arr = [ query_string[pair[0]], pair[1] ];
            query_string[pair[0]] = arr;
        // If third or later entry with this name
        } else {
            query_string[pair[0]].push(pair[1]);
        }
    }
    return query_string;
} ();

jQuery(document).ready(function(){

    var currentstep = 0;
    if(QueryString.currentstep){
        currentstep = QueryString.currentstep;
    }


    var steps_json = stepData.steps;
    steps_json = jQuery.parseJSON(steps_json);

    var wip_index=0;
    jQuery.each(steps_json, function( k, v ) {
        wip_index++;
        jQuery("#"+v.id).attr("data-step",wip_index).attr("data-intro",v.desc).attr("data-url",v.url);
    });


    jQuery('#flexi_form_start').click(function() {
        introJs().setOption('doneLabel', 'Next page').start().oncomplete(function() {

            window.location.href = steps_json[currentstep].url+'?multipage=true&currentstep='+currentstep;
        }).onbeforechange(function(targetElement) {
            currentstep = jQuery(targetElement).attr("data-step");
		
		
        });
    });


    if (RegExp('multipage', 'gi').test(window.location.search)) {
        var introObj = 	introJs();
    
        introObj.setOption('doneLabel', 'Next page').start().oncomplete(function() {
 
            if(steps_json[currentstep]){
                window.location.href = steps_json[currentstep].url+'?multipage=true&currentstep='+currentstep;
            }
        }).onbeforechange(function(targetElement) {
            currentstep = jQuery(targetElement).attr("data-step");
	
            if(steps_json.length <= (parseInt(currentstep) + 1)){

                introObj.setOption('doneLabel', 'Done');
            }
        });
    }

});
