// let result = document.getElementById("result");

// if (!localStorage.getItem("tekstwyswietlony") !== "true") {
//   result.textContent = "Dzień Dobry";
//   localStorage.setItem("tekstwyswietlony", "true");
// }

// document.getElementById("contactForm").addEventListener("submit", function(event){
//   event.preventDefault();
//   result.textContent="Dziekujemy za przesłanie formularza";
// });

document.getElementById("contactForm").addEventListener("submit", function(event){
  event.preventDefault();

  const name = document.getElementById('name').value.trim();
  const email = document.getElementById('email').value.trim();
  const phone = document.getElementById('phone').value.trim();
  const age = document.getElementById('age').value.trim();
  const message = document.getElementById('message').value.trim();

  const gender = document.querySelector('input[name="gender"]:checked')?.value || "Nie podano";

  const interests = Array.from(document.querySelectorAll('input[name="interests"]:checked')).map(checkbox => checkbox.value).join(", ") || "Brak zainteresowań";
  
  clearErrors();


  let isValid = true;

  if(name.length < 2) {
      displayError('name', 'Imię musi mieć co najnmiej 2 znaki');
      isValid = false;
  }

  if(message.length < 5) {
    displayError('message', 'Wiadmość musi mieć co najnmiej 5 znaków');
    isValid = false;
  }

  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if(!emailPattern.test(email)) {
  displayError('email', 'Podaj poprawny adres e-mail');
  isValid = false;
  }

  const phonePattern = /^\d{9}$/;
  if(!phonePattern.test(phone)){
    displayError('phone',"Numer telefonu musi mieć dokładnie 9 cyfr");
    isValid = false;
  }

  if(age < 18 || age > 120) {
    displayError('age', "Wiek musi być między 18 a 120 lat");
    isValid = false;
  }  

  if(isValid){
    const resultDiv = document.getElementById('result');
    resultDiv.innerHTML = `
    <h3>Podsumowanie</h3>
    <p><strong>Imię: </strong>${name}</p>
    <p><strong>Email: </strong>${email}</p>
    <p><strong>Numer telefonu: </strong>${phone}</p>
    <p><strong>Numer Wiek: </strong>${age}</p>
    <p><strong>Płeć: </strong>${gender}</p>
    <p><strong>Zainteresowania: </strong>${interests}</p>
    <p><strong>Wiadomość: </strong>${message}</p>
    `;
  } 
});

function displayError(fieldId, message){
  const field = document.getElementById(fieldId);
  const errorDiv = document.createElement('div');
  errorDiv.className = 'error-message';
  errorDiv.textContent = message;
  errorDiv.style.color = 'red';
  field.parentNode.insertBefore(errorDiv, field.nextSibling);
}

function clearErrors(){
  const errors = document.getElementsByClassName('error-message');
  while(errors.length > 0){
      errors[0].parentNode.removeChild(errors[0]);
  }
}