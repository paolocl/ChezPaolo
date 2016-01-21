/**
 * Created by Paolo on 21/01/16.
 */
'use strict';
var OrderForm2 = function()
{
    this.$form = $('#Orderform');
    this.$meal = $('#meal');
    this.$mealDetails = $('#meal-details');
};

OrderForm2.prototype.run = function()
{
    this.$meal.on("change", this.onChangeMeal.bind(this));
};

OrderForm2.prototype.onChangeMeal = function()
{
    var mealId = this.$meal.val();
    //console.log(mealId);
    $.getJSON(
        getRequestUrl() + '/Meal/Mealdata?id=' + mealId,
        this.onAjaxChange.bind(this)
    );
};

OrderForm2.prototype.onAjaxChange = function(mealDetail)
{
    //console.log(data);
    this.$mealDetails.find('img').attr('src', getWwwUrl() + '/images/meals/' + mealDetail.Photo );
    this.$mealDetails.find('p').text(mealDetail.Description);
    this.$mealDetails.find('span strong').text(mealDetail.SalePrice);
};