<?php

namespace CLSystems\Clickdealer;

use Guzzle\Http\Client;

class Api
{
	const BASE_URI = 'https://partners.clickdealer.com/affiliates/api/1/offers.asmx';

	/**
	 * @var string
	 */
	private $apiKey;

	/**
	 * @var int
	 */
	private $affiliateId;

	/**
	 * @var Client
	 */
	private $client;

	public function __construct(string $apiKey, int $affiliateId)
	{
		$this->apiKey = $apiKey;
		$this->affiliateId = $affiliateId;
		$this->client = new Client(self::BASE_URI);
		$this->client->setConfig([
			'headers' => [
				'Accept' => 'application/json',
			]
		]);
	}

	/**
	 * Get campaigns with offers
	 *
	 * For possible params see:
	 * https://partners.clickdealer.com/affiliate/files/api-documentation/GetCampaign_Version_1.pdf
	 *
	 * @param array $params
	 * @return array
	 */
	public function getCampaigns(array $params = []): array
	{
		$response = $this->client->request(
			'GET',
			'/GetCampaign',
			[
				'api_key'      => $this->apiKey,
				'affiliate_id' => $this->affiliateId
			] + $params);
		$result = json_decode($response, true);

		if (false === $result)
		{
			echo 'Error in response: ' . var_export($response, true);
			return [];
		}
		return $result;
	}
}