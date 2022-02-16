( function( wp ) {

    var badgeButton = function( props ) {
        return wp.element.createElement(
        wp.editor.RichTextToolbarButton, {
            icon: 'appearance', 
            title: ' Highlight', 
            onClick: function() {
                props.onChange( 
                    wp.richText.toggleFormat(props.value, {
                        type: 'marketers-delight/highlight'
                    }) 
                );
            }
        }
    );
       
    }

    // wp.richText.unregisterFormatType('core/underline');
    wp.richText.registerFormatType(
        'marketers-delight/highlight', {
            title: 'Highlight',
            tagName: 'span',
            className: 'highlight',
            edit: badgeButton,
        }
    );
} )( window.wp );