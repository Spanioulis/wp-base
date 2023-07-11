export var debounce = (callback, time = 1000) => {
  let debounceTimer;
  return (e) => {
    window.clearTimeout(debounceTimer);
    debounceTimer = window.setTimeout(callback.bind(null, e), time);
  };
};