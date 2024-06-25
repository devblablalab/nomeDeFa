let lastRequestTime = 0;

export function getLangOptionsTabulator() {
  return {
    "pt-br": {
        "pagination": {
            "first": "Primeiro",
            "first_title": "Primeira Página",
            "last": "Último",
            "last_title": "Última Página",
            "prev": "Anterior",
            "prev_title": "Página Anterior",
            "next": "Próximo",
            "next_title": "Próxima Página",
            "page_size": "Tamanho da página"
        },
        "headerFilters": {
            "default": "Filtrar coluna..."
        }
    },
  }
}

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

export function formHasEmptyField() {
  const formInputs = document.querySelectorAll('.form-container .formInput') || [];
  return Array.from(formInputs).some(input => input.value.trim().length == 0);
}

export function toggleFormContent(hideForm = true) {
  const formContainer = document.querySelector('.form-container');
  const successContainer = document.querySelector('.success-container');
  const formInputs = document.querySelectorAll('.form-container .formInput') || [];

  if(!successContainer) return;

  formInputs.forEach(input => input.value = '');

  formContainer.classList[hideForm ? 'add' : 'remove']('display-none');
  successContainer.classList[hideForm ? 'remove' : 'add']('display-none');
}

 