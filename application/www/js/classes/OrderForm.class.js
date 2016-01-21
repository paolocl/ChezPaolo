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
		this.addOneQuantity();
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
	var cart = [];
    var checkElementIncart = false;
	var $quantity = this.$quantity.val().trim();
	var $mealId = this.$quantity.data('id');
	var $mealName = this.$quantity.data('name');
	var order = { 
		'mealId' : $mealId,
		'mealName' : $mealName,
		'quantity' : $quantity
	};
	var checkcart = this.checkcartElement();
	
	if(checkcart != null)
	{
        cart = loadDataFromDomStorage('cart');
        $.map(cart, function(value)
        {
            if(value.mealId == $mealId)
            {
                value.quantity = parseInt($quantity) + parseInt(value.quantity);
                checkElementIncart = true;
            }
        });
        if(checkElementIncart == false){cart.push(order)};
    }
    else
    {
        cart.push(order);
    }

	saveDataToDomStorage('cart', cart);
};

OrderForm.prototype.checkcartElement = function()
{
	var cart = loadDataFromDomStorage('cart');
	if(cart === null)
	{
		return jQuery.parseJSON(cart);
	}
	return false;
};


