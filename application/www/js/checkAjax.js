$(document).ready(function(){
	$('#dateResa').change(function(){
		var resaDate = $(this).val();
		$.ajax({
			url : 'Booking/Bookingcheck',
			type : 'POST',
			data_type : 'json',
			data : 'Customer_Id='+1+'&resaDate='+resaDate,
			success : function(data){
				console.log(data);
			}
		})
	})
})