# ePoetry PHP client

PHP client for the ePoetry service.

Before proceeding, it is recommended to read the ["Introduction and terminology"](https://citnet.tech.ec.europa.eu/CITnet/confluence/pages/viewpage.action?pageId=967905830)
section of the official [ePoetry documentation](https://citnet.tech.ec.europa.eu/CITnet/confluence/display/EPOETRY/ePoetry+webservices). 

A bird's-eye overview of a typical translation request workflow can be outlined as follows:

- The web application (e.g. a Drupal site) creates a translation request onto the ePoetry service, by performing a SOAP method call
- The ePoetry service synchronously answers such a call with either a response object, or an error
- The translation request is manually processed by DGT backoffice, this can take several days
- Once completed, the ePoetry service sends a notification to the web application, via a SOAP method call, which contains the requested translations

This project provides the necessary code (SOAP objects, middleware, etc.) to request a translation and handle incoming
notifications from the ePoetry service.

The library is built using the [PHP SOAP client project](https://github.com/phpro/soap-client) which, among other things,
allows for the actual PHP client code to be automatically generated, given a WSDL/XSD files pair.

To (re-)generate the library, run:

```
./vendor/bin/run generate:request
./vendor/bin/run generate:notification
```

## Project overview

- [`./bin/epoetry`](./bin/epoetry): CLI executable to interact with the ePoetry service
- [`./resources`](./resources): request and notification services WSLD/XLD files, as provided by the ePoetry service.
  Original resources can be obtained by accessing the following links, withing the European Commission network:
  - Request service WSDL: [https://www.cc.cec/epoetry/webservices/dgtService?WSDL](https://www.cc.cec/epoetry/webservices/dgtService?WSDL)
  - Request service XSD: [https://www.cc.cec/epoetry/webservices/dgtService?xsd=1](https://www.cc.cec/epoetry/webservices/dgtService?xsd=1)
  - Notification service WSDL: [http://wlstd00470.cc.cec.eu.int:1042/epoetry/webservices/DgtClientNotificationReceiverWS?WSDL](http://wlstd00470.cc.cec.eu.int:1042/epoetry/webservices/DgtClientNotificationReceiverWS?WSDL)
  - Notification service XSD: [http://wlstd00470.cc.cec.eu.int:1042/epoetry/webservices/DgtClientNotificationReceiverWS?xsd=1](http://wlstd00470.cc.cec.eu.int:1042/epoetry/webservices/DgtClientNotificationReceiverWS?xsd=1)
- [`./config/soap-client-*.php`](./config): configuration files for the code generation
- [`./config/validator/*.yaml`](./config/validator): configuration files for object validation, built using [Symfony Validator](https://symfony.com/doc/4.4/validation.html)
- [`./src/CodeGenerator`](./src/CodeGenerator): set of assembler classes, used to generated client's code 
- [`./src/Console`](./src/Console): Symfony Console command classes 
- [`./src/ExtSoapEngine`](./src/ExtSoapEngine): custom SOAP engine classes, such as a WSDL provider to process locally stored WSDL files 
- [`./src/Console`](./src/Notification): automatically generated classes for the "Notification" service 
- [`./src/Request`](./src/Request):  automatically generated classes for the "Request" service

## Using it on a European Commission site

The ePoetry client library requires the `ext-bcmath` PHP extension, which is not necessarily enabled on all images used
on the European Commission infrastructure.

When using this library on a site, make sure you install the `ext-bcmath` extension by specifying it in the site's
`.opts.yml` file, as follows:

```yaml
extra_pkgs:
- ext-bcmath
```

For more information please refer to [the pipeline configuration documentation](https://webgate.ec.europa.eu/fpfis/wikis/display/MULTISITE/Pipeline+configuration+and+override).
