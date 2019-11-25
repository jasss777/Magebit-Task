function setFocusedMail() {
    var results = document.querySelectorAll('.ic-mail, .field-text-mail');
    for (result of results) {
      result.classList.add('focused');
    }
  }
  
  function unsetFocusedMail() {
    var results = document.querySelectorAll('.ic-mail, .field-text-mail');
    for (result of results) {
      result.classList.remove('focused');
    }
  }
  
  var results = document.querySelectorAll('input[type="email"]');
  for (result of results) {
    result.addEventListener("focus", setFocusedMail);
    result.addEventListener("blur", unsetFocusedMail);
  }

  function setFocusedLock() {
    var results = document.querySelectorAll('.ic-lock, .field-text-password');
    for (result of results) {
      result.classList.add('focused');
    }
  }
  
  function unsetFocusedLock() {
    var results = document.querySelectorAll('.ic-lock, .field-text-password');
    for (result of results) {
      result.classList.remove('focused');
    }
  }
  
  var results = document.querySelectorAll('input[type="password"]');
  for (result of results) {
    result.addEventListener("focus", setFocusedLock);
    result.addEventListener("blur", unsetFocusedLock);
  }

  function setFocusedUser() {
    var results = document.querySelectorAll('.ic-user, .field-text-user');
    for (result of results) {
      result.classList.add('focused');
    }
  }
  
  function unsetFocusedUser() {
    var results = document.querySelectorAll('.ic-user, .field-text-user');
    for (result of results) {
      result.classList.remove('focused');
    }
  }
  
  var results = document.querySelectorAll('input[type="text"]');
  for (result of results) {
    result.addEventListener("focus", setFocusedUser);
    result.addEventListener("blur", unsetFocusedUser);
  }