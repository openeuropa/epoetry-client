<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ProductRequestOut
{
    /**
     * @var null | 'ML' | 'EN' | 'FR' | 'DE' | 'BG' | 'HR' | 'CS' | 'DA' | 'NL' | 'ET' | 'FI' | 'EL' | 'HU' | 'GA' | 'IT' | 'LV' | 'LT' | 'MT' | 'PL' | 'PT' | 'RO' | 'SK' | 'SL' | 'ES' | 'SV' | 'AF' | 'SQ' | 'AM' | 'AR' | 'HY' | 'AZ' | 'EU' | 'BE' | 'BI' | 'BO' | 'BR' | 'CN' | 'CA' | 'ZH' | 'KW' | 'CO' | 'EG' | 'EO' | 'FO' | 'FY' | 'GD' | 'GL' | 'KA' | 'GU' | 'IW' | 'HI' | 'IS' | 'IN' | 'JA' | 'KL' | 'KK' | 'KY' | 'KO' | 'KU' | 'LA' | 'LN' | 'LU' | 'MK' | 'MG' | 'MS' | 'GV' | 'MR' | 'MO' | 'MN' | 'ME' | 'SE' | 'NO' | 'NB' | 'NN' | 'OC' | 'AU' | 'PS' | 'PA' | 'FA' | 'RM' | 'RU' | 'SC' | 'SR' | 'SH' | 'SW' | 'TG' | 'TH' | 'TI' | 'TR' | 'UK' | 'UR' | 'UZ' | 'VI' | 'WO' | 'CY' | 'JI' | 'YO' | 'ZZ'
     */
    private $language = null;

    /**
     * @var null | \DateTimeInterface
     */
    private $requestedDeadline = null;

    /**
     * @var null | \DateTimeInterface
     */
    private $acceptedDeadline = null;

    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @var null | 'Accepted' | 'SenttoDGT' | 'Ongoing' | 'Received' | 'Rejected' | 'Requested' | 'Executed' | 'Sent' | 'ToBeValidated'
     */
    private $status = null;

    /**
     * @var null | 'XLS' | 'XLSX' | 'DOC' | 'DOCX' | 'PPTX' | 'PPT' | 'HTM' | 'HTML' | 'RTF' | 'VSD' | 'PDF' | 'TIF' | 'ZIP' | 'TIFF' | 'TXT' | 'XML' | 'XMW'
     */
    private $format = null;

    /**
     * @param null | 'ML' | 'EN' | 'FR' | 'DE' | 'BG' | 'HR' | 'CS' | 'DA' | 'NL' | 'ET' | 'FI' | 'EL' | 'HU' | 'GA' | 'IT' | 'LV' | 'LT' | 'MT' | 'PL' | 'PT' | 'RO' | 'SK' | 'SL' | 'ES' | 'SV' | 'AF' | 'SQ' | 'AM' | 'AR' | 'HY' | 'AZ' | 'EU' | 'BE' | 'BI' | 'BO' | 'BR' | 'CN' | 'CA' | 'ZH' | 'KW' | 'CO' | 'EG' | 'EO' | 'FO' | 'FY' | 'GD' | 'GL' | 'KA' | 'GU' | 'IW' | 'HI' | 'IS' | 'IN' | 'JA' | 'KL' | 'KK' | 'KY' | 'KO' | 'KU' | 'LA' | 'LN' | 'LU' | 'MK' | 'MG' | 'MS' | 'GV' | 'MR' | 'MO' | 'MN' | 'ME' | 'SE' | 'NO' | 'NB' | 'NN' | 'OC' | 'AU' | 'PS' | 'PA' | 'FA' | 'RM' | 'RU' | 'SC' | 'SR' | 'SH' | 'SW' | 'TG' | 'TH' | 'TI' | 'TR' | 'UK' | 'UR' | 'UZ' | 'VI' | 'WO' | 'CY' | 'JI' | 'YO' | 'ZZ' $language
     * @return $this
     */
    public function setLanguage(?string $language) : static
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return null | 'ML' | 'EN' | 'FR' | 'DE' | 'BG' | 'HR' | 'CS' | 'DA' | 'NL' | 'ET' | 'FI' | 'EL' | 'HU' | 'GA' | 'IT' | 'LV' | 'LT' | 'MT' | 'PL' | 'PT' | 'RO' | 'SK' | 'SL' | 'ES' | 'SV' | 'AF' | 'SQ' | 'AM' | 'AR' | 'HY' | 'AZ' | 'EU' | 'BE' | 'BI' | 'BO' | 'BR' | 'CN' | 'CA' | 'ZH' | 'KW' | 'CO' | 'EG' | 'EO' | 'FO' | 'FY' | 'GD' | 'GL' | 'KA' | 'GU' | 'IW' | 'HI' | 'IS' | 'IN' | 'JA' | 'KL' | 'KK' | 'KY' | 'KO' | 'KU' | 'LA' | 'LN' | 'LU' | 'MK' | 'MG' | 'MS' | 'GV' | 'MR' | 'MO' | 'MN' | 'ME' | 'SE' | 'NO' | 'NB' | 'NN' | 'OC' | 'AU' | 'PS' | 'PA' | 'FA' | 'RM' | 'RU' | 'SC' | 'SR' | 'SH' | 'SW' | 'TG' | 'TH' | 'TI' | 'TR' | 'UK' | 'UR' | 'UZ' | 'VI' | 'WO' | 'CY' | 'JI' | 'YO' | 'ZZ'
     */
    public function getLanguage() : ?string
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function hasLanguage() : bool
    {
        return !empty($this->language);
    }

    /**
     * @param null | \DateTimeInterface $requestedDeadline
     * @return $this
     */
    public function setRequestedDeadline(?\DateTimeInterface $requestedDeadline) : static
    {
        $this->requestedDeadline = $requestedDeadline;
        return $this;
    }

    /**
     * @return null | \DateTimeInterface
     */
    public function getRequestedDeadline() : ?\DateTimeInterface
    {
        return $this->requestedDeadline;
    }

    /**
     * @return bool
     */
    public function hasRequestedDeadline() : bool
    {
        return !empty($this->requestedDeadline);
    }

    /**
     * @param null | \DateTimeInterface $acceptedDeadline
     * @return $this
     */
    public function setAcceptedDeadline(?\DateTimeInterface $acceptedDeadline) : static
    {
        $this->acceptedDeadline = $acceptedDeadline;
        return $this;
    }

    /**
     * @return null | \DateTimeInterface
     */
    public function getAcceptedDeadline() : ?\DateTimeInterface
    {
        return $this->acceptedDeadline;
    }

    /**
     * @return bool
     */
    public function hasAcceptedDeadline() : bool
    {
        return !empty($this->acceptedDeadline);
    }

    /**
     * @param bool $trackChanges
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges) : static
    {
        $this->trackChanges = $trackChanges;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTrackChanges() : bool
    {
        return $this->trackChanges;
    }

    /**
     * @return bool
     */
    public function hasTrackChanges() : bool
    {
        return !empty($this->trackChanges);
    }

    /**
     * @param null | 'Accepted' | 'SenttoDGT' | 'Ongoing' | 'Received' | 'Rejected' | 'Requested' | 'Executed' | 'Sent' | 'ToBeValidated' $status
     * @return $this
     */
    public function setStatus(?string $status) : static
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return null | 'Accepted' | 'SenttoDGT' | 'Ongoing' | 'Received' | 'Rejected' | 'Requested' | 'Executed' | 'Sent' | 'ToBeValidated'
     */
    public function getStatus() : ?string
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function hasStatus() : bool
    {
        return !empty($this->status);
    }

    /**
     * @param null | 'XLS' | 'XLSX' | 'DOC' | 'DOCX' | 'PPTX' | 'PPT' | 'HTM' | 'HTML' | 'RTF' | 'VSD' | 'PDF' | 'TIF' | 'ZIP' | 'TIFF' | 'TXT' | 'XML' | 'XMW' $format
     * @return $this
     */
    public function setFormat(?string $format) : static
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return null | 'XLS' | 'XLSX' | 'DOC' | 'DOCX' | 'PPTX' | 'PPT' | 'HTM' | 'HTML' | 'RTF' | 'VSD' | 'PDF' | 'TIF' | 'ZIP' | 'TIFF' | 'TXT' | 'XML' | 'XMW'
     */
    public function getFormat() : ?string
    {
        return $this->format;
    }

    /**
     * @return bool
     */
    public function hasFormat() : bool
    {
        return !empty($this->format);
    }
}

