'use strict';

var FormValidator = function($form)
{
	this.$form = $form;
	this.$errorMessage = $form.find('.error-message');
	this.$totalErrorCount = $form.find('.total-error-count');
	this.totalErrors = null;
	this.Phone = $form.find('input[name=Phone]');
	this.ZipCode = $form.find('input[name=ZipCode]');
}

FormValidator.prototype.run = function()
{
	//Installation gestionnaire d'évément sur la soumission d'un formulaire
	this.$form.on( 'submit', this.onSubmitForm.bind(this)); 
}

FormValidator.prototype.onSubmitForm = function(event)
{
	//console.log('test');
	this.totalErrors = new Array();
	var $errorList = $('.error-message').children('p');
	this.checkRequiredField();
	this.checkMinimumLength();
	this.checkDataTypes();
	
	$errorList.empty();
	
	
	if(this.totalErrors.length > 0)
	{
		this.$totalErrorCount.text(this.totalErrors.length);
		
		
		this.totalErrors.forEach(function(error){
			var	message = 'Le champ <strong><em>' + error.fieldName + '</em></strong> ' + error.Message + '.<br>';	
			$errorList.append(message);
		});
		event.preventDefault();
		
		$('.error-message').fadeIn('slow');
	}
}

FormValidator.prototype.checkRequiredField = function()
{
	var errors;
	errors = [];
	this.$form.find('[data-required]').each(function(){
		
		if($(this).val().trim() == 0)
		{
			errors.push({ 
				fieldName : $(this).data('name'),
				Message : 'est requit',
			});
		}
		
	});
	$.merge(this.totalErrors, errors);
}

FormValidator.prototype.checkMinimumLength = function ()
{
	var errors = [];
	//console.log($field);
	//console.log($field.data('name'));
	//console.log($field.val());
	this.$form.find("[data-length]").each(function(){
		if($(this).data('length') > $(this).val().length)
		{
				errors.push({
					fieldName : $(this).data('name'),
					Message : "doit faire au moines " + $(this).data('length') + " caractère(s)",
				});
		}
		
	});
		$.merge(this.totalErrors, errors);
}


FormValidator.prototype.checkDataTypes = function()
{
	var errors = [];
	this.$form.find("[data-type]").each(function(){
		console.log($(this));
		if($(this).data('type') === 'number' )
		{
			if($.isNumeric($(this).val()) === false)
			{
				errors.push({
					fieldName : $(this).data('name'),
					Message : "doit être un nombre",
				});
			}
		}
		
	});
	$.merge(this.totalErrors, errors);
}


