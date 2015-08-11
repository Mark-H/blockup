// Wrap your stuff in this module pattern for dependency injection
(function ($, ContentBlocks) {
    // Add your custom input to the fieldTypes object as a function
    // The dom variable contains the injected field (from the template)
    // and the data variable contains field information, properties etc.
    ContentBlocks.fieldTypes.blockup = function(dom, data) {
        var img = null;
        var input = {
            // Some optional variables can be defined here
        };
        
        // Do something when the input is being loaded
        input.init = function() {
            var properties = data.properties;
            var tabs = (function(properties){
                var tabs = '';
                var tabHidden = false;
                $.each(properties, function( key, value ) {
                    if(key.indexOf('tab_') === 0) {
                        if($.parseJSON(value) == 1) tabs += (key.substr(4) + ' ');
                        else tabHidden = true;
                    } 
                });
                if(!tabHidden) tabs = 'all';
                
                return tabs;
            })(properties);
            
            var $input = $(document.getElementById(data.generated_id + '_uploadcare'));
            $input.attr('data-tabs',tabs).attr('data-crop',properties.crop).attr('data-public-key',properties.pubkey);
            
            var widget = uploadcare.SingleWidget($input);
            
            var preview = $('<div>').attr('id',data.generated_id + '_preview');
            $input.after(preview);
            
            widget.onUploadComplete(function(info) {
                img = info.cdnUrl;
                preview.html($('<img src="' + img + '">').style({maxHeight:'12em'}));
            });
            
            
        }
        
        // Get the data from this input, it has to be a simple object.
        input.getData = function() {
            return {
                value: (img) ? ('<img src="' + img + '">') : ''
            }
        }
        
        // Always return the input variable.
        return input;
    }
})(vcJquery, ContentBlocks);