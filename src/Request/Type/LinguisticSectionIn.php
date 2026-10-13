<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSectionIn
{
    /**
     * @var 'ML' | 'EN' | 'FR' | 'DE' | 'BG' | 'HR' | 'CS' | 'DA' | 'NL' | 'ET' | 'FI' | 'EL' | 'HU' | 'GA' | 'IT' | 'LV' | 'LT' | 'MT' | 'PL' | 'PT' | 'RO' | 'SK' | 'SL' | 'ES' | 'SV' | 'AF' | 'SQ' | 'AM' | 'AR' | 'HY' | 'AZ' | 'EU' | 'BE' | 'BI' | 'BO' | 'BR' | 'CN' | 'CA' | 'ZH' | 'KW' | 'CO' | 'EG' | 'EO' | 'FO' | 'FY' | 'GD' | 'GL' | 'KA' | 'GU' | 'IW' | 'HI' | 'IS' | 'IN' | 'JA' | 'KL' | 'KK' | 'KY' | 'KO' | 'KU' | 'LA' | 'LN' | 'LU' | 'MK' | 'MG' | 'MS' | 'GV' | 'MR' | 'MO' | 'MN' | 'ME' | 'SE' | 'NO' | 'NB' | 'NN' | 'OC' | 'AU' | 'PS' | 'PA' | 'FA' | 'RM' | 'RU' | 'SC' | 'SR' | 'SH' | 'SW' | 'TG' | 'TH' | 'TI' | 'TR' | 'UK' | 'UR' | 'UZ' | 'VI' | 'WO' | 'CY' | 'JI' | 'YO' | 'ZZ'
     */
    private $language;

    /**
     * Constructor
     *
     * @param 'ML' | 'EN' | 'FR' | 'DE' | 'BG' | 'HR' | 'CS' | 'DA' | 'NL' | 'ET' | 'FI' | 'EL' | 'HU' | 'GA' | 'IT' | 'LV' | 'LT' | 'MT' | 'PL' | 'PT' | 'RO' | 'SK' | 'SL' | 'ES' | 'SV' | 'AF' | 'SQ' | 'AM' | 'AR' | 'HY' | 'AZ' | 'EU' | 'BE' | 'BI' | 'BO' | 'BR' | 'CN' | 'CA' | 'ZH' | 'KW' | 'CO' | 'EG' | 'EO' | 'FO' | 'FY' | 'GD' | 'GL' | 'KA' | 'GU' | 'IW' | 'HI' | 'IS' | 'IN' | 'JA' | 'KL' | 'KK' | 'KY' | 'KO' | 'KU' | 'LA' | 'LN' | 'LU' | 'MK' | 'MG' | 'MS' | 'GV' | 'MR' | 'MO' | 'MN' | 'ME' | 'SE' | 'NO' | 'NB' | 'NN' | 'OC' | 'AU' | 'PS' | 'PA' | 'FA' | 'RM' | 'RU' | 'SC' | 'SR' | 'SH' | 'SW' | 'TG' | 'TH' | 'TI' | 'TR' | 'UK' | 'UR' | 'UZ' | 'VI' | 'WO' | 'CY' | 'JI' | 'YO' | 'ZZ' $language
     */
    public function __construct(string $language)
    {
        $this->language = $language;
    }

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
}

