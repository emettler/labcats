function verifyPasswords() {
	//alert("verify");
	var p = document.forms.NewUser.Password.value;
	var cp = document.forms.NewUser.ConfirmPassword.value;
	//alert(p);
	//return false;

if (p == cp) {
	//alert("match");
  return true;
}else
  alert("Your passwords don't match, please try again!");
  return false;
}