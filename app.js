var checkboxList = document.querySelectorAll('[type=checkbox]');
var radioList = document.querySelectorAll('[type=radio]');

for (var i = 0; i < checkboxList.length; i++) {
  checkboxList[i].addEventListener('click', function(event) {
    var itemRadioList = document.querySelectorAll('[name='+event.target.value+']');
    for (var i = 0; i < itemRadioList.length; i++) {
      itemRadioList[i].disabled = !itemRadioList[i].disabled;
    }
  })
}

for (var i = 0; i < radioList.length; i++) {
  radioList[i].addEventListener('click', function(event) {
    if(event.target.value === "fix") {
      document.querySelector('[name='+event.target.name+'Text]').disabled = true;
    } else {
      document.querySelector('[name='+event.target.name+'Text]').disabled = false;
    }
  });
}
