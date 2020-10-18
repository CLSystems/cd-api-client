<?php

use CLSystems\Clickdealer\Api;

// Example for Click Dealer API Client
$apiKey = '73c5004f1bb30481a0dd182272e8a0'; // Replace this
$affiliateId = '110332'; // Replace this

$api = new Api($apiKey, $affiliateId);

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