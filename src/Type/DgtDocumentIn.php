<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class DgtDocumentIn
{
    /**
     * @var null|string
     */
    protected $file;

    /**
     * @var null|string
     */
    protected $format;

    /**
     * @var null|string
     */
    protected $name;

    /**
     * @var null|string
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
     * @return bool
     */
    public function hasFile(): bool
    {
        if (\is_array($this->file)) {
            return !empty($this->file);
        }

        return isset($this->file);
    }

    /**
     * @return bool
     */
    public function hasFormat(): bool
    {
        if (\is_array($this->format)) {
            return !empty($this->format);
        }

        return isset($this->format);
    }

    /**
     * @return bool
     */
    public function hasName(): bool
    {
        if (\is_array($this->name)) {
            return !empty($this->name);
        }

        return isset($this->name);
    }

    /**
     * @return bool
     */
    public function hasType(): bool
    {
        if (\is_array($this->type)) {
            return !empty($this->type);
        }

        return isset($this->type);
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
