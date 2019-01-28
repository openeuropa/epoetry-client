<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class LinguisticSection
{
    /**
     * @var \OpenEuropa\EPoetry\Type\Language
     */
    protected $language;

    /**
     * @return \OpenEuropa\EPoetry\Type\Language
     */
    public function getLanguage(): Language
    {
        return $this->language;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\Language $language
     *
     * @return $this
     */
    public function setLanguage($language): LinguisticSection
    {
        $this->language = $language;

        return $this;
    }
}
