import { handleChangeFormInput, handleClickSendData } from "./handles.js";

document.addEventListener('DOMContentLoaded', () => {
    const formInputs = document.querySelectorAll('.formInput');
    const sendControl = document.getElementById('send-control');

    formInputs.forEach(input => input.addEventListener('change', handleChangeFormInput));
    sendControl.addEventListener('click', handleClickSendData);
});