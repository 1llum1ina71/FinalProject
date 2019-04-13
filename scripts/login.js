$(document).ready( function() {

	createKeypad();

	$('.key-button').on('click', function() {
		if($('.keypad-display').text().length == 0){
			$('.keypad-display').append( "<h3></h3>" );
		}
		if($('.keypad-display').text().length < 4){
			$('.keypad-display h3').append( $(this).attr('data-value') );
		}
	});

	$('.key-button.enter').on('click', function() {
		console.log($('.keypad-display h3').text());
		if($('.keypad-display h3').text().length < 4){
			alert('Passcode must be 4 digits long.');
		}
		else {
			$('.keypad-display').text('');
		}
	});

	$('.key-button.clear').on('click', function() {
		$('.keypad-display').text('');
	});

	function createKeypad(){
		let keypadContent = "<div class='row'>"
			+ getButtons()
			+ "</div>";
		$(keypadContent).appendTo('.keypad');
	}

	function getButtons() {
		let buttons = "";

		for(let x = 1; x<=9; x++){
			buttons += "<div class='col-4 key-button-container'>"
					+  "<a href='javascript:void(0);' class='btn btn-primary key-button col-sm-12' data-value='" + x + "'>"
					+  x
					+  "</a>"
					+  "</div>";
		}

		buttons += "<div class='col-4 key-button-container'>"
					+  "<a href='javascript:void(0);' class='btn btn-primary key-button clear col-sm-12'>"
					+  "Clear"
					+  "</a>"
					+  "</div>";

		buttons += "<div class='col-4 key-button-container'>"
					+  "<a href='javascript:void(0);' class='btn btn-primary key-button col-sm-12' data-value='0'>"
					+  "0"
					+  "</a>"
					+  "</div>";

		buttons += "<div class='col-4 key-button-container'>"
					+  "<a href='javascript:void(0);' class='btn btn-primary key-button enter col-sm-12' data-value=''>"
					+  "Enter"
					+  "</a>"
					+  "</div>";

		return buttons;
	}
});