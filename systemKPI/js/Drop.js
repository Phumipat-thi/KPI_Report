function toggle(source) {
  checkboxes = document.getElementsByName('typeP[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.unchecked;
  }
}
function checkAll() {
  checkboxes = document.getElementsByName('typeP[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = true;
  }
}

