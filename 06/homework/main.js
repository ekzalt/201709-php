const hide = e => {
  if (e.target.closest('.file')) {
    return;

  } else if (e.target.closest('.dir')) {
    e.target.closest('.dir').nextElementSibling.classList.toggle('none');

  } else {
    return;
  }
};

document.addEventListener('click', hide);