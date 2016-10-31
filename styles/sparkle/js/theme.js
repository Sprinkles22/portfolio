/* Copyright (C) YOOtheme GmbH, http://www.gnu.org/licenses/gpl.html GNU/GPL */

jQuery(function($) {

    var config = $('html').data('config') || {};

    // Social buttons
    $('article[data-permalink]').socialButtons(config);
   // Gradient follower
    if ($('.tm-stalker').length) {

        var stalker = $('.tm-stalker'), canvas = stalker.find('canvas')[0], ctx = canvas.getContext('2d'), gradient, initialized = false;

        UIkit.$doc.on('mousemove', function(e){

            setTimeout(function(){

                initialized = true;

                canvas.width  = stalker.width();
                canvas.height = stalker.height();

                gradient = ctx.createRadialGradient(e.clientX, e.clientY, 0, e.clientX, e.clientY, canvas.width);
                gradient.addColorStop(0.05, stalker.css('border-top-color'));
                gradient.addColorStop(0.1, stalker.css('border-right-color'));
                gradient.addColorStop(0.5, stalker.css('border-bottom-color'));
                ctx.fillStyle = gradient;
                ctx.fillRect(0, 0, canvas.width, canvas.height);

            }, initialized ? 200 : 0);

        });
    }

});

