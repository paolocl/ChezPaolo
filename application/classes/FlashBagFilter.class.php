<?php
class FlashBagFilter implements InterceptingFilter
{
	public function run(Http $http, array $queryFields, array $formFields)
	{
		return ['flashBag' => new FlashBag() ];	
	}
	
}