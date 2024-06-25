import { 
    handleKeyupFormInput, 
    handleClickSendData, 
    handleClickCloseAlert, 
    handleClickOpenInfo,
    handleClickCloseInfo 
} from "./handles.js";

import { toggleFormContent, getLangOptionsTabulator } from "./utils.js";

document.addEventListener('DOMContentLoaded', () => {
    const formInputs = document.querySelectorAll('.formInput');
    const closeAlerts = document.querySelectorAll('[data-close-alert]');
    const sendControl = document.getElementById('send-control');
    const saibaMaisBtn = document.getElementById('saiba-mais');
    const bannerInfoCloseBtn = document.querySelector('#banner-info .close');
    const backToFormBtn = document.querySelector('.back-to-form');

    formInputs.forEach(input => input.addEventListener('keyup', handleKeyupFormInput));
    closeAlerts.forEach(close => close.addEventListener('click', handleClickCloseAlert));
    sendControl.addEventListener('click', handleClickSendData);
    saibaMaisBtn.addEventListener('click', handleClickOpenInfo);
    bannerInfoCloseBtn.addEventListener('click', handleClickCloseInfo);
    backToFormBtn.addEventListener('click', () => toggleFormContent(false));

    let table = new Tabulator("#suggestions-table", {
        layout:"fitColumns",
        pagination:"local",
        paginationSize:5,
        sortOrderReverse: true,
        columns:[
            {title:"Quem", field:"who", sorter:"string"},
            {title:"Fãs", field:"fan", headerSort:false,formatter:"html"},
            {title:"Categoria", field:"category", headerSort:false},
        ],
        initialSort: [
            { column: 'who', dir: 'asc' },
        ],
        locale: true,
        langs: getLangOptionsTabulator()
    });
});