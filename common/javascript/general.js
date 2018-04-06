'use strict';
$(document).ready(function () {
	$(".primarydiv").on('click', '.clickable',function() { 
		var thisFloat = parseFloat("10.1"); 
		var currValue = parseFloat($(".advance")[0].innerText);
		$(".advance")[0].innerText = currValue + thisFloat; 
    });
});


function myFunction() {
    var x = document.getElementById("navbar");
    if (x.className === "topnav max-navbar") {
        x.className += " responsive";
    } else {
        x.className = "topnav max-navbar";
    }
}