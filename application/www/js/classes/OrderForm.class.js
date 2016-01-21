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
	var card;
	this.errors =[];
	var $paragrapheError = this.$ajouterPanier.find('p');
	this.checkOneQuantity();
	
	$paragrapheError.empty();
	
	if(this.errors.length == 0)
	{
		this.addOneQuantity();
		card  = this.getCard();
		//FAIRE FOREACH POUR AFFICHER CHACQUE OBJET DU TABLEAU
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
			fieldName : 'La quantités de ' + this.$quantity.data('name') + ' est null ou négative',
		});
	}
	$.merge(this.errors, errors);
};


OrderForm.prototype.addOneQuantity = function()
{
	var jsonEncodeOrder;
	var card = [];
	var $quantity = this.$quantity.val().trim();
	var $mealId = this.$quantity.data('id');
	var $mealName = this.$quantity.data('name');
	var order = { 
		'mealId' : $mealId,
		'mealName' : $mealName,
		'quantity' : $quantity
	};
	var checkCard = this.checkCardElement();
	
	if(checkCard != null)
	{
		card = this.getCard();
	}
	card.push(order);
	jsonEncodeOrder = JSON.stringify(card);
	sessionStorage.setItem('card', jsonEncodeOrder);
};

OrderForm.prototype.checkCardElement = function()
{
	var card = sessionStorage.getItem('card');
	if(card === null)
	{
		return jQuery.parseJSON(card);
	}
	return false;
};

OrderForm.prototype.getCard = function()
{
	return jQuery.parseJSON(sessionStorage.getItem('card'));
};


