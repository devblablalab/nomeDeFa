import { 
    handleKeyupFormInput, 
    handleClickSendData, 
    handleClickCloseAlert, 
    handleClickOpenInfo,
    handleClickCloseInfo 
} from "./handles.js";

document.addEventListener('DOMContentLoaded', () => {
    const formInputs = document.querySelectorAll('.formInput');
    const closeAlerts = document.querySelectorAll('[data-close-alert]');
    const sendControl = document.getElementById('send-control');
    const saibaMaisBtn = document.getElementById('saiba-mais');
    const bannerInfoCloseBtn = document.querySelector('#banner-info .close');

    formInputs.forEach(input => input.addEventListener('keyup', handleKeyupFormInput));
    closeAlerts.forEach(close => close.addEventListener('click', handleClickCloseAlert));
    sendControl.addEventListener('click', handleClickSendData);
    saibaMaisBtn.addEventListener('click', handleClickOpenInfo);
    bannerInfoCloseBtn.addEventListener('click', handleClickCloseInfo);
});