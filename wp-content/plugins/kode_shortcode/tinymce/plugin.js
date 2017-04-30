tinymce.PluginManager.add('kodeforest_button', function(ed, url) {
    ed.addCommand("kodeforestPopup", function ( a, params )
    {
        var popup = 'shortcode-generator';

        if(typeof params != 'undefined' && params.identifier) {
            popup = params.identifier;
        }
        
        jQuery('#TB_window').hide();

        // load thickbox
        tb_show("KodeForest Shortcodes", ajaxurl + "?action=kodeforest_shortcodes_popup&popup=" + popup + "&width=" + 800);
    });

    // Add a button that opens a window
    ed.addButton('kodeforest_button', {
        text: '',
        icon: true,
        image: KodeforestShortcodes.plugin_folder + '/tinymce/images/icon.png',
        cmd: 'kodeforestPopup'
    });
});