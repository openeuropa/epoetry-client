<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;

class ExtendedAttributes
{
    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\AttributeType
     */
    private $extendedAttribute;

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\AttributeType
     */
    public function getExtendedAttribute()
    {
        return $this->extendedAttribute;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\AttributeType $extendedAttribute
     * @return ExtendedAttributes
     */
    public function withExtendedAttribute($extendedAttribute)
    {
        $new = clone $this;
        $new->extendedAttribute = $extendedAttribute;

        return $new;
    }
}

