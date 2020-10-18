<?php

use CLSystems\Clickdealer\Api;

// Example for Click Dealer API Client
$affiliateId = '123123123'; // Replace this
$apiKey = 'ABCD1234'; // Replace this

$api = new Api($affiliateId, $apiKey);

// For all possible params see:
// https://partners.clickdealer.com/affiliate/files/api-documentation/GetCampaign_Version_1.pdf
$params = [
	'allowed_countries' => 'nl,de,be',
];
$campaigns = $api->getCampaigns($params);

foreach ($campaigns as $campaign)
{
	var_dump($campaign);
	die;
}