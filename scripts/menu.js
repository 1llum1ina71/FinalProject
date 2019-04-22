$(document).ready(function(){

	// Ajax setup
	$.ajaxSetup({
	    beforeSend: function(xhr) {
	        xhr.setRequestHeader("X-CSRFToken", '{{ csrf_token }}');
	    }
	});

	let currentTotal = 0.00;
	let itemList = [];
	
	createUtilityButtons();

	// Item buttons
	$.post('/menuController', 
		{
			action: 'getFoodItems'
		},
		function(data,status) {
			let buttons = "<div class='row'>"
			jQuery.each( JSON.parse(data), function(index, item) {
				buttons += createItemButton(item);
			});
			buttons += "</div>";
			$(buttons).appendTo('.item-btns');
		}
	);

	function createUtilityButtons() {
		let buttons = "<div class='row'>"
					+ createUtilityButton('Management', 'pink', 'management')
					+ createUtilityButton('Pay', 'yellow', 'transaction')
					+ createUtilityButton('Remove Selected', 'yellow', 'delete')
					+ createUtilityButton('Remove All', 'yellow', 'delete-all')
					+ "</div>";
		$(buttons).appendTo('.utility-btns');
	}

	function createItemButton(item) {
		return "<div class='menu-btn-container col-6 p-0'><div class='card btn menu-btn' data-name='" + item.name + "' data-price='" + item.price + "' data-type='item' data-id='" + item.id + "'>" + item.name + "</div>" + addModal(item) + "</div>";
	}
	function createUtilityButton(name, color, type, price = 0.0) {
		return "<div class='btn col-12 col-lg-6 card menu-btn btn-" + color + "' data-name='" + name + "' data-type='" 
		+ type + "' " + ((price != 0) ? "data-price='" : "") + price + "'>" + name + "</div>";
	}
	function createDisplayItem(name, price, id) {
		return "<div class='item' data-id=" + id + "><p class='row'><span class='item-name col-8'>" + name + " </span><span class='item-price col-4 text-right'>" + price + "</span></p></div>";
	}
	function addModal(item) {
		let ingredients = "";
		jQuery.each(item.make_up, function(index, ingredient) {
			ingredients += "<li>" + ingredient + "</li>";
		});

		let modal = "<div class='modal fade show' style='display:none;'><div class='modal-dialog'>"
				+ "<div class='modal-content'><div class='modal-header border-bottom-0 row'>"
				+ "<div class='col-8'><h4>" + item.name + "</h4></div><div class='col-4 text-right'>"
				+ "</div></div><div class='modal-body'><ul>"
				+ ingredients
				+ "</ul></div><div class='modal-footer border-top-0'>"
				+ "<a href='javascript:void(0);' class='btn btn-primary add-btn' data-id='" + item.id + "'>Add</a><a href='javascript:void(0);' class='btn btn-danger modal-close'>Cancel</a></div></div></div></div>";
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
		// Add to itemList
		itemList.push($(this).attr('data-id'));
		addDisplayItem($(this).closest('.menu-btn-container').find('.menu-btn'));
		$('.modal').hide();
	});
	$('.item-btns').on('click','.menu-btn', function() {
		openItemDisplay(this);
	});

	$('.utility-btns').on('click','.menu-btn', function() {
		switch($(this).attr('data-type'))
		{
			case 'delete':
				deleteDisplayItem();
				break;
			case 'delete-all':
				deleteAllDisplayItems();
				break;
			case 'management':
				goToManagement();
				break;
			case 'transaction':
				payForOrder();
				break;
		}
	});

	function openItemDisplay(button) {
		$(button).closest('.menu-btn-container').find('.modal').css('display', 'block');
	}
	function addDisplayItem(item) {
		if($('.item').length <= 8 ){
			$(createDisplayItem($(item).attr('data-name'), $(item).attr('data-price'), $(item).attr('data-id'))).appendTo('.menu-item-container');
			addToTotal(parseFloat($(item).attr('data-price')));
		}
	}
	function deleteDisplayItem() {
		// Remove from listItems
		let price = 0.00;
		$('.item.selected').each(function() {
			price += parseFloat($(this).find('.item-price').text());
			itemList.splice(itemList.indexOf($(this).attr('data-id')), 1);;
		});
		currentTotal -= price;
		$('.total-amt').text('$ ' + currentTotal.toFixed(2));
		$('.item.selected').remove();
	}
	function deleteAllDisplayItems() {
		itemList = [];
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

	// Check if user is a manager
	function checkIfManager() {
		return true;
	}
	function goToManagement() {
		if(checkIfManager()) {
			$('.navigation').submit();	
		}
		else{
			alert('Only a manager can access the management panel.');
		}
	}
	
	function payForOrder() {
		// Display Payment screen
		// Maybe

		// Submit order list
		$.post('/menuController', 
			{
				action: "payForOrder",
				orderList: itemList
			},
			function(data, status){
				alert('Paid');
				deleteAllDisplayItems();
			}
		);
	}
});
