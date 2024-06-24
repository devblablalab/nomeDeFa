let lastRequestTime = 0;

export function rateLimitCheck(message) {
  const now = Date.now();
  const timeSinceLastRequest = now - lastRequestTime;

  if (timeSinceLastRequest < 5000) {
    throw new Error(message)
  }
}

export function updateLastRequestTime() {
  lastRequestTime = Date.now();
}

export function enableTargetControl(control) {
    if(!control?.dataset?.controlTarget) return;

    const targetSelector = control.dataset.controlTarget;
    const targetControl = document.querySelector(targetSelector);

    if(!targetControl) return;

    const controlOptions = {
      class: control.value.trim().length > 0 ? 'add' : 'remove',
      disabled: control.value.trim().length > 0 ? false : true
    }

    targetControl.classList[controlOptions['class']]('active-control');
    targetControl.disabled = controlOptions['disabled'];
}

function alertActionCommon(message = '', type = '', action = 'add') {
  const selector = type?.trim()?.length == 0 ? '[data-alert-target]' : `[data-alert-target="${type}"]`;
  const currentAlert = document.querySelector(selector);
  const hasValidAction = ['add','remove'].includes(action);

  if(!currentAlert || !hasValidAction) return;

  const alertText = currentAlert.querySelector('.text');

  alertText.textContent = message;
  currentAlert.classList[action]('active');
}

export function triggerAlert(message = '', type = 'error') {  
  alertActionCommon(message,type,'add');
}

export function dismissAlert(type = '') {
  alertActionCommon('',type,'remove');
}

 