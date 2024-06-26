import {
  dismissAlert,
  enableTargetControl,
  formHasEmptyField,
  rateLimitCheck,
  toggleFormContent,
  triggerAlert,
  updateLastRequestTime
} from './utils.js?ver=1.0.5';

export function handleKeyupFormInput(e) {
  const { currentTarget } = e;
  enableTargetControl(currentTarget);
} 
   
export async function handleClickSendData(e) {
  e.preventDefault();

  const { currentTarget } = e;

  dismissAlert(); 

  if(formHasEmptyField()) {
    return triggerAlert('Preencha todos os campos para adicionar a sugestão','warning');
  }

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

    // Success
    toggleFormContent(true);
  } catch (error) {
    triggerAlert(error.message?.trim(),'error');
  } finally {
    currentTarget.disabled = false;
    currentTarget.textContent = 'Adicionar';
  }
}

export function handleChangeCategory(e) {
  const { currentTarget } = e;
  const clsAction = currentTarget.value.trim() > 0 ? 'remove' : 'add';
  currentTarget.classList[clsAction]('empty-value');
}

export function handleClickCloseAlert(e) {
  const { currentTarget } = e;

  const selector = currentTarget.dataset.closeAlert || 'error';
  const alertParent = document.querySelector(`[data-alert-target="${selector}"]`);

  if(alertParent) alertParent.classList.remove('active');
}

function handleClickToggleInfo(action) {
  if(!['add','remove'].includes(action)) return;
  
  const bannerInfo = document.querySelector('#banner-info');
  bannerInfo.classList[action]('active');
}

export function handleClickOpenInfo() {
  handleClickToggleInfo('add');
}

export function handleClickCloseInfo() {
  handleClickToggleInfo('remove');
}