<?php
	
	class Translator
	{
		protected $_token;

		public function getToken()
		{
			$postData = array(
				'client_id' => 'polyglotpal',
				'client_secret' => 'wKhiknZVD/1655KZmBBr2KR/YRNKYqgrnrkL5+A+OAw=',
				'scope' => 'http://api.microsofttranslator.com',
				'grant_type' => 'client_credentials',
				 );
			$ch = curl_init("https://datamarket.accesscontrol.windows.net/v2/OAuth2-13");
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

			$result=curl_exec($ch);
			$result=json_decode($result);

			if(!is_object($result)||empty($result->access_token))
				die('Problem');

			$this->_token=$result->access_token;

			//var_dump($result);

		}
		public function translate($content ,$languageFrom ,$languageTo)
		{
			$postData = array(
				'text' => $content,
				'from' => $languageFrom,
				'to' =>$languageTo,
				'contentType' => 'text/plain',
				 );
			$ch = curl_init('http://api.microsofttranslator.com/V2/Http.svc/Translate?' . http_build_query($postData));
			curl_setopt($ch, CURLOPT_POST, false);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $this->_token));

			$result=curl_exec($ch);
			return trim($result);
			//var_dump($result);
		}
	}
?>
