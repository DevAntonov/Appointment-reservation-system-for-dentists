
let dentist_form = document.getElementById("dentist_form");
let patient_form = document.getElementById("patient_form");
let btn_tgl = document.getElementById("btn_tgl");
let btn_change_color_dentist = document.getElementById("btn_change_color_dentist");
let btn_change_color_patient = document.getElementById("btn_change_color_patient");

//Change login form between patient and dentist
function slideToDentist(){
	dentist_form.style.left = "50px";
	patient_form.style.left = "450px";
	btn_tgl.style.left = "0px";
	btn_change_color_dentist.style.color="white";
	btn_change_color_patient.style.color="black";
}

function slideToPatient(){
	dentist_form.style.left = "-400px";
	patient_form.style.left = "50px";
	btn_tgl.style.left = "120px";
	btn_change_color_dentist.style.color="black";
	btn_change_color_patient.style.color="white";
}