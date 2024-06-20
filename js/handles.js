import { enableTargetControl } from './utils.js';

export function handleChangeFormInput(e) {
    const { currentTarget } = e;
    enableTargetControl(currentTarget);
} 
   
export async function handleClickSendData(e) {
  e.preventDefault();

  const form = document.forms[0];
  const formData = new FormData(form);
  const requestData = {};
  formData.forEach((value, key) => (requestData[key] = value));

  const options = {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(requestData)
  }

  const response = await fetch(form.action, options);
  const data = response.json();

  console.log(data);
}