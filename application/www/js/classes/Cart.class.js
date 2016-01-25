/**
 * Created by wap26 on 21/01/16.
 */
'use strict';

var Cart = function($ajouterPanier)
{
    this.$ajouterPanier = $ajouterPanier;
    this.$quantite = $ajouterPanier.find('.quantite');
};

Cart.prototype.addOnequantite = function()
{
    var cart = [];
    var checkElementIncart = false;
    var $quantite = this.$quantite.val().trim();
    var $mealId = this.$quantite.data('id');
    var $mealName = this.$quantite.data('name');
    var $price = this.$quantite.data('price');
    var order = {
        'mealId' : $mealId,
        'mealName' : $mealName,
        'price' : $price,
        'quantite' : $quantite
    };
    var checkcart = this.checkCartElement();

    if(checkcart != null)
    {
        cart = loadDataFromDomStorage('cart');
        $.map(cart, function(value)
        {
            if(value.mealId == $mealId)
            {
                value.quantite = parseInt($quantite) + parseInt(value.quantite);
                checkElementIncart = true;
            }
        });
        if(checkElementIncart == false){cart.push(order)}
    }
    else
    {
        cart.push(order);
    }

    saveDataToDomStorage('cart', cart);
};

Cart.prototype.checkCartElement = function()
{
    return loadDataFromDomStorage('cart');
};
//
