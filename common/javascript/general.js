'use strict';
$(document).ready(function () {
	$(".primarydiv").on('click', '.clickable',function() { 
		var thisFloat = parseFloat("10.1"); 
		var currValue = parseFloat($(".advance")[0].innerText);
		$(".advance")[0].innerText = currValue + thisFloat; 
	});					
});