$(document).ready(function(){

	// Ajax setup
	$.ajaxSetup({
	    beforeSend: function(xhr) {
	        xhr.setRequestHeader("X-CSRFToken", '{{ csrf_token }}');
	    }
	});

	// Ajax test
	// This is how we will get data from our database
	$.get('/test', function(data,status) {
		alert(data);
	});

	let currentTotal = 0.00;
	
	createMenuButtons();

	function createMenuButtons(){
		let buttons = "<div class='row'>"
					+ createLgButton('Item 1', 'yellow', 'item', 4.99)
					+ createMdButton('Item 2', 'gray', 'item', 11.99)
					+ createMdButton('Item 3', 'gray', 'item', 1.99)
					+ createSmButton('Item 4', 'blue', 'item', 4.99)
					+ createSmButton('Item 5', 'blue', 'item', 5.99)
					+ createSmButton('Management', 'pink', 'management')
					+ createLgButton('Pay', 'yellow', 'transaction')
					+ createLgButton('Remove Selected', 'yellow', 'delete')
					+ createLgButton('Remove All', 'yellow', 'delete-all')
					+ "</div>";
		$(buttons).appendTo('.menu-btns');
	}

	function createLgButton(name, color, type, price = 0.0) {
		return "<div class='btn col-12 card menu-btn btn-" + color + "' data-name='" + name + "' data-type='" 
		+ type + "' " + ((price != 0) ? "data-price='" : "") + price + "'>" + name + "</div>";
	}
	function createMdButton(name, color, type, price = 0.0) {
		return "<div class='btn col-6 card menu-btn btn-" + color + "' data-name='" + name + "' data-type='" 
		+ type + "' " + ((price != 0) ? "data-price='" : "") + price + "'>" + name + "</div>";
	}
	function createSmButton(name, color, type, price = 0.0) {
		return "<div class='btn col-4 card menu-btn btn-" + color + "' data-name='" + name + "' data-type='" 
		+ type + "' " + ((price != 0) ? "data-price='" : "") + price + "'>" + name + "</div>";
	}
	function createDisplayItem(name, price) {
		return "<div class='item'><p class='row'><span class='item-name col-8'>" + name + " </span><span class='item-price col-4 text-right'>" + price + "</span></p></div>";
	}

	$('.menu-display').on('click', '.item', function() {
		if($(this).hasClass('selected')){
			$(this).removeClass('selected');
		}
		else{
			$(this).addClass('selected');
		}
	});

	$('.menu-btns').on('click','.menu-btn', function() {
		handleButtonResponse(this);
	});

	function handleButtonResponse(button) {
		switch($(button).attr('data-type'))
		{
			case 'item':
				addMenuItem(button);
				break;
			case 'delete':
				deleteDisplayItem();
				break;
			case 'delete-all':
				deleteAllDisplayItems();
				break;
			case 'management':
				console.log('Management');
				break;
			case 'transaction':
				console.log('transaction');
				break;
		}
	}

	function addMenuItem(item) {
		if($('.item').length <= 8 ){
			$(createDisplayItem($(item).attr('data-name'), $(item).attr('data-price'))).appendTo('.menu-item-container');
			addToTotal(parseFloat($(item).attr('data-price')));
		}
	}
	function deleteDisplayItem() {
		let price = 0.00;
		$('.item.selected').each(function() {
			price += parseFloat($(this).find('.item-price').text());
		});
		currentTotal -= price;
		$('.total-amt').text('$ ' + currentTotal.toFixed(2));
		$('.item.selected').remove();
	}
	function deleteAllDisplayItems() {
		currentTotal = 0.00;
		$('.total-amt').text('$ ' + currentTotal.toFixed(2));
		$('.item').remove();
	}

	function addToTotal(price) {
		currentTotal += price;
		$('.total-amt').text('$ ' + currentTotal.toFixed(2));
	}
	function removeFromTotal(price) {
		currentTotal -= price;
		$('.total-amt').text('$ ' + currentTotal.toFixed(2));
	} 
});
