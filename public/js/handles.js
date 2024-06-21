import { enableTargetControl,rateLimitCheck,updateLastRequestTime } from './utils.js';

export function handleChangeFormInput(e) {
    const { currentTarget } = e;
    enableTargetControl(currentTarget);
} 
   
export async function handleClickSendData(e) {
  e.preventDefault();

  const { currentTarget } = e;

  try {
    currentTarget.disabled = true;
    currentTarget.textContent = 'Adicionando...';
    
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
  } finally {
    currentTarget.disabled = false;
    currentTarget.textContent = 'Adicionar';
  }
}