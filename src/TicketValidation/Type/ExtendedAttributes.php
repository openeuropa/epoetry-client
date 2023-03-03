<?php

namespace OpenEuropa\EPoetry\TicketValidation\Type;

class ExtendedAttributes
{
    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\Type\AttributeType
     */
    private $extendedAttribute;

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\Type\AttributeType
     */
    public function getExtendedAttribute()
    {
        return $this->extendedAttribute;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\Type\AttributeType $extendedAttribute
     * @return ExtendedAttributes
     */
    public function withExtendedAttribute($extendedAttribute)
    {
        $new = clone $this;
        $new->extendedAttribute = $extendedAttribute;

        return $new;
    }
}

