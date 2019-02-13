<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class DgtDocumentIn
{
    /**
     * @var string
     */
    protected $file;

    /**
     * @var string
     */
    protected $format;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $type;

    /**
     * @return null|string
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * @return null|string
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $file
     *
     * @return $this
     */
    public function setFile(string $file): DgtDocumentIn
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @param string $format
     *
     * @return $this
     */
    public function setFormat(string $format): DgtDocumentIn
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): DgtDocumentIn
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type): DgtDocumentIn
    {
        $this->type = $type;

        return $this;
    }
}
