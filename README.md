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
./vendor/bin/run generate:authentication
```

Or by running:

```
./vendor/bin/run generate
```

Note that the method `\OpenEuropa\EPoetry\Notification\Type\RequestReference::getReference()` has been added manually,
and it won't be automatically generated: make sure you restore it using your local Git history.

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
- [`./src/Authentication`](./src/Authentication):  authentication plugins

## Authentication

The ePoetry service uses EU Login as a trusted third-party authentication system. Application that wants to use the ePoetry
client will need to request an EU Login Job Account.

You can request an EU Login job account from DIGIT by visiting [this page](https://intracomm.ec.testa.eu/itservices/eu-login_en)
and communicate it to DGT for setting up access. When requesting your job account, please keep in mind that:

- ePoetry test environment uses EU Login acceptance
- ePoetry staging and production environment uses EU Login production

**Note:** when requesting your job account make sure to ask DIGIT to insert your DG in the job account's "department" field:
this is required by the ePoetry service.

Once you get your job account, you have two ways of authenticating against the service:

- Via OpenId Connect
- Via Client Certificate login

### Authenticating via OpenID Connect

You can authenticate using OpenID Connect by using the [OpenIDAuthentication](./src/Authentication/OpenID/OpenIDAuthentication.php)
plugin.

This authentication plugin needs the following parameters to be set:

- The OpenID Connect ".well-known" endpoint URL of the target environment, be it acceptance or production. Possible values are:
  - Acceptance: https://ecas.acceptance.ec.europa.eu/cas/oauth2/.well-known/openid-configuration
  - Production: https://ecas.ec.europa.eu/cas/oauth2/.well-known/openid-configuration
- The ePoetry service URL endpoint you want to target. You can use the following:
  - Test: https://www.test.cc.cec/epoetry/webservices/dgtService or its publicly accessible proxy
    https://webgate.acceptance.ec.europa.eu/epoetrytst/epoetry/webservices/dgtService
  - Acceptance: https://www.acceptance.cc.cec/epoetry/webservices/dgtService
  - Production: https://www.cc.cec/epoetry/webservices/dgtService
- EU Login token endpoint:
  - Acceptance: https://ecas.acceptance.ec.europa.eu/cas/oauth2/token
  - Production: https://ecas.ec.europa.eu/cas/oauth2/token
- The location of a client metadata JSON file.

In order to obtain this you need to register your application as an OpenID Connect client by following [these instructions](https://citnet.tech.ec.europa.eu/CITnet/confluence/display/IAM/OpenID+Connect+-+Client+Registration).

Below you can find a working example of a client metadata:

```json
{
  "application_type" : "web",
  "client_id" : "...",
  "client_id_issued_at" : 1656329142,
  "client_name" : "[Name of your application]",
  "client_secret" : "...",
  "client_secret_expires_at" : 0,
  "client_type" : "confidential",
  "contacts" : [ "[Email of the EC official issuing the request]" ],
  "grant_types" : [ "client_credentials" ],
  "id_token_signed_response_alg" : "PS512",
  "job_account" : "[Your EU Login Job Account ID]",
  "oauth_application_type" : "web_application",
  "redirect_uris" : [ "[Your application's URL]" ],
  "registration_access_token" : "...",
  "registration_client_uri" : "...",
  "response_types" : [ ],
  "scope" : "openid",
  "subject_type" : "public",
  "token_endpoint_auth_method" : "client_secret_jwt"
} 
```

Use the above values as a reference to configure your own client metadata. Make sure you set these as follows:

```
...
  "application_type" : "web",
  "grant_types" : [ "client_credentials" ],
  "id_token_signed_response_alg" : "PS512",
  "oauth_application_type" : "web_application",
  "token_endpoint_auth_method" : "client_secret_jwt"
...
```

Once you get such information, store it in a JSON file that is reachable by your application, as this will be needed
to configure the authentication service.

For example: when using the ePoetry via the provided Symfony Console commands, the client metadata is expected to be found
at this location (see [.env](.env)):

```
EPOETRY_CONSOLE_OPENID_AUTH_CLIENT_METADATA=/var/www/html/.sink/client-metadata.json
```

### Authenticating via Client Certificate login

This section is still in progress. You can check [this page](https://citnet.tech.ec.europa.eu/CITnet/confluence/pages/viewpage.action?spaceKey=IAM&title=ECAS+Certificate+Login) for more information.

## Notification events

The ePoetry service will send the following notifications, as Symfony events:

- [`RequestStatus\ChangeAcceptedEvent`](./src/Notification/Event/RequestStatus/ChangeAcceptedEvent.php): fired when the status of the linguistic request changes to "accepted".
- [`RequestStatus\ChangeRejectedEvent`](./src/Notification/Event/RequestStatus/ChangeRejectedEvent.php): fired when the status of the linguistic request changes to "rejected".
- [`Product\StatusChangeRequestedEvent`](./src/Notification/Event/Product/StatusChangeRequestedEvent.php): fired when the status of the product changes to "requested".
- [`Product\StatusChangeOngoingEvent`](./src/Notification/Event/Product/StatusChangeOngoingEvent.php): fired when the status of the product changes to "ongoing".
- [`Product\DeliveryEvent`](./src/Notification/Event/Product/DeliveryEvent.php): fired when the translation of a product is finalized. It contains the translated product.

For more information about ePoetry notifications check the [official documentation](https://citnet.tech.ec.europa.eu/CITnet/confluence/pages/viewpage.action?pageId=973319436).

## Interact with the service via command line

This library provides the following convenience CLI commands to interact with the ePoetry service. You can set command verbosity
by setting the usual `-v`, `-vv` and `-vvv` flags. If you want to set the maximum level of verbosity, set `EPOETRY_CONSOLE_DEBUG=1`
in `.env`. You can also copy `.env` into `.env.local` and override the value there: `.env.local` is git-ignored by default.

**Note for developers:** Symfony stores a compiled version of the command container under `./var`: make sure you delete this
directory if you:

- Modify the content of [./config/console/services.yml](./config/console/services.yml)
- Add or change command classes

### Get an authentication token from EU Login

Run:

```
$ ./bin/epoetry authentication:get-ticket
```

This will use the authentication method set in the Symfony Console container to retrieve an authentication ticket.
If successful the ticket will be printed out:

```
$ ./bin/epoetry authentication:get-ticket
PT-158800-LdPkn3XdVza0Kyj4CC5kVcFJawuBpRZJ7A9dtCR...
```

The default authentication method is the OpenID Connect, you can change that by setting an alternative value here in [./config/console/services.yml](./config/console/services.yml):

```yaml
OpenEuropa\EPoetry\Authentication\AuthenticationInterface: "@openid_authentication"
```

OpenID Connect method requires a valid client metadata JSON file, available locally. You can control the value of that,
along with other authentication setting, by changing the following environment variables:

```
EPOETRY_CONSOLE_OPENID_AUTH_CLIENT_METADATA=/var/www/html/.sink/client-metadata.json
EPOETRY_CONSOLE_OPENID_WELL_KNOWN_URL=https://ecas.acceptance.ec.europa.eu/cas/oauth2/.well-known/openid-configuration
EPOETRY_CONSOLE_OPENID_SERVICE_URL=https://www.test.cc.cec/epoetry/webservices/dgtService
EPOETRY_CONSOLE_OPENID_TOKEN_ENDPOINT=https://ecas.acceptance.ec.europa.eu/cas/oauth2/token
```

### Perform a `CreateLinguisticRequest`

Run:

```
$ ./bin/epoetry request:create-linguistic-request .sink/request.yml
```

This will parse the request object in `.sink/request.yml` and send it to the configured ePoetry service. You can set
the desired service URL via the following environment variable:

```
EPOETRY_CONSOLE_SERVICE_URL=https://webgate.acceptance.ec.europa.eu/epoetrytst/epoetry/webservices/dgtService
```

You can find example of working request payloads in [./config/console/examples](./config/console/examples).

If successful the command will return the ePoetry response in JSON format:

```
$ ./bin/epoetry request:create-linguistic-request .sink/request.yml
{
    "return": {
        "requestReference": {
            "dossier": {
                "requesterCode": "DIGIT",
                "number": 33,
                "year": 2022
            },
            "productType": "TRA",
            "part": 0,
            "version": 0
        },
...
```

### Receive notification from the ePoetry service

Run:

```
$ ./bin/epoetry notification:start-listener
```

This will start a service listening for incoming messages at port `8088`.

All `POST` incoming requests will be saved in `.sink/notifications`, regardless if they are actual ePoetry notifications,
or not. Additionally, ePoetry notifications will be handled and the service response will be print out on the console.

Any `GET` request to your service will print out the service WSDL, which contains the callback URL. When running this
on a publicly accessible server, you might want to change the callback URL by setting the following ENV variable:

```
EPOETRY_CONSOLE_CALLBACK_URL=https://my-host.com:8088
```

Remember to delete the ./var directory to force a Symfony command container rebuild.

You can override the command default parameters as follows:

```
$ ./bin/epoetry notification:start-listener --port=80 --save-to=/path/to/folder
```

It is recommended to use `-vvv` for a fully verbose output.

## Using it on a European Commission Cloud9 environment

When using the console commands on a Cloud9 environment, add a `docker-compose.override.yml` with the following content:

```yaml
version: "2"
services:
  php:
    image: registry.fpfis.eu/fpfis/httpd-php:8.1-dev
    working_dir: /var/www/html
```

Then login into the `php` container and run:

```
apt update
apt install php-bcmath -y
```

This is necessary until the official Docker image will support the required PHP extension.

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
