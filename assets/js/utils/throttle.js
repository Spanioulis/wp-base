export function scrollThrottle(callback, throttleTime) {

    let throttlePause;

    const throttle = (callback, time) => {
      if (throttlePause) return;
    
      throttlePause = true;
      callback();
      setTimeout(() => {
        throttlePause = false;
      }, time);
    };
    
    
    window.addEventListener("scroll", () => {
        throttle(callback, throttleTime);
    });
  
}

export function customThrottle(callback, throttleTime, listenerElement, listenerEvent) {

  let throttlePause;

  const throttle = (callback, time, event) => {
    if (throttlePause) return;
  
    throttlePause = true;
    callback(event);
    setTimeout(() => {
      throttlePause = false;
    }, time);
  };
  
  
  listenerElement.addEventListener(listenerEvent, (e) => {
      throttle(callback, throttleTime, e);
  });

}