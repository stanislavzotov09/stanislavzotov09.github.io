<?php

class Salesforce_Requests {

	private $access_token;
	private $instance_url;
	private $refresh_token;

	public function __construct($access_token, $instance_url, $refresh_token)
	{
		$this->access_token = 'x';//$access_token;
		$this->instance_url = $instance_url;
		$this->refresh_token = $refresh_token;
	}

	public function create_lead($data)
	{
		return $this->make_request('/services/data/v40.0/sobjects/Lead/', $data, 'post');
	}

	private function fetch_access_token()
	{
	    $curl = curl_init('https://login.salesforce.com/services/oauth2/token');
	    curl_setopt($curl, CURLOPT_HEADER, false);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($curl, CURLOPT_POST, true);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, [
	    	'grant_type' => 'refresh_token',
	    	'refresh_token' => $this->refresh_token,
	    	'client_id' => '3MVG9HxRZv05HarTb1WnpuCSlC4gTUnid_jFgjUNOdlGfWx4ICY2aCd1eUHUfSkxtgz9usVs.aX8LhtKjLpe_',
	    	'client_secret' => '1288731567516431776'
    	]);

	    $json_response = curl_exec($curl);
	    curl_close($curl);
	    $return = json_decode($json_response);
	    if($return) {
	    	return $return->access_token;
	    }
		return 'x';
	}

	private function make_request($uri, $data, $method, $retry = false)
	{
	    $url = $this->instance_url . $uri;
	    if($method == 'get' && $data)
	    {
    		$url .= '?' . http_build_query($data);
	    }

		$header = ["Authorization: Bearer " . $this->access_token];

	    $curl = curl_init($url);
	    curl_setopt($curl, CURLOPT_HEADER, false);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	    if($method == 'post') {
		    curl_setopt($curl, CURLOPT_POST, true);
		    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
		    $header[] = 'Content-Type: application/json';
	    }
	    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);

	    $json_response = curl_exec($curl);
		$info = curl_getinfo($curl);
	    curl_close($curl);

		if($info['http_code'] == 401 && !$retry) {
			$this->access_token = $this->fetch_access_token();
			return $this->make_request($uri, $data, $method, true);
		}
		else
		{
	    	return json_decode($json_response, true);
		}
	}

}