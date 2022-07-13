# ePoetry client

PHP client for the ePoetry service.

This project allows you to interact with 3 different SOAP services:

- [`src/Authentication`](src/Authentication): the EU Login authentication service available at [https://webgate.ec.europa.eu/cas/ws/CertLoginService.wsdl](https://webgate.ec.europa.eu/cas/ws/CertLoginService.wsdl).
  You need to call this service first, and it will provide you with the service ticket needed to authenticate requests to the ePoetry service. 
- [`src/Authentication`](src/Request): send requests to the ePoetry service
- [`src/Notification`](src/Notification): handles notifications coming back from the ePoetry service

Generate the library by running:

```
./vendor/bin/run generate:request
./vendor/bin/run generate:notification
```

- Notification endpoint: http://wlstd00470.cc.cec.eu.int:1042/epoetry/webservices/DgtClientNotificationReceiverWS
- Request endpoint: https://www.cc.cec/epoetry/webservices/dgtService

## Using it on a European Commission site

The library requires the `ext-bcmath` PHP extension, which is not necessarily enabled on all images used on the
European Commission infrastructure.

When using this library on a site, make sure you install the `ext-bcmath` extension by specifying it in the site's
`.opts.yml` file as follows:

```yaml
extra_pkgs:
- ext-bcmath
```

For more information please refer to [the pipeline configuration documentation](https://webgate.ec.europa.eu/fpfis/wikis/display/MULTISITE/Pipeline+configuration+and+override).
