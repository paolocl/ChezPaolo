'use strict';

var OrderForm = function($ajouterPanier)
{
	this.$ajouterPanier = $ajouterPanier;
	this.$quantity = $ajouterPanier.find('.quantity');
	this.$add = $ajouterPanier.find('.add');
	this.errors = null;
};

OrderForm.prototype.run = function()
{
	this.$add.click(this.onClickForm.bind(this));
};

OrderForm.prototype.onClickForm = function ()
{
	var cart;
	this.errors =[];
	var $paragrapheError = this.$ajouterPanier.find('p');
	this.checkOneQuantity();
	
	$paragrapheError.empty();
	
	if(this.errors.length == 0)
	{
        cart = new Cart(this.$ajouterPanier);
        cart.addOneQuantity();
	}
	else
	{
		this.errors.forEach(function(error){
			$paragrapheError.append(error.fieldName);
		});
	}
};

OrderForm.prototype.checkOneQuantity = function()
{
	var errors;
	errors = [];
	if(this.$quantity.val().trim() <= 0)
	{
		errors.push({
			fieldName : 'La quantités de ' + this.$quantity.data('name') + ' est null ou négative'
		});
	}
	$.merge(this.errors, errors);
};



