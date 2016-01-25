'use strict';

var Order = function($ajouterPanier)
{
	this.$ajouterPanier = $ajouterPanier;
	this.$quantite = $ajouterPanier.find('.quantite');
	this.errors = null;
};

Order.prototype.run = function()
{
	this.$ajouterPanier.click(this.onClickForm.bind(this));
};

Order.prototype.onClickForm = function ()
{
	var cart;
	this.errors =[];
	var $paragrapheError = this.$ajouterPanier.find('p');
	this.checkOnequantite();
	
	$paragrapheError.empty();
	
	if(this.errors.length == 0)
	{
        cart = new Cart(this.$ajouterPanier);
        cart.addOnequantite();
        showCart ();
    }
	else
	{
		this.errors.forEach(function(error){
			$paragrapheError.append(error.fieldName);
		});
	}
};

Order.prototype.checkOnequantite = function()
{
	var errors;
	errors = [];
	if(this.$quantite.val().trim() <= 0)
	{
		errors.push({
			fieldName : 'La quantités de ' + this.$quantite.data('name') + ' est null ou négative'
		});
	}
	$.merge(this.errors, errors);
};



