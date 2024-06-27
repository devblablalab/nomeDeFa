import {
    handleChangeCategory,
    handleClickCloseAlert,
    handleClickCloseInfo,
    handleClickOpenInfo,
    handleClickSendData,
    handleKeyupFormInput
} from "./handles.js?ver=1.0.9";

import { toggleFormContent } from "./utils.js?ver=1.0.9";

document.addEventListener('DOMContentLoaded', () => {
    const formInputs = document.querySelectorAll('.formInput');
    const closeAlerts = document.querySelectorAll('[data-close-alert]');
    const categoriesControl = document.getElementById('categories');
    const sendControl = document.getElementById('send-control');
    const saibaMaisBtn = document.getElementById('saiba-mais');
    const bannerInfoCloseBtn = document.querySelector('#banner-info .close');
    const backToFormBtn = document.querySelector('.back-to-form');

    formInputs.forEach(input => input.addEventListener('keyup', handleKeyupFormInput));
    closeAlerts.forEach(close => close.addEventListener('click', handleClickCloseAlert));
    categoriesControl.addEventListener('change', handleChangeCategory);
    sendControl.addEventListener('click', handleClickSendData);
    saibaMaisBtn.addEventListener('click', handleClickOpenInfo);
    bannerInfoCloseBtn.addEventListener('click', handleClickCloseInfo);
    backToFormBtn.addEventListener('click', () => toggleFormContent(false));

    let table = new Tabulator("#suggestions-table", {
        layout: "fitColumns",
        sortOrderReverse: true,
        resizableRows: false,
        resizableColumns: false,
        columns:[
            {title:"Quem", field:"who", minWidth:200, sorter:"string"},
            {title:"Fãs", field:"fan", headerSort:false, minWidth:200, formatter:"html", widthShrink:3},
            {title:"Categoria", field:"category", minWidth:200, headerSort:false},
        ],
        initialSort: [
            { column: 'who', dir: 'asc' },
        ]
    });
}); 