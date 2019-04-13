$.ajaxSetup({
    beforeSend: function(xhr) {
        xhr.setRequestHeader("X-CSRFToken", '{{ csrf_token }}');
    }
});

$.get('/test', function(data,status) {
	console.log(data);
});