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
./vendor/bin/run generate:authentication
```