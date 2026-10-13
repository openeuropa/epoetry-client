<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ProductRequestIn
{
    /**
     * @var 'ML' | 'EN' | 'FR' | 'DE' | 'BG' | 'HR' | 'CS' | 'DA' | 'NL' | 'ET' | 'FI' | 'EL' | 'HU' | 'GA' | 'IT' | 'LV' | 'LT' | 'MT' | 'PL' | 'PT' | 'RO' | 'SK' | 'SL' | 'ES' | 'SV' | 'AF' | 'SQ' | 'AM' | 'AR' | 'HY' | 'AZ' | 'EU' | 'BE' | 'BI' | 'BO' | 'BR' | 'CN' | 'CA' | 'ZH' | 'KW' | 'CO' | 'EG' | 'EO' | 'FO' | 'FY' | 'GD' | 'GL' | 'KA' | 'GU' | 'IW' | 'HI' | 'IS' | 'IN' | 'JA' | 'KL' | 'KK' | 'KY' | 'KO' | 'KU' | 'LA' | 'LN' | 'LU' | 'MK' | 'MG' | 'MS' | 'GV' | 'MR' | 'MO' | 'MN' | 'ME' | 'SE' | 'NO' | 'NB' | 'NN' | 'OC' | 'AU' | 'PS' | 'PA' | 'FA' | 'RM' | 'RU' | 'SC' | 'SR' | 'SH' | 'SW' | 'TG' | 'TH' | 'TI' | 'TR' | 'UK' | 'UR' | 'UZ' | 'VI' | 'WO' | 'CY' | 'JI' | 'YO' | 'ZZ'
     */
    private $language;

    /**
     * @var null | \DateTimeInterface
     */
    private $requestedDeadline = null;

    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @param 'ML' | 'EN' | 'FR' | 'DE' | 'BG' | 'HR' | 'CS' | 'DA' | 'NL' | 'ET' | 'FI' | 'EL' | 'HU' | 'GA' | 'IT' | 'LV' | 'LT' | 'MT' | 'PL' | 'PT' | 'RO' | 'SK' | 'SL' | 'ES' | 'SV' | 'AF' | 'SQ' | 'AM' | 'AR' | 'HY' | 'AZ' | 'EU' | 'BE' | 'BI' | 'BO' | 'BR' | 'CN' | 'CA' | 'ZH' | 'KW' | 'CO' | 'EG' | 'EO' | 'FO' | 'FY' | 'GD' | 'GL' | 'KA' | 'GU' | 'IW' | 'HI' | 'IS' | 'IN' | 'JA' | 'KL' | 'KK' | 'KY' | 'KO' | 'KU' | 'LA' | 'LN' | 'LU' | 'MK' | 'MG' | 'MS' | 'GV' | 'MR' | 'MO' | 'MN' | 'ME' | 'SE' | 'NO' | 'NB' | 'NN' | 'OC' | 'AU' | 'PS' | 'PA' | 'FA' | 'RM' | 'RU' | 'SC' | 'SR' | 'SH' | 'SW' | 'TG' | 'TH' | 'TI' | 'TR' | 'UK' | 'UR' | 'UZ' | 'VI' | 'WO' | 'CY' | 'JI' | 'YO' | 'ZZ' $language
     * @return $this
     */
    public function setLanguage(string $language): static
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return 'ML' | 'EN' | 'FR' | 'DE' | 'BG' | 'HR' | 'CS' | 'DA' | 'NL' | 'ET' | 'FI' | 'EL' | 'HU' | 'GA' | 'IT' | 'LV' | 'LT' | 'MT' | 'PL' | 'PT' | 'RO' | 'SK' | 'SL' | 'ES' | 'SV' | 'AF' | 'SQ' | 'AM' | 'AR' | 'HY' | 'AZ' | 'EU' | 'BE' | 'BI' | 'BO' | 'BR' | 'CN' | 'CA' | 'ZH' | 'KW' | 'CO' | 'EG' | 'EO' | 'FO' | 'FY' | 'GD' | 'GL' | 'KA' | 'GU' | 'IW' | 'HI' | 'IS' | 'IN' | 'JA' | 'KL' | 'KK' | 'KY' | 'KO' | 'KU' | 'LA' | 'LN' | 'LU' | 'MK' | 'MG' | 'MS' | 'GV' | 'MR' | 'MO' | 'MN' | 'ME' | 'SE' | 'NO' | 'NB' | 'NN' | 'OC' | 'AU' | 'PS' | 'PA' | 'FA' | 'RM' | 'RU' | 'SC' | 'SR' | 'SH' | 'SW' | 'TG' | 'TH' | 'TI' | 'TR' | 'UK' | 'UR' | 'UZ' | 'VI' | 'WO' | 'CY' | 'JI' | 'YO' | 'ZZ'
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function hasLanguage(): bool
    {
        return !empty($this->language);
    }

    /**
     * @param null | \DateTimeInterface $requestedDeadline
     * @return $this
     */
    public function setRequestedDeadline(?\DateTimeInterface $requestedDeadline): static
    {
        $this->requestedDeadline = $requestedDeadline;
        return $this;
    }

    /**
     * @return null | \DateTimeInterface
     */
    public function getRequestedDeadline(): ?\DateTimeInterface
    {
        return $this->requestedDeadline;
    }

    /**
     * @return bool
     */
    public function hasRequestedDeadline(): bool
    {
        return !empty($this->requestedDeadline);
    }

    /**
     * @param bool $trackChanges
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges): static
    {
        $this->trackChanges = $trackChanges;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTrackChanges(): bool
    {
        return $this->trackChanges;
    }

    /**
     * @return bool
     */
    public function hasTrackChanges(): bool
    {
        return !empty($this->trackChanges);
    }
}

