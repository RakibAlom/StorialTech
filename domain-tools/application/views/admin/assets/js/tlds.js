(function($, admin_base_url) {"use strict";
    if( document.getElementById('body') )
        CKEDITOR.replace('body');

    function compileList() {
        let pages = $('.tld-sortable');
        let array = [];
        for(let i = 0; i < pages.length; i++) {
            array.push(pages[i].dataset.id);
        }

        return array;
    };

    let ids = compileList();

    $('#sortable-list').sortable({
        opacity: 0.5,
        cursor: "move",
        stop: function(e) {
            ids = compileList();

            $.post(
                admin_base_url + '/tlds/order',
                {
                    order: JSON.stringify(ids),
                    ref: 'admin-panel',
                },
                function(data) {
                    if(data.success) {
                        console.log('Updated tld order.');
                    }
                },
                'json'
            )
        } 
    });

    window.bitflan = {
        components: {
            tlds_component: function() {
                return {           
                    updateStatus(id) {
                        $.post(
                            admin_base_url + '/tlds/status',
                            {
                                id: id,
                                ref: 'admin-panel'
                            },
                            function() {
                                if(data.success) {
                                    console.log('Updated tld main status.');
                                }
                            },
                            'json'
                        )
                    },
                    updateMainStatus(id) {
                        $.post(
                            admin_base_url + '/tlds/main_status',
                            {
                                id: id,
                                ref: 'admin-panel'
                            },
                            function(data) {
                                if(data.success) {
                                    console.log('Updated tld main status.');
                                }
                            },
                            'json'
                        )
                    }
                }
            }
        }
    };
})(jQuery, admin_base_url)