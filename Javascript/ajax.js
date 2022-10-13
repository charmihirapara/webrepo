function myAjaxFunc()
{
	const xhttp = new XMLHttpRequest();
	xhttp.open('GET', 'ajaxtext.php');
	xhttp.send();
	xhttp.onload = function()
	{
		document.getElementById("demo").innerHTML = this.responseText;
	}
}