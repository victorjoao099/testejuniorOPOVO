import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import _ from 'lodash';
window._ = _;

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();