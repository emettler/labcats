<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="pop.css">
	</head>
	<body>
		<script>
			// popup allowed
			function popWindow(url){
						popW = window.open(url,'popW, height=400, width=200, resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes');
			};
// Popup window code
function newPopup(url, h, w, l, t) {
	popupWindow = window.open(url,'popUpWindow','height='+h+',width='+w+',left='+l+',top='+t+',resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
// When the user clicks on <div>, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
<h1>All About Popups</h1>
<p>Let's try some examples</p>
<div class="popup" onclick="myFunction()">Click me!</div>
  <span class="popuptext" id="myPopup">Popup text...</span>
	<p><a href="JavaScript:popWindow('cats.php');">Simple Pop</a>
	</p>
<p><a href="JavaScript:newPopup('login.php', 300, 500, 200, 300);">Login</a></p>

	</body>
</html>

