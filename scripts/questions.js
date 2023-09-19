function validateForm() {
	const name = document.forms["myForm"]["name"].value;
	const email = document.forms["myForm"]["email"].value;
	const message = document.forms["myForm"]["message"].value;
	
	// Name validation
	if (name == "") {
		alert("Name must be filled out correctly");
		return false;
	}
	else if(name.length<3){
		alert("Name cannot be less than 3 characters");
		return false;
	}
	
	
	// Message validation
	if (message == "") {
		alert("Message must be filled out");
		return false;
	}
	else if(message.length<10){
		alert("Message cannot be less than 10 characters");
		return false;
	}
	
	// Email validation
	const emailFormat =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (email == "") {
		alert("Email must be filled out");
		return false;
	}
	else if (!emailFormat.test(email)) {
		alert("Email format is invalid");
		return false;
	}

	return true;
}