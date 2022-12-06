import './bootstrap';

import '../sass/app.scss';
import * as bootstrap from 'bootstrap';

try {
    // 加载 jQuery
    window.$ = window.jQuery = require('jquery');
  
    require('bootstrap');
  } catch (e) {}