export function addClass(elements, classname) {

    if (elements) {

        var element_list;

        if (typeof(elements) == 'string') {
            element_list = document.querySelectorAll(elements);
        } else {
            element_list = elements;
        }
    
        Array.from(element_list).forEach((el) => {
            el.classList.add(classname);
        });

    }
}

export function removeClass(elements, classname) {

    if (elements) {

        var element_list;

        if (typeof(elements) == 'string') {
            element_list = document.querySelectorAll(elements);
        } else {
            element_list = elements;
        }
    
        Array.from(element_list).forEach((el) => {
            el.classList.remove(classname);
        });

    }
}