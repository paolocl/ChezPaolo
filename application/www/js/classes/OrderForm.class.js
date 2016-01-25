/**
 * Created by wap26 on 22/01/16.
 */
'use strict';

var OrderForm = function()
{
    this.basketSession = loadDataFromDomStorage('cart');
}

OrderForm.prototype.run = function()
{
        $('#order-summary').on("click", '.removeFromOrder', this.deletFromCart.bind(this));

        $('#order-summary').on("click", '.minus', this.minus.bind(this));

    $('#order-summary').on("click", '.plus', this.plus.bind(this));

}

OrderForm.prototype.deletFromCart = function(event)
{
    console.log(event.currentTarget);

    var cart = loadDataFromDomStorage('cart');

    for(var i = 0; i<cart.length ; i++) {
        console.log(cart[i].mealId == event.currentTarget.getAttribute('data-id'));
        if(cart[i].mealId == event.currentTarget.getAttribute('data-id') )
        {
            cart.splice(i, 1);
        }
    }
    saveDataToDomStorage('cart', cart);

    showCart ();
}

OrderForm.prototype.minus = function()
{
    console.log(event.currentTarget);
    console.log(event.target);
    var mealId = event.target.getAttribute('data-id');

    var cart = loadDataFromDomStorage('cart');
    $.map(cart, function(value)
    {
        if(value.mealId == mealId)
        {
            value.quantite = parseInt(value.quantite)-1;
        }
    });
    saveDataToDomStorage('cart', cart);
    showCart ();
};

OrderForm.prototype.plus = function($mealId)
{
    var cart = loadDataFromDomStorage('cart');
    $.map(cart, function(value)
    {
        if(value.mealId == $mealId)
        {
            value.quantite = parseInt(value.quantite)+1;
        }
    });
    saveDataToDomStorage('cart', cart);
    showCart ();
};

OrderForm.prototype.onAjaxRefreshOrderSummary = function(basketViewHTML)
{
    $('#order-summary').html(basketViewHTML);

    var cart = loadDataFromDomStorage('cart');
    if(cart == 0)
    {
        $('#validate-order').attr('disabled', 'disabled');
    }
    else
    {
        $('#validate-order').removeAttr('disabled');
    }
}

OrderForm.prototype.refreshOrderSummary = function()
{
    var formFields = { 'basketItems' : this.basketSession }
    return $.post(getRequestUrl() + "/Basket", formFields, this.onAjaxRefreshOrderSummary.bind(this));

}




