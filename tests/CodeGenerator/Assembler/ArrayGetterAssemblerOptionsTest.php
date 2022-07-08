<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\CodeGenerator\Assembler;

use OpenEuropa\EPoetry\CodeGenerator\Assembler\ArrayGetterAssemblerOptions;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 * @coversNothing
 */
final class ArrayGetterAssemblerOptionsTest extends TestCase
{
    /**
     * @var ArrayGetterAssemblerOptions
     */
    private $options;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $whitelist = [
            'foo' => ['prop1'],
        ];

        $blacklist = [
            'bar' => ['prop2'],
        ];

        $this->options = (new ArrayGetterAssemblerOptions())
            ->whitelist($whitelist)
            ->blacklist($blacklist);
    }

    public function testItCanUseABlacklist()
    {
        static::assertTrue($this->options->isBlacklisted('bar'));
        static::assertTrue($this->options->isBlacklisted('bar', 'prop2'));

        static::assertFalse($this->options->isBlacklisted('foo'));
        static::assertFalse($this->options->isBlacklisted('foo', 'prop1'));
        static::assertFalse($this->options->isBlacklisted('bar', 'prop1'));
    }

    public function testItCanUseWhitelist()
    {
        static::assertTrue($this->options->isWhitelisted('foo'));
        static::assertTrue($this->options->isWhitelisted('foo', 'prop1'));

        static::assertFalse($this->options->isWhitelisted('bar'));
        static::assertFalse($this->options->isWhitelisted('bar', 'prop2'));
        static::assertFalse($this->options->isWhitelisted('foo', 'prop2'));
    }
}
