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
## Authentication

Access to ePoetry web services requires your application to be
configured as a [cas proxy](https://webgate.ec.europa.eu/CITnet/confluence/display/IAM/Proxy+Tickets).

When authenticated, a session needs to be provided having the attribute `cas_pgt`.

This can be done in code.
An example can be seen in [tests/Requests/MiddlewareTest.php](tests/Requests/MiddlewareTest.php):

```php
$session = new Session(new MockArraySessionStorage());
$session->set('cas_pgt', 'DESKTOP_PT-21-9fp9');
$clientFactory->addMiddleware(new CasProxyTicketSessionMiddleware($session));
```

Another option is to enable a service for the ePoetry client that calls the `addMiddleware` method:

```yaml
services:
  example.epoetry_client:
    class: \OpenEuropa\EPoetry\EPoetryClientFactory
    arguments: [
      'resources/dgtServiceWSDL.xml',
      '@http_client'
    ]
    calls:
      - method: 'addMiddleware'
        arguments:
          - '@your.session.service'
```

## Logging

The ePoetry client is build on top of the [Phpro Soap Client](https://github.com/phpro/soap-client)
and it allows to log in events that occur during any request process by using any logger
that complies with the PSR-3 logger interface standard. 
In order to do so simply call the "setLogger" method in your client factory and then set the maximum level
of events that are going to be logged with the "setLogLevel" method. The log levels correspond to those defined
by the [PSR-3 logger interface standard](https://www.php-fig.org/psr/psr-3/#5-psrlogloglevel)

```php
// Instantiate your logger.
$logger = new LoggerClass();

// Instantiate the client factory.
$factory = new EPoetryClientFactory('http://europa.eu/epoetry.wsdl', $adapter);

// Set your logger.
$factory->setLogger($logger);

// Set your log level. In this case we only want ERROR level logs or lower.
$factory->setLogLevel(LogLevel::ERROR);
```
