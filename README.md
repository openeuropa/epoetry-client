# ePoetry client

PHP client for the ePoetry service.

## Usage

Install the library by running:

```
composer require openeuropa/epoetry-client
```

To create a client instance use the [`\OpenEuropa\EPoetry\Request\ClientFactory`](src/Request/RequestClientFactory.php):

```php
<?php
use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use OpenEuropa\EPoetry\Request\RequestClientFactory;
use OpenEuropa\EPoetry\Request\Type\CreateRequests;

// Instantiate HTTP client.
$guzzle = new GuzzleClient();
$adapter = new GuzzleAdapter($guzzle);

// Instantiate the client factory.
$factory = new RequestClientFactory('https://www.acceptance.cc.cec/epoetry/webservices/dgtService', $adapter);

// Create request object and perform the request.
$createRequests = new CreateRequests();
$response = $factory->getClient()->createRequests($createRequests);
```

In order to use the RequestClientFactory you need to require a Http Client on your project,
e.g. [guzzle6-adapter](https://github.com/php-http/guzzle6-adapter).

See the documentation of [httplug](http://httplug.io) for more information.

## Authentication

Access to ePoetry web services requires your application to be
configured as a [cas proxy](https://webgate.ec.europa.eu/CITnet/confluence/display/IAM/Proxy+Tickets).

When authenticated, a session needs to be provided having the attribute `cas_pgt`.

This can be done in code.
An example can be seen in [tests/Requests/MiddlewareTest.php](tests/Request/MiddlewareTest.php):

```php
$session = new Session(new MockArraySessionStorage());
$session->set('cas_pgt', 'DESKTOP_PT-21-9fp9');
$clientFactory->addMiddleware(new CasProxyTicketSessionMiddleware($session));
```

Another option is to enable a service for the ePoetry client that calls the `addMiddleware` method:

```yaml
services:
  example.epoetry_client:
    class: \OpenEuropa\EPoetry\Request\RequestClientFactory
    arguments: [
      'https://www.acceptance.cc.cec/epoetry/webservices/dgtService',
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
$factory = new RequestClientFactory('http://europa.eu/epoetry.wsdl', $adapter);

// Set your logger.
$factory->setLogger($logger);

// Set your log level. In this case we only want ERROR level logs or lower.
$factory->setLogLevel(LogLevel::ERROR);
```

## ePoetry Console

The ePoetry library ships with a set of Symfony Console commands that developers can use to interact with a running ePoetry service instance.

To list all available commands run:

```bash
php bin/epoetry
```

In order to use the ePoetry Console you need to require `"symfony/console": "^3.2 || ^4"`.

## Performing a request

At the moment only the `createRequests` request is supported, to perform it run:

```bash
php bin/epoetry create-requests [--endpoint ENDPOINT] [--in-format [IN-FORMAT]] [--out-format [OUT-FORMAT]] [--] <file>
```

Where:

- `--endpoint` is the ePoetry service endpoint, e.g. `http://my-epoetry-instance`
- `--in-format` is the format of the input request file, only `xml` and `yml` are supported
- `--out-format` is the format in which the service response will be printed out, only `xml` and `yml` are supported
- `<file>` is a path to a file containing the service request, in the format specified in `--in-format`

For example:

```bash
php bin/epoetry create-requests --endpoint=http://my-epoetry-instance --in-format=xml --out-format=yaml ./path/to/request
```

## Performing a notification

```bash
php bin/epoetry receive-notification [--in-format [IN-FORMAT]] [--out-format [OUT-FORMAT]] [--] <notification-file>
```

Where:

- `--endpoint` is the ePoetry Client endpoint, e.g. `http://my-epoetry-client-instance`
- `--in-format` is the format of the input notification file, only `xml` and `yml` are supported
- `--out-format` is the format in which the service response will be printed out, only `xml` and `yml` are supported
- `<notification-file>` is a path to a file containing the notification, in the format specified in `--in-format`

For example:

```bash
php bin/epoetry receive-notification --endpoint=http://my-epoetry-client-instance --in-format=xml --out-format=yaml ./path/to/notification
```

## Troubleshooting

- If you are using Symfony `^3.2` use `yml` as YAML in/out formats
- If you are using Symfony `^4.2` use `yaml` as YAML in/out formats
