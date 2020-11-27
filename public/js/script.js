function hamburger(){
	let menu_burger=document.querySelector("#menu_burger");
	let croix_burger=document.querySelector("#croix_burger");
	let nav=document.querySelector("nav");

  menu_burger.addEventListener('click',()=>{

		if(menu_burger){
		  	menu_burger.style.display="none";
		  	croix_burger.style.display="block";
		  	nav.style.display="block";
		}
	});
 	croix_burger.addEventListener('click',()=>{
		if(croix_burger){
		  	croix_burger.style.display="none";
		  	menu_burger.style.display="block";
		  	nav.style.display="none";
		}
	});
};
hamburger();