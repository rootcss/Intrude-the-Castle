function validate(form) {
	for(var i=0;i<form.elements.length;i++) {
		if(form.elements[i].value=="") {
			document.getElementById("message").innerHTML="Please enter all fields.";
			return false;
		}
	}
	if(form.pwd1.value != form.pwd2.value) {
			document.getElementById("message").innerHTML="Passwords do not match.";
			return false;
		}
	//put email validator
	else
	if(form.regno.value.length != 10) {
		document.getElementById("message").innerHTML="Incorrect Register no.";
		return false;
	}
	else
	{	//alert(1);
		return true;	
	}
}
