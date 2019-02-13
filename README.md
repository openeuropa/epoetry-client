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

## Logging

The ePoetry client is build on top of the [Phpro Soap Client](https://github.com/phpro/soap-client)
and it allows to log in events that occur during any request process by using any logger
that complies with the PSR-3 logger interface standard. 
In order to do so simply call the "setLogger" method in your client factory and then set the minimum level
of events that are going to be logged with the "setLogLevel" method. The log levels correspond to those defined
by the [PSR-3 logger interface standard](https://www.php-fig.org/psr/psr-3/#5-psrlogloglevel)

```php
// Instantiate your logger.
$logger = new LoggerClass();

// Instantiate the client factory.
$factory = new EPoetryClientFactory('http://europa.eu/epoetry.wsdl', $adapter);

// Set your logger.
$factory->setLogger($logger);

// Set your log level. In this case we only want ERROR level logs or higher.
$factory->setLogLevel(LogLevel::ERROR);
```
