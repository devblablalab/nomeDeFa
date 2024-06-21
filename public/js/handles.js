import { enableTargetControl } from './utils.js';

let lastRequestTime = 0;

function rateLimitCheck(message) {
  const now = Date.now();
  const timeSinceLastRequest = now - lastRequestTime;

  if (timeSinceLastRequest < 5000) {
    throw new Error(message)
  }
}

function updateLastRequestTime() {
  lastRequestTime = Date.now();
}

export function handleChangeFormInput(e) {
    const { currentTarget } = e;
    enableTargetControl(currentTarget);
} 
   
export async function handleClickSendData(e) {
  e.preventDefault();

  try {
    rateLimitCheck('Muitas solicitações foram realizadas em um curto período de tempo. Por favor tente novamente daqui a 5 segundos.');

    updateLastRequestTime();
  
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
    const json = await response.json();
    if(!response.ok) throw new Error(json?.message);
  } catch (error) {
    alert(error.message?.trim());
  }
}