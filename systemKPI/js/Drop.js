function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}


mobiscroll.setOptions({
  locale: mobiscroll.localeTh,  // Specify language like: locale: mobiscroll.localePl or omit setting to use default
  theme: 'ios',                 // Specify theme like: theme: 'ios' or omit setting to use default
  themeVariant: 'light'         // More info about themeVariant: https://docs.mobiscroll.com/5-19-2/javascript/range#opt-themeVariant
});

var now = new Date(),
  week = new Date(now.getFullYear(), now.getMonth(), now.getDate() + 6);

mobiscroll.datepicker('#demo-mobile-picker-input', {
  controls: ['calendar'],       // More info about controls: https://docs.mobiscroll.com/5-19-2/javascript/range#opt-controls
  select: 'range',              // More info about select: https://docs.mobiscroll.com/5-19-2/javascript/range#methods-select
  showRangeLabels: true
});

var instance = mobiscroll.datepicker('#demo-mobile-picker-button', {
  controls: ['calendar'],       // More info about controls: https://docs.mobiscroll.com/5-19-2/javascript/range#opt-controls
  select: 'range',              // More info about select: https://docs.mobiscroll.com/5-19-2/javascript/range#methods-select
  showRangeLabels: true,
  showOnClick: false,           // More info about showOnClick: https://docs.mobiscroll.com/5-19-2/javascript/range#opt-showOnClick
  showOnFocus: false,           // More info about showOnFocus: https://docs.mobiscroll.com/5-19-2/javascript/range#opt-showOnFocus
});

instance.setVal([now, week]);

mobiscroll.datepicker('#demo-mobile-picker-mobiscroll', {
  controls: ['calendar'],       // More info about controls: https://docs.mobiscroll.com/5-19-2/javascript/range#opt-controls
  select: 'range',              // More info about select: https://docs.mobiscroll.com/5-19-2/javascript/range#methods-select
  showRangeLabels: true
});

var inlineInst = mobiscroll.datepicker('#demo-mobile-picker-inline', {
  controls: ['calendar'],       // More info about controls: https://docs.mobiscroll.com/5-19-2/javascript/range#opt-controls
  select: 'range',              // More info about select: https://docs.mobiscroll.com/5-19-2/javascript/range#methods-select
  showRangeLabels: true,
  display: 'inline',            // Specify display mode like: display: 'bottom' or omit setting to use default
});

inlineInst.setVal([now, week]);

document
  .getElementById('show-mobile-date-picker')
  .addEventListener('click', function () {
    instance.open();
    return false;
  });