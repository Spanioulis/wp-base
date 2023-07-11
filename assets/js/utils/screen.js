export function isLaptop () {
    return (window.innerWidth <= 1500)
}
export function isTablet () {
    return (window.innerWidth <= 990)
}
export function isMobile () {
    return (window.innerWidth <= 767)
}
export function isMobileSmall () {
    return (window.innerWidth <= 576)
}

export const isTouchDevice = (('ontouchstart' in window) ||
  (navigator.maxTouchPoints > 0) ||
  (navigator.msMaxTouchPoints > 0));
