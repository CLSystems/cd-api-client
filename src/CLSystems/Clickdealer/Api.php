<?php

namespace CLSystems\Clickdealer;

use GuzzleHttp\Client;

class Api
{
	const BASE_URI = 'https://partners.clickdealer.com/affiliates/api/1/offers.asmx';

	/**
	 * @var int
	 */
	private $affiliateId;

	/**
	 * @var string
	 */
	private $apiKey;

	/**
	 * @var Client
	 */
	private $client;

	public function __construct(int $affiliateId, string $apiKey)
	{
		$this->affiliateId = $affiliateId;
		$this->apiKey      = $apiKey;
		$this->client      = new Client([]);
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
		$options = [
			'headers' => ['Accept' => 'application/json'],
			'params'  => [
					'api_key'      => $this->apiKey,
					'affiliate_id' => $this->affiliateId
				] + $params,
		];
		$response = $this->client->get(self::BASE_URI . '/GetCampaign', $options)->getBody();
		$result = json_decode($response, true);

		if (false === $result)
		{
			echo 'Error in response: ' . var_export($response, true);
			return [];
		}
		return $result;
	}
}