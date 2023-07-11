// ANIMATED DIV FOLLOWING CURSOR

(function mouseAnimate() {
    var triggers = $('.js-mouseanimate-trigger');

    console.log('mouseAnimate loaded', triggers);

    // create styles
    let style = document.createElement('style');
    style.textContent =
        `.js-mouseanimate {
            position: absolute;
            pointer-events: none;
            opacity: 0;
            z-index: 1;
            transform: translateY(-50%);
        }`;
    document.head.append(style);

    // prepare each trigger
    if (triggers.length) {
        triggers.each(function (i) {
            let trigger = $(this);

            // we look for the animated element
            let animatedDiv = trigger.find('.js-mouseanimate');

            // if we don't find it, we look for a message in data-mouseanimate
            if (!animatedDiv[0]) {
                let message = trigger.attr('data-mouseanimate');
                animatedDiv = $('<div>', {
                    id: 'animatedDiv-' + i,
                    class: 'js-mouseanimate-msg',
                });
                $(' body ').append(animatedDiv);
                setMessage(message, animatedDiv);
            }

            // we create all event listeners
            trigger.on('mouseenter', () => {
                showBox(animatedDiv);
                $(window).on('mousemove', (e) => {
                    updateDisplay(e, animatedDiv);
                });
            });
            trigger.on('mouseleave', () => {
                hideBox(animatedDiv);
                $(window).off('mousemove');
            });
        });
    }

    function isTouchDevice() {
        return (('ontouchstart' in window) ||
           (navigator.maxTouchPoints > 0) ||
           (navigator.msMaxTouchPoints > 0));
      }

    function setMessage(msg, div) {
        div.html(msg);
    }
    
    function updateDisplay(e, div) {
        div.css('left', e.pageX + 'px');
        div.css('top', e.pageY + 'px');
    }
    
    function showBox(div) {
        if (!isTouchDevice()) {
            div.css('opacity', '1');
        }
    }
    
    function hideBox(div) {
        div.css('opacity', '0');
    }
})();
