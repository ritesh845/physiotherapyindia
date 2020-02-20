<?php 
namespace App;
/**
 *  
 */
class SendCode 
{
	
	public static function sendCode($phone)
	{
		$code = rand(1111,9999);
		$nexmo = app('Nexmo\Client');
		$nexmo->message()->send([
			'to' => '+91'.(int)$phone,
			'from' => '+918815218315',
			'text' => 'Verify Code: '.$code
		]);
		return $code;
	}
}