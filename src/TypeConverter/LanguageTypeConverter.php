<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\TypeConverter;

use DOMDocument;
use Phpro\SoapClient\Soap\TypeConverter\TypeConverterInterface;

/**
 * Class LanguageTypeConverter.
 *
 * Converts between PHP \DateTime and SOAP dateTime objects
 */
class LanguageTypeConverter implements TypeConverterInterface
{
    /**
     * {@inheritdoc}
     */
    public function convertPhpToXml($php): string
    {
        return sprintf('<%1$s>%2$s</%1$s>', $this->getTypeName(), $php);
    }

    /**
     * {@inheritdoc}
     */
    public function convertXmlToPhp(string $data)
    {
        $doc = new DOMDocument();
        $doc->loadXML($data);

        return $doc->textContent;
    }

    /**
     * {@inheritdoc}
     */
    public function getTypeName(): string
    {
        return 'LinguisticSection';
    }
    /**
     * {@inheritdoc}
     */
    public function getTypeNamespace(): string
    {
        return 'OpenEuropa\EPoetry\Request\Type';
    }
}
