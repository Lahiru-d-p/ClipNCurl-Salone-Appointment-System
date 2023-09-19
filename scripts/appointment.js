function validateForm() {
	const name = document.forms["myForm"]["name"].value;
	const email = document.forms["myForm"]["email"].value;
	const phone = document.forms["myForm"]["phone"].value;
	const date = document.forms["myForm"]["date"].value;
	const time = document.forms["myForm"]["time"].value;
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
	
	// Email validation
	const emailFormat =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if (email == "") {
		alert("Email must be filled out");
		return false;
	}
	else if (!email.match(emailFormat)) {
		alert("Email format is invalid");
		return false;
	}
	
	// Phone number validation
	const phoneFormat = /^\d{10}$/;
	if (phone == "") {
		alert("Phone number must be filled out");
		return false;
	}
	else if (!phoneFormat.test(phone)) {
		alert("Phone number must be 10 digits");
		return false;
	}
	
	// Message validation
	if (message == "") {
		alert("Service details must be filled out");
		return false;
	}
	else if(message.length<5){
		alert("Service details cannot be less than 5 characters");
		return false;
	}
	
	
	return true;
}