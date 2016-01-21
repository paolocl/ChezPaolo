'use strict';

/////////////////////////////////////////////////////////////////////////////////////////
// FONCTIONS                                                                           //
/////////////////////////////////////////////////////////////////////////////////////////

function runFormValidation()
{
	var formValidator;
	//Il y a t'il un form dans ma page
	var $form = $('form[data-form]');
	if($form.length != 0)
	{
		formValidator = new FormValidator($form);
		formValidator.run();
	}
}

function dateTimePicker()
{
	//Il y a t'il un form dans ma page
	if($('form').length > 0)
	{
		$(".datepicker").datepicker();
		$('.timeResa').timepicker({
    hourText: 'Heures',
    minuteText: 'Minutes',
    timeSeparator: ':'
	});
	}
}

function runOrderForm()
{
	var orderForm;
	var $order = $('.addCart');
	
	$('.addCart').each(function(){
		orderForm = new OrderForm($(this));
		orderForm.run();
	});
}




/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////


$(function(){
	
	dateTimePicker();
	
	runFormValidation();
	
	runOrderForm();
	
	
});