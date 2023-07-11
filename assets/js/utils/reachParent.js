export function reachParent(element,className) {
    if (element.classList.contains(className) || element == document.body) {
        return element;
    } else {
        return reachParent(element.parentElement,className);
    }
}