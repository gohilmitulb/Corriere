const wparcel = document.getElementById('packagetype');
const showwparcel = document.getElementById('what_parcel');
const required_wparcel = document.getElementById('parcelname');
const enterorder = document.querySelector('.enterorder');

wparcel.addEventListener('change', function () {
  if (wparcel.value === 'Apparel & accessories') {
    showwparcel.style.display = 'block';
  }
  else if (wparcel.value === 'Baby care') {
    showwparcel.style.display = 'block';
  }
  else if (wparcel.value === 'Books & Stationary') {
    showwparcel.style.display = 'block';
  }
  else if (wparcel.value === 'Electronics') {
    showwparcel.style.display = 'block';
  }
  else if (wparcel.value === 'Sports Equipmemts') {
    showwparcel.style.display = 'block';
  }
  else if (wparcel.value === 'Documents') {
    showwparcel.style.display = 'none';
  }
});



const train_radio_yes = document.getElementById('yes');
const train_radio_no = document.getElementById('no');
const receiver_detail_section = document.getElementById('enterdrop');
const show_train_section = document.getElementById('entertrain');
const receiver_inputs = document.querySelectorAll('#enterdrop input');
const train_inputs = document.querySelectorAll('#entertrain input');

train_radio_yes.addEventListener('change', function () {
  if (train_radio_yes.checked) {
    receiver_detail_section.style.display = 'none';
    show_train_section.style.display = 'block';
  }
});

train_radio_no.addEventListener('change', function () {
  if (train_radio_no.checked) {
    receiver_detail_section.style.display = 'block';
    show_train_section.style.display = 'none';
  }
});

const trainRadio = document.querySelector('#trainradio');
const trainInputs = document.querySelectorAll('.train');
const receiverInputs = document.querySelectorAll('.receiver');

function handleTrainRadio() {
  if (document.querySelector('#yes').checked) {
    trainInputs.forEach(input => {
      input.disabled = false;
      input.required = true;
    });
    receiverInputs.forEach(input => {
      input.disabled = true;
      input.required = false;
    });
  } else if (document.querySelector('#no').checked) {
    trainInputs.forEach(input => {
      input.disabled = true;
      input.required = false;
    });
    receiverInputs.forEach(input => {
      input.disabled = false;
      input.required = true;
    });
  } else {
    trainInputs.forEach(input => {
      input.disabled = true;
      input.required = false;
    });
    receiverInputs.forEach(input => {
      input.disabled = true;
      input.required = false;
    });
  }
}
trainRadio.addEventListener('change', handleTrainRadio);

document.getElementById('delivery-speed').addEventListener('change', function() {
  var deliveryType = document.getElementById('delivery-speed').value;
  localStorage.setItem('deliveryType', deliveryType);
});

function calculateprice() {
  var deliveryType = document.getElementById('delivery-speed').selectedIndex;
  var deliveryTypes = document.getElementById('delivery-speed').options;
  var weight = document.getElementById('weight').value;
  var price = 0;

  if (deliveryTypes[deliveryType].value == 'sameday') {
    if (weight <= 2) {
      price = 40;
    } else if (weight <= 5) {
      price = 50;
    } else if (weight <= 10) {
      price = 60;
    }
  } else if (deliveryTypes[deliveryType].value == 'standard') {
    if (weight <= 2) {
      price = 30;
    } else if (weight <= 5) {
      price = 40;
    } else if (weight <= 10) {
      price = 50;
    }
  } else if (deliveryTypes[deliveryType].value == 'nextday') {
    if (weight <= 2) {
      price = 30;
    } else if (weight <= 5) {
      price = 40;
    } else if (weight <= 10) {
      price = 50;
    }
  } else if (deliveryTypes[deliveryType].value == 'rush') {
    if (weight <= 2) {
      price = 100;
    } else if (weight <= 5) {
      price = 125;
    } else if (weight <= 10) {
      price = 150;
    }
  }
  document.getElementById('calcharge').innerHTML = '<div class="text-center">Total price: ' + price + '₹</div>';
  localStorage.setItem('price', price);
}

