require('./bootstrap');

import $ from 'jquery';
window.$ = window.jQuery = $;

$(document).ready(function(){
    $("#myToast").toast('show');
});
