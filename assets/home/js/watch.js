(function() {
    'use strict';
    $(document).ready(function() {

        const player = new Plyr('#player');
        player.source = {
            debug: true,
            type: 'video',
            title: 'View video',
            keyboard: {
                global: true
            },
            tooltips: {
                controls: true
            },
            captions: {
                active: true
            },
            sources: [{
                src: VIDEO_URL,
                type: VIDEO_TYPE,
            }]
        };

        $("#copy").on("click", function() {
            var copyText = document.getElementById("sharelink");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");
        });

        $("#share").on("click", function() { $(".share-buttons").toggle(); });
        $("#share-mobile").on("click", function() { $(".share-buttons").toggle(); });
    });
})(jQuery);