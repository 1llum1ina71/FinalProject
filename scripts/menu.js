$(document).ready(function(){

	// Ajax setup
	$.ajaxSetup({
	    beforeSend: function(xhr) {
	        xhr.setRequestHeader("X-CSRFToken", '{{ csrf_token }}');
	    }
	});

	// Ajax test
	// This is how we will get and send data from our database
	$.get('/test', function(data,status) {
		alert(data);
	});
	$.post('/test',
		{
			id: 'This is a post test.'
		},
		function(data,status){
			alert(data);
		}
	);

	let currentTotal = 0.00;
	
	createItemButtons();
	createUtilityButtons();

	function createItemButtons(){
		let buttons = "<div class='row'>"
					+ createItemButton('Item 1', 'yellow', 'item', 4.99)
					+ createItemButton('Item 2', 'gray', 'item', 11.99)
					+ createItemButton('Item 3', 'gray', 'item', 1.99)
					+ createItemButton('Item 4', 'blue', 'item', 4.99)
					+ createItemButton('Item 5', 'blue', 'item', 5.99)
					+ createItemButton('Item 6', 'yellow', 'item', 4.99)
					+ "</div>";
		$(buttons).appendTo('.item-btns');	
	}
	function createUtilityButtons() {
		let buttons = "<div class='row'>"
					+ createUtilityButton('Management', 'pink', 'management')
					+ createUtilityButton('Pay', 'yellow', 'transaction')
					+ createUtilityButton('Remove Selected', 'yellow', 'delete')
					+ createUtilityButton('Remove All', 'yellow', 'delete-all')
					+ "</div>";
		$(buttons).appendTo('.utility-btns');
	}

	function createItemButton(name, color, type, price = 0.0) {
		return "<div class='menu-btn-container col-6 p-0'><div class='card btn menu-btn btn-" + color + "' data-name='" + name + "' data-type='" 
		+ type + "' " + ((price != 0) ? "data-price='" : "") + price + "'>" + name + "</div>" + addModal("test") + "</div>";
	}
	function createUtilityButton(name, color, type, price = 0.0) {
		return "<div class='btn col-12 col-lg-6 col-xl-3 card menu-btn btn-" + color + "' data-name='" + name + "' data-type='" 
		+ type + "' " + ((price != 0) ? "data-price='" : "") + price + "'>" + name + "</div>";
	}
	function createDisplayItem(name, price) {
		return "<div class='item'><p class='row'><span class='item-name col-8'>" + name + " </span><span class='item-price col-4 text-right'>" + price + "</span></p></div>";
	}
	function addModal(info) {
		let modal = "<div class='modal fade show' style='display:none;'><div class='modal-dialog'>"
				+ "<div class='modal-content'><div class='modal-header border-bottom-0 row'>"
				+ "<div class='col-8'><h4>Title</h4></div><div class='col-4 text-right'>"
				+ "</div></div><div class='modal-body'><ul>"
				+ "<li>Item List</li>"
				+ "</ul></div><div class='modal-footer border-top-0'>"
				+ "<a href='javascript:void(0);' class='btn btn-primary add-btn'>Add</a><a href='javascript:void(0);' class='btn btn-danger modal-close'>Cancel</a></div></div></div></div>";
		return modal;
	}

	$('.menu-display').on('click', '.item', function() {
		if($(this).hasClass('selected')){
			$(this).removeClass('selected');
		}
		else{
			$(this).addClass('selected');
		}
	});

	$('.item-btns').on('click', '.modal-close', function() {
		$('.modal').hide();
	});
	$('.item-btns').on('click', '.add-btn', function() {
		addDisplayItem($(this).closest('.menu-btn-container').find('.menu-btn'));
		$('.modal').hide();
	});

	$('.item-btns').on('click','.menu-btn', function() {
		handleButtonResponse(this);
	});

	$('.utility-btns').on('click','.menu-btn', function() {
		handleButtonResponse(this);
	});

	function handleButtonResponse(button) {
		switch($(button).attr('data-type'))
		{
			case 'item':
				openItemDisplay(button);
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

	function openItemDisplay(button) {
		$(button).closest('.menu-btn-container').find('.modal').css('display', 'block');
	}

	function addDisplayItem(item) {
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
