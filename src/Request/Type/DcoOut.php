<?php

namespace OpenEuropa\EPoetry\Request\Type;

class DcoOut
{
    /**
     * @var null | string
     */
    private $applicationName = null;

    /**
     * @var null | \DateTimeInterface
     */
    private $deadline = null;

    /**
     * @var null | string
     */
    private $fileName = null;

    /**
     * @var null | 'XLS' | 'XLSX' | 'DOC' | 'DOCX' | 'PPTX' | 'PPT' | 'HTM' | 'HTML' | 'RTF' | 'VSD' | 'PDF' | 'TIF' | 'ZIP' | 'TIFF' | 'TXT' | 'XML' | 'XMW'
     */
    private $format = null;

    /**
     * @var null | 'ML' | 'EN' | 'FR' | 'DE' | 'BG' | 'HR' | 'CS' | 'DA' | 'NL' | 'ET' | 'FI' | 'EL' | 'HU' | 'GA' | 'IT' | 'LV' | 'LT' | 'MT' | 'PL' | 'PT' | 'RO' | 'SK' | 'SL' | 'ES' | 'SV' | 'AF' | 'SQ' | 'AM' | 'AR' | 'HY' | 'AZ' | 'EU' | 'BE' | 'BI' | 'BO' | 'BR' | 'CN' | 'CA' | 'ZH' | 'KW' | 'CO' | 'EG' | 'EO' | 'FO' | 'FY' | 'GD' | 'GL' | 'KA' | 'GU' | 'IW' | 'HI' | 'IS' | 'IN' | 'JA' | 'KL' | 'KK' | 'KY' | 'KO' | 'KU' | 'LA' | 'LN' | 'LU' | 'MK' | 'MG' | 'MS' | 'GV' | 'MR' | 'MO' | 'MN' | 'ME' | 'SE' | 'NO' | 'NB' | 'NN' | 'OC' | 'AU' | 'PS' | 'PA' | 'FA' | 'RM' | 'RU' | 'SC' | 'SR' | 'SH' | 'SW' | 'TG' | 'TH' | 'TI' | 'TR' | 'UK' | 'UR' | 'UZ' | 'VI' | 'WO' | 'CY' | 'JI' | 'YO' | 'ZZ'
     */
    private $language = null;

    /**
     * @var null | string
     */
    private $remark = null;

    /**
     * @var null | 'SenttoDGT' | 'Received' | 'Accepted' | 'Rejected' | 'Cancelled' | 'Suspended' | 'Executed' | 'ToBeValidated'
     */
    private $status = null;

    /**
     * @param null | string $applicationName
     * @return $this
     */
    public function setApplicationName(?string $applicationName): static
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getApplicationName(): ?string
    {
        return $this->applicationName;
    }

    /**
     * @return bool
     */
    public function hasApplicationName(): bool
    {
        return !empty($this->applicationName);
    }

    /**
     * @param null | \DateTimeInterface $deadline
     * @return $this
     */
    public function setDeadline(?\DateTimeInterface $deadline): static
    {
        $this->deadline = $deadline;
        return $this;
    }

    /**
     * @return null | \DateTimeInterface
     */
    public function getDeadline(): ?\DateTimeInterface
    {
        return $this->deadline;
    }

    /**
     * @return bool
     */
    public function hasDeadline(): bool
    {
        return !empty($this->deadline);
    }

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
     * @param null | string $remark
     * @return $this
     */
    public function setRemark(?string $remark): static
    {
        $this->remark = $remark;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getRemark(): ?string
    {
        return $this->remark;
    }

    /**
     * @return bool
     */
    public function hasRemark(): bool
    {
        return !empty($this->remark);
    }

    /**
     * @param null | 'SenttoDGT' | 'Received' | 'Accepted' | 'Rejected' | 'Cancelled' | 'Suspended' | 'Executed' | 'ToBeValidated' $status
     * @return $this
     */
    public function setStatus(?string $status): static
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return null | 'SenttoDGT' | 'Received' | 'Accepted' | 'Rejected' | 'Cancelled' | 'Suspended' | 'Executed' | 'ToBeValidated'
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function hasStatus(): bool
    {
        return !empty($this->status);
    }
}

