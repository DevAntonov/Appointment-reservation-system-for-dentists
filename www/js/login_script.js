let dentistElement = document.getElementById("login_dentist");
let patientElement = document.getElementById("login_patient");
let buttonToggleElement = document.getElementById("btn_tgl");
let dentistBtn = document.getElementById("set_to_black_js");
let patientBtn = document.getElementById("set_to_black");

function dentist_login_f(){
	dentistElement.style.left = "50px";
	patientElement.style.left = "450px";
	buttonToggleElement.style.left = "0px";
	dentistBtn.style.color="white";
	patientBtn.style.color="black";
}

function patient_login_f(){
	dentistElement.style.left = "-400px";
	patientElement.style.left = "50px";
	buttonToggleElement.style.left = "120px";
	dentistBtn.style.color="black";
	patientBtn.style.color="white";
}