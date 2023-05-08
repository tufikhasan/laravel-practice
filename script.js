let weightInput = document.getElementById('weightInput');
let heightInput = document.getElementById('heightInput');
let calculateBtn = document.getElementById('calculateBtn');
let result = document.getElementById('result');

function bmiCalculate(e) {
  e.preventDefault();
  let weight = parseFloat(weightInput.value);
  let height = parseFloat(heightInput.value);
  if (isNaN(weight) || isNaN(height)) {
    result.innerHTML = 'Please enter weight & height';
  } else {
    let bmi = weight / (height * height);
    result.innerHTML = `Your BMI is: <span>${bmi.toFixed(2)}</span>`;
    weightInput.value = '';
    heightInput.value = '';
  }
}
calculateBtn.addEventListener('click', bmiCalculate);
