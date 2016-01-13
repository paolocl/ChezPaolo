<?php
class DateModel
{
	public function testDate($value)
 {
  return preg_match( '/[0-3]{1}\d{1}\/[0-1]{1}\d{1}\/20\d{2}/' , $value );
 }
	
}
	