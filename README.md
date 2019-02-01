# ePoetry client

PHP client for the ePoetry service.

## Usage

Install the library by running:

```
composer require openeuropa/epoetry-client
```

To create a client instance use the [`\OpenEuropa\EPoetry\EPoetryClientFactory`](./src/EPoetryClientFactory.php):

```php
<?php
use OpenEuropa\EPoetry\EPoetryClientFactory;
use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use OpenEuropa\EPoetry\Type\CreateRequests;

// Instantiate HTTP client.
$guzzle = new GuzzleClient();
$adapter = new GuzzleAdapter($guzzle);

// Instantiate the client factory.
$factory = new EPoetryClientFactory('http://europa.eu/epoetry.wsdl', $adapter);

// Create request object and perform the request.
$createRequests = new CreateRequests();
$response = $factory->getClient()->createRequests($createRequests);
```

