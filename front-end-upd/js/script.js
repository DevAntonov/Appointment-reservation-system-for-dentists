//Change bg-color on scroll
const header=document.getElementById('header');
window.onscroll=function(){
	let top = window.scrollY;
	if(top>=200){
		header.classList.add('active');
	}else{
		header.classList.remove('active');
	}
}

//Create scrollable effect & slide element on/off screen
let slider = document.getElementById('slider');
let active = document.getElementById('active');
let element1 = document.getElementById('element1');
let element2 = document.getElementById('element2');
let element3 = document.getElementById('element3');

element1.onclick = function(){
	slider.style.transform = 'translateX(0)';
	active.style.top = '0px';
}
element2.onclick = function(){
	slider.style.transform = 'translateX(-33%)';
	active.style.top = '100px';
}
element3.onclick = function(){
	slider.style.transform = 'translateX(-66%)';
	active.style.top = '200px';
}

//Auto slide within 2s interval
function autoSlide(){
	setTimeout(() => {slider.style.transform = 'translateX(-33%)';active.style.top = '100px';}, 2000); //wait 2s than slide; 2seconds passed
	setTimeout(() => {slider.style.transform = 'translateX(-66%)';active.style.top = '200px';}, 4000); //wait 4s than slide; 2seconds passed 2 seconds left till slide
	setTimeout(() => {slider.style.transform = 'translateX(0)';active.style.top = '0px';}, 6000); //wait 6s than slide; 4 seconds passed 2 seconds left till slide 
}

autoSlide();