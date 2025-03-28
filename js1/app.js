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

  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const message = document.getElementById('message').value;

  const gender = document.querySelector('input[name="gender"]:checked')?.value || "Nie podano";

  const interests = Array.from(document.querySelectorAll('input[name="interests"]:checked')).map(checkbox => checkbox.value).join(", ") || "Brak zainteresowań";
  
  const resultDiv = document.getElementById('result');
  resultDiv.innerHTML = `
  <h3>Podsumowanie</h3>
  <p><strong>Imię</strong>${name}</p>
  <p><strong>Imię</strong>${email}</p>
  <p><strong>Imię</strong>${gender}</p>
  <p><strong>Imię</strong>${interests}</p>
  <p><strong>Imię</strong>${message}</p>
  `;
});
