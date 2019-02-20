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
    protected function setUp()
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
        $this->assertTrue($this->options->isBlacklisted('bar'));
        $this->assertTrue($this->options->isBlacklisted('bar', 'prop2'));

        $this->assertFalse($this->options->isBlacklisted('foo'));
        $this->assertFalse($this->options->isBlacklisted('foo', 'prop1'));
        $this->assertFalse($this->options->isBlacklisted('bar', 'prop1'));
    }

    public function testItCanUseWhitelist()
    {
        $this->assertTrue($this->options->isWhitelisted('foo'));
        $this->assertTrue($this->options->isWhitelisted('foo', 'prop1'));

        $this->assertFalse($this->options->isWhitelisted('bar'));
        $this->assertFalse($this->options->isWhitelisted('bar', 'prop2'));
        $this->assertFalse($this->options->isWhitelisted('foo', 'prop2'));
    }
}
