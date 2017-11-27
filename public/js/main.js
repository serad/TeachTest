$(document).ready( function (){

	var url = new URL( document. URL );
	var path = url.pathname;
	var regex = /.+?\/(.*?)\//g;
	var match = regex.exec(path);
	activeNav =  match && match[1] ? match[1] : "index" ;
	$('.' + activeNav ).addClass("active");

	 $(".button-collapse").sideNav();
	 $('.datepicker').pickadate({
    		selectMonths: true, // Creates a dropdown to control month
		selectYears: 15, // Creates a dropdown of 15 years to control year,
		today: 'Today',
		clear: 'Clear',
		format: 'dd-mm-yyyy',
		formatSubmit: 'yyyy-mm-dd',
		close: 'Ok',
		closeOnSelect: true // Close upon selecting a date,
	});
	$(document).ready(function() {
    		$('select').material_select();
	});
})
