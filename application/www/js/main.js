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

function runOrder()
{
	var order;
	
	$('.addCart').each(function(){
		order = new Order($(this));
		order.run();
	});

}

function showCart ()
{
    if(typeof OrderForm != 'undefined')
    {
        var orderForm = new OrderForm();

        orderForm.refreshOrderSummary();

        orderForm.run();
    }
}

function runOrderForm(){
    if(typeof OrderForm != 'undefined')
    {
        var result = $('[data-order-step]').data('order-step');
        console.log(result);

        var orderForm = new OrderForm();

        switch (result) {

            case "success" :
                orderForm.success('cart');
                break;
            case "run" :
                orderForm.refreshOrderSummary();

                orderForm.run();
                break;
        }
    }
}






/////////////////////////////////////////////////////////////////////////////////////////
// CODE PRINCIPAL                                                                      //
/////////////////////////////////////////////////////////////////////////////////////////


$(function(){

	dateTimePicker();

	runFormValidation();

	runOrder();

    showCart ();

    runOrderForm();
	
});