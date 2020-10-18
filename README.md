cd-api-client
==================

A PHP wrapper around the Click Dealer API

Install
-------

Install http://getcomposer.org/ and run the following command:

```
php composer.phar require clsystems/cd-api-client dev-master
```

Examples
-------

#### Request campaigns

* By apiKey / AffiliateId

```php
$api = new CLSystems\Clickdealer\Api($apiKey, $affiliateId);
$campaigns = $api->getCampaigns(['campaign_id' => 1234]);

foreach ($campaigns as $campaign) {
    // do smth with campaign
}
```
