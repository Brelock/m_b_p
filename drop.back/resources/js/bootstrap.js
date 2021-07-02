window._ = require('lodash');

window.Vue = require('vue');

window.getQueryParam = function(name, defaultValue) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");

  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);

  defaultValue = defaultValue || "";
  return results === null ? defaultValue : decodeURIComponent(results[1].replace(/\+/g, " "));
};

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.interceptors.response.use(function(response){
  return response;
}, function(error){
  if(error.response.status !== 419) return Promise.reject(error);
  window.location.reload();
});

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
window.axios.defaults.headers.common['Content-Type'] = 'application/json';

window.axios.defaults.withCredentials = true;
window.axios.defaults.baseURL = window._BASE_URL;

if(!window._IS_GUEST) {
  let jwtToken = localStorage.getItem('_jwtToken') || getQueryParam('token');
  if(jwtToken) {
    localStorage.setItem('_jwtToken', jwtToken);
    axios.defaults.headers.common['Authorization'] = 'Bearer ' + jwtToken;
  }
} else {
  localStorage.removeItem('_jwtToken');
}

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
