(function contentfulPaint() {

    // ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    //  options
    const options = {
        time_to_second: 0,
        time_to_third: 1400,
        onload_time_estimate: 1000,
        animation_time: 3000,
        animation_function: 'ease'
    }


    // ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    // preparation

    // add transition styles
    let styles = `
        .js-1cp, .js-2cp, .js-3cp { 
            transition: opacity ${options.animation_time/1000}s ${options.animation_function}; 
        }
    `;
    let styleSheet = document.createElement("style")
    styleSheet.innerText = styles
    document.head.appendChild(styleSheet)


    // ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    // start unhiding elements

    document.addEventListener("DOMContentLoaded", function() {

        // locate hidden els
        const first_elements = document.querySelectorAll('.js-1cp');
        const second_elements = document.querySelectorAll('.js-2cp');
        const third_elements = document.querySelectorAll('.js-3cp');

        // on doc ready, unhide Frist Contentful Paint
        unhideElements(first_elements);

        // in case window load fails
        setTimeout(()=>{
            unhideElements(second_elements);
        }, options.time_to_second + options.onload_time_estimate);
        setTimeout(()=>{
            unhideElements(third_elements);
        }, options.time_to_third + options.onload_time_estimate);

    });

    
    // on window load, unhide Second Contentful Paint
    window.addEventListener('load', (event) => {

        // locate hidden els
        const second_elements = document.querySelectorAll('.js-2cp');
        const third_elements = document.querySelectorAll('.js-3cp');

        setTimeout(()=>{
            unhideElements(second_elements);
        }, options.time_to_second);
        setTimeout(()=>{
            unhideElements(third_elements);
        }, options.time_to_third);
    });


    // ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
    // aux functions

    function unhideElements(list) {
        // console.log('unhideElements',list)
        Array.from(list).forEach((el) => {
            el.style.opacity = 1;
            setTimeout(()=>{
                el.classList.remove('js-1cp');
                el.classList.remove('js-2cp');
                el.classList.remove('js-3cp');
            }, options.animation_time);
        });
    }
})();
