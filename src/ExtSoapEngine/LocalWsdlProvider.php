<?php

namespace OpenEuropa\EPoetry\ExtSoapEngine;

use Soap\ExtSoapEngine\Wsdl\WsdlProvider;

class LocalWsdlProvider implements WsdlProvider
{
    private array $replacementTokens = [];

    private string $wsldFilepath = '';

    public function __construct(string $wsldFilepath, array $replacementTokens = []) {
        $this->wsldFilepath = $wsldFilepath;
        $this->replacementTokens = $replacementTokens;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(string $location): string
    {
        return 'data://text/plain;base64,'.base64_encode($location);
    }

}
