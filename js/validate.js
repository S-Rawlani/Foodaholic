$(document).ready(function() {

//$('#submit').click(function(e) {
// Initializing Variables With Form Element Values
$('#name').after("<span id= 'uNamespan'></span>");
$('#password').after("<span id= 'pwdspan'></span>");
$('#email').after("<span id= 'emailspan'></span>");

$('#uNamespan').hide();
$('#pwdspan').hide();
$('#emailspan').hide();


$('#name').focus(function(){
	$('#uNamespan').show().addClass("info").text("It must contain only alphabetical or numeric characters"); 
 });

$('#password').focus(function(){
	$('#pwdspan').show().addClass("info").text("It should be at least six characters long."); 
 });

$('#email').focus(function(){
	$('#emailspan').show().addClass("info").text("It should be a valid email address (abc@def.xyz)."); 
 });

// Initializing Variables With Regular Expressions



$('#name').blur(function(){
	var uName = $('#name').val();
	var uName_regex = /^[0-9a-zA-Z]+$/;
	if (uName.length == 0) {
		$('#uNamespan').hide();
		}

	else if (!uName.match(uName_regex)) {
		$("#uNamespan").addClass("error").text("Error");
		}
	else{
		$('#uNamespan').addClass("ok").text("OK");
	}

});

$('#password').blur(function(){
		var pwd = $('#password').val();

		if (pwd.length == 0) {
			$('#pwdspan').hide();
		}
		else if (pwd.length < 6) {
			$('#pwdspan').addClass("error").text("Error");
		}
		 else{
			$('#pwdspan').addClass("ok").text("OK");
		}
});

$('#email').blur(function(){
		var email = $('#email').val();
		var email_regex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,3})$/;

		if (email.length == 0) {
			$('#emailspan').hide();
		}

		else if (!email.match(email_regex)) {
			$('#emailspan').addClass("error").text("Error");
		}
		else{
			$('#emailspan').addClass("ok").text("OK");
		}
});

});