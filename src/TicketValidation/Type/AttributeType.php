<?php

namespace OpenEuropa\EPoetry\TicketValidation\Type;

class AttributeType
{
    /**
     * @var string
     */
    private $attributeValue;

    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getAttributeValue()
    {
        return $this->attributeValue;
    }

    /**
     * @param string $attributeValue
     * @return AttributeType
     */
    public function withAttributeValue($attributeValue)
    {
        $new = clone $this;
        $new->attributeValue = $attributeValue;

        return $new;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return AttributeType
     */
    public function withName($name)
    {
        $new = clone $this;
        $new->name = $name;

        return $new;
    }
}

