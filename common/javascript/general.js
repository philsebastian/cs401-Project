'use strict';
$(document).ready(function () {
	$(".primarydiv").on('click', '.clickable',function() { 
		var thisFloat = parseFloat("10.1"); 
		var currValue = parseFloat($(".advance")[0].innerText);
		$(".advance")[0].innerText = currValue + thisFloat; 
    });

    $("input.confirm").keyup(checkPasswordMatch);
});


function checkPasswordMatch()
{
    var password = $("input[name='password']").val();
    var confpassword = $("input[name='confpassword']").val();

    var regex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

    if (regex.test(password)) {
        $("input[name='confpassword']").removeAttr("disabled");

        if (password != confpassword && password != "") {
            $("#passwordHelp").removeClass("alert-danger");
            $("#passwordHelp").addClass("alert-success");
            
            $('.match').addClass("glyphicon-remove");
            $('.match').removeClass("glyphicon-ok");
        } else {
            $('.match').addClass("glyphicon-ok");
            $('.match').removeClass("glyphicon-remove");
        }
    } else {
        $('.match').removeClass("glyphicon-ok");
        $('.match').removeClass("glyphicon-remove");
        $("input[name='confpassword']").attr("disabled", "disabled");
        $("#passwordHelp").removeClass("alert-success");
        $("#passwordHelp").addClass("alert-danger");
    }
}

function myFunction() {
    var x = document.getElementById("navbar");
    if (x.className === "topnav max-navbar") {
        x.className += " responsive";
    } else {
        x.className = "topnav max-navbar";
    }
}