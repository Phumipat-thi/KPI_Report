function filterfunc() {
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


// Function checkall/uncheckallBegin 
function Check(chk) {
  if (document.myform.Check_All.value == "Check All") {
    for (i = 0; i < chk.length; i++)
      chk[i].checked = true;
    document.myform.Check_All.value = "UnCheck All";
  } else {

    for (i = 0; i < chk.length; i++)
      chk[i].checked = false;
    document.myform.Check_All.value = "Check All";
  }
}

//  End 

/*
---- ศืกษาก่อนเรื่องแสดงผลตารางทั้งหมด ----

function filter(event, filterCol) {
  let element = event.target;
  let condt1 = document.getElementsByClassName(filterCol);
  for (let i = 0; i < condt1.length; i++) {
    if (condt1[i].innerHTML.toLocaleUpperCase() == element.value.toLocaleUpperCase()) {
      if (element.checked == true) {
         condt1[i].parentElement.closest('tr').style = "display:table-row"
                  
      } else {
         condt1[i].parentElement.closest('tr').style = "display:none"
      }
    }
  }
}

document.querySelectorAll('.option1').forEach(input => input.addEventListener('input', ()=>filter(event,"check1")));
 document.querySelectorAll('.option2').forEach(input => input.addEventListener('input', ()=>filter(event,"check2")));
document.querySelectorAll('.option3').forEach(input => input.addEventListener('input', ()=>filter(event,"check3")));

https://stackoverflow.com/questions/68994022/javascript-filter-table-checkbox
---- ศืกษาก่อนเรื่องแสดงผลตารางทั้งหมด ----

*/
