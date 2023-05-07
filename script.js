let weightInput = document.getElementById('weightInput'),
  heightInput = document.getElementById('heightInput'),
  calculateBtn = document.getElementById('calculateBtn'),
  result = document.getElementById('result');
function bmiCalculate(e) {
  e.preventDefault();
  let t = parseFloat(weightInput.value),
    l = parseFloat(heightInput.value);
  if (isNaN(t) || isNaN(l)) result.innerHTML = 'Please enter weight & height';
  else {
    let n = t / ((l /= 100) * l);
    (result.innerHTML = `Your BMI is: <span>${n.toFixed(2)}</span>`),
      (weightInput.value = ''),
      (heightInput.value = '');
  }
}
calculateBtn.addEventListener('click', bmiCalculate);
