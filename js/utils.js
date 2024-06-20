export function enableTargetControl(control) {
    if(!control?.dataset?.controlTarget) return;

    const targetSelector = control.dataset.controlTarget;
    const targetControl = document.querySelector(targetSelector);

    if(!targetControl) return;

    const classMethod = control.value.trim().length > 0 ? 'add' : 'remove'; 

    targetControl.classList[classMethod]('active-control');
}

 