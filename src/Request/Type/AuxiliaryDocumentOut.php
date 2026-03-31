<?php

namespace OpenEuropa\EPoetry\Request\Type;

class AuxiliaryDocumentOut
{
    /**
     * @var null | string
     */
    private $fileName = null;

    /**
     * @var null | 'ML' | 'EN' | 'FR' | 'DE' | 'BG' | 'HR' | 'CS' | 'DA' | 'NL' | 'ET' | 'FI' | 'EL' | 'HU' | 'GA' | 'IT' | 'LV' | 'LT' | 'MT' | 'PL' | 'PT' | 'RO' | 'SK' | 'SL' | 'ES' | 'SV' | 'AF' | 'SQ' | 'AM' | 'AR' | 'HY' | 'AZ' | 'EU' | 'BE' | 'BI' | 'BO' | 'BR' | 'CN' | 'CA' | 'ZH' | 'KW' | 'CO' | 'EG' | 'EO' | 'FO' | 'FY' | 'GD' | 'GL' | 'KA' | 'GU' | 'IW' | 'HI' | 'IS' | 'IN' | 'JA' | 'KL' | 'KK' | 'KY' | 'KO' | 'KU' | 'LA' | 'LN' | 'LU' | 'MK' | 'MG' | 'MS' | 'GV' | 'MR' | 'MO' | 'MN' | 'ME' | 'SE' | 'NO' | 'NB' | 'NN' | 'OC' | 'AU' | 'PS' | 'PA' | 'FA' | 'RM' | 'RU' | 'SC' | 'SR' | 'SH' | 'SW' | 'TG' | 'TH' | 'TI' | 'TR' | 'UK' | 'UR' | 'UZ' | 'VI' | 'WO' | 'CY' | 'JI' | 'YO' | 'ZZ'
     */
    private $language = null;

    /**
     * @var null | 'ORI' | 'REF' | 'SRC' | 'TRAX' | 'SPOT' | 'DCO' | 'PRT'
     */
    private $documentType = null;

    /**
     * @var null | string
     */
    private $comment = null;

    /**
     * @var null | 'XLS' | 'XLSX' | 'DOC' | 'DOCX' | 'PPTX' | 'PPT' | 'HTM' | 'HTML' | 'RTF' | 'VSD' | 'PDF' | 'TIF' | 'ZIP' | 'TIFF' | 'TXT' | 'XML' | 'XMW'
     */
    private $format = null;

    /**
     * @param null | string $fileName
     * @return $this
     */
    public function setFileName(?string $fileName): static
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @return bool
     */
    public function hasFileName(): bool
    {
        return !empty($this->fileName);
    }

    /**
     * @param null | 'ML' | 'EN' | 'FR' | 'DE' | 'BG' | 'HR' | 'CS' | 'DA' | 'NL' | 'ET' | 'FI' | 'EL' | 'HU' | 'GA' | 'IT' | 'LV' | 'LT' | 'MT' | 'PL' | 'PT' | 'RO' | 'SK' | 'SL' | 'ES' | 'SV' | 'AF' | 'SQ' | 'AM' | 'AR' | 'HY' | 'AZ' | 'EU' | 'BE' | 'BI' | 'BO' | 'BR' | 'CN' | 'CA' | 'ZH' | 'KW' | 'CO' | 'EG' | 'EO' | 'FO' | 'FY' | 'GD' | 'GL' | 'KA' | 'GU' | 'IW' | 'HI' | 'IS' | 'IN' | 'JA' | 'KL' | 'KK' | 'KY' | 'KO' | 'KU' | 'LA' | 'LN' | 'LU' | 'MK' | 'MG' | 'MS' | 'GV' | 'MR' | 'MO' | 'MN' | 'ME' | 'SE' | 'NO' | 'NB' | 'NN' | 'OC' | 'AU' | 'PS' | 'PA' | 'FA' | 'RM' | 'RU' | 'SC' | 'SR' | 'SH' | 'SW' | 'TG' | 'TH' | 'TI' | 'TR' | 'UK' | 'UR' | 'UZ' | 'VI' | 'WO' | 'CY' | 'JI' | 'YO' | 'ZZ' $language
     * @return $this
     */
    public function setLanguage(?string $language): static
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return null | 'ML' | 'EN' | 'FR' | 'DE' | 'BG' | 'HR' | 'CS' | 'DA' | 'NL' | 'ET' | 'FI' | 'EL' | 'HU' | 'GA' | 'IT' | 'LV' | 'LT' | 'MT' | 'PL' | 'PT' | 'RO' | 'SK' | 'SL' | 'ES' | 'SV' | 'AF' | 'SQ' | 'AM' | 'AR' | 'HY' | 'AZ' | 'EU' | 'BE' | 'BI' | 'BO' | 'BR' | 'CN' | 'CA' | 'ZH' | 'KW' | 'CO' | 'EG' | 'EO' | 'FO' | 'FY' | 'GD' | 'GL' | 'KA' | 'GU' | 'IW' | 'HI' | 'IS' | 'IN' | 'JA' | 'KL' | 'KK' | 'KY' | 'KO' | 'KU' | 'LA' | 'LN' | 'LU' | 'MK' | 'MG' | 'MS' | 'GV' | 'MR' | 'MO' | 'MN' | 'ME' | 'SE' | 'NO' | 'NB' | 'NN' | 'OC' | 'AU' | 'PS' | 'PA' | 'FA' | 'RM' | 'RU' | 'SC' | 'SR' | 'SH' | 'SW' | 'TG' | 'TH' | 'TI' | 'TR' | 'UK' | 'UR' | 'UZ' | 'VI' | 'WO' | 'CY' | 'JI' | 'YO' | 'ZZ'
     */
    public function getLanguage(): ?string
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
     * @param null | 'ORI' | 'REF' | 'SRC' | 'TRAX' | 'SPOT' | 'DCO' | 'PRT' $documentType
     * @return $this
     */
    public function setDocumentType(?string $documentType): static
    {
        $this->documentType = $documentType;
        return $this;
    }

    /**
     * @return null | 'ORI' | 'REF' | 'SRC' | 'TRAX' | 'SPOT' | 'DCO' | 'PRT'
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * @return bool
     */
    public function hasDocumentType(): bool
    {
        return !empty($this->documentType);
    }

    /**
     * @param null | string $comment
     * @return $this
     */
    public function setComment(?string $comment): static
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @return bool
     */
    public function hasComment(): bool
    {
        return !empty($this->comment);
    }

    /**
     * @param null | 'XLS' | 'XLSX' | 'DOC' | 'DOCX' | 'PPTX' | 'PPT' | 'HTM' | 'HTML' | 'RTF' | 'VSD' | 'PDF' | 'TIF' | 'ZIP' | 'TIFF' | 'TXT' | 'XML' | 'XMW' $format
     * @return $this
     */
    public function setFormat(?string $format): static
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return null | 'XLS' | 'XLSX' | 'DOC' | 'DOCX' | 'PPTX' | 'PPT' | 'HTM' | 'HTML' | 'RTF' | 'VSD' | 'PDF' | 'TIF' | 'ZIP' | 'TIFF' | 'TXT' | 'XML' | 'XMW'
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @return bool
     */
    public function hasFormat(): bool
    {
        return !empty($this->format);
    }
}

