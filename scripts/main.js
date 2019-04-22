$(document).ready(function() {

	$.ajaxSetup({
	    beforeSend: function(xhr) {
	        xhr.setRequestHeader("X-CSRFToken", '{{ csrf_token }}');
	    }
	});

	$('.logout-btn').on('click', function() {
		let id = $(this).attr('data-id');
		$.post('/loginController',
			{
				action: 'logoutUser',
				id: id
			},
			function(data,status){
				console.log('User logged out.');
				window.location = '/login';
			}
		);
	});
});