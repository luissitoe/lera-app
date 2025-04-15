import './bootstrap';
import TomSelect from 'tom-select';
import "tom-select/dist/css/tom-select.css";

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {
    new TomSelect("#autores", {
        plugins: ['remove_button'],
        placeholder: "Selecione os autores",
    }) 
});

document.addEventListener('DOMContentLoaded', function () {
    new TomSelect("#generos", {
        plugins: ['remove_button'],
        placeholder: "Selecione os generos",
    }) 
});

document.addEventListener('DOMContentLoaded', function () {
    new TomSelect("#formato", {
        plugins: ['remove_button'],
        placeholder: "Selecione os generos",
    }) 
});