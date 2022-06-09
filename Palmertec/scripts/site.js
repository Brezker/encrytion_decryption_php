// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.
/*
$(function () {
    $("#datepicker").datepicker();
});
*/
const picker = document.getElementById('datepicker');
picker.addEventListener('input', function (e) {
    var day = new Date(this.value).getUTCDay();
    if ([0].includes(day)) {
        e.preventDefault();
        this.value = '';
        alert('Los domingos no hay servicio');
    }
});