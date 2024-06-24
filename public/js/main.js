import { handleChangeFormInput, handleClickSendData, handleClickCloseAlert } from "./handles.js";

document.addEventListener('DOMContentLoaded', () => {
    const formInputs = document.querySelectorAll('.formInput');
    const closeAlerts = document.querySelectorAll('[data-close-alert]');
    const sendControl = document.getElementById('send-control');

    formInputs.forEach(input => input.addEventListener('change', handleChangeFormInput));
    closeAlerts.forEach(close => close.addEventListener('click', handleClickCloseAlert));
    sendControl.addEventListener('click', handleClickSendData);
});