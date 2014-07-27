function change_pass() {
 var objForm = document.forms['change'];
 
 if (!objForm) {
  return true;
 }
 
 var  curr_pass= objForm.elements['txtCurPass'].value;
 var new_pass = objForm.elements['txtNewPass'].value;
 var con_pass = objForm.elements['txtConPass'].value;
 
 var objCheck = {
  method:'post',
  parameters: 'txtCurPass=' + curr_pass + '&txtNewPass=' + new_pass + '&txtConPass=' + con_pass
 }
 var objRequest = new Ajax.Request('change_pass.php', objCheck);
 return false;
}