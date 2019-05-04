$(document).ready(function() {
	let user;

	// Handle cookies
	if(getCookie() == 0 || getCookie() == "undefined") {
		setCookie();
	}
	// Set id with cookie
	$('.user').val(getCookie());
	
	if($('.user').val() == "undefined" || $('.user').val().length == 0) {
		window.location.href = "/login";
	}

	$.ajaxSetup({
	    beforeSend: function(xhr) {
	        xhr.setRequestHeader("X-CSRFToken", '{{ csrf_token }}');
	    }
	});

	$.post('/userController', 
		{
			action: 'getUserInfo',
			id: $('.user').val()
		},
		function (data, status) {
			user = JSON.parse(data);
			jQuery.each( user, function(index, x) {
				$('.nav-user').text(x.firstName + " " + x.lastName);
			});	
		}
	);

	$('.logout-btn').on('click', function() {
		$.post('/loginController', {
			action: "logoutUser",
			id: $('.user').val()
		},
		function(data, status) {
			removeCookie();
			window.location.href="/login";
		});
	});

	function getCookie() {
		let name = "employeeId=";
		let decodedCookie = decodeURIComponent(document.cookie);
		let ca = decodedCookie.split(';');
		for(let i = 0; i < ca.length; i++) {
			let c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return 0;
	}

	function setCookie() {
		document.cookie = "employeeId="+$('.user').val();
	}

	function removeCookie() {
		document.cookie = "employeeId=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
	}


});