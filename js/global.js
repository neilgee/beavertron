(function($){

    $(function() { // Document Ready

    	// clickColumn();

        // Target Dropdowns for select2
        //$('.sf-input-select').select2({
            // minimumResultsForSearch: Infinity

            // });


        // Detects the end of an S&F Pro Ajax request being made - so you can re-target the dropdown
        // If using S&F Pro
        //    $(document).on("sf:ajaxfinish", ".searchandfilter", function(){
        //         $('.sf-input-select').select2({
                    // minimumResultsForSearch: Infinity
                    // });
                
        //     });

    });
    // Functions
    function clickColumn() {

        $('.click-col').css('cursor', 'pointer');
        
        $('.click-col').on('click', function(event){
            $(this).find('a')[0].click();
        });
    
        $('.click-col a').on('click', function(event){
            event.stopPropagation();
        });	
        
      }

})(jQuery);