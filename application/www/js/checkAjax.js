$(document).ready(function(){
	$('#dateResa').change(function(event){
		var resaDate = $(this).val();
		event.preventDefault();
		$.ajax({
			url : 'Booking/Bookingcheck',
			type : 'POST',
			data_type : 'json',
			data : {
				'resaDate' : resaDate,
			},
			success : function(data){
				console.log(data);
				console.log(data = jQuery.parseJSON(data));
				console.log(jQuery.type(data));
				console.log(data["count"]);
				if(data["count"] == 1)
				{
					$('#submitBooking').css('display', 'none');
					$('#errorAjax').html('<p id=\'errorBooking\'>Vous avez déja réservé à cette date</p>');
				}
				else if(data["count"] == 0)
				{
					$('#submitBooking').css('display', 'inline-block');
					$('#errorBooking').remove();
					$('#errorAjax').empty();
				}
			}
		})
	})
})