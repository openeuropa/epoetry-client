<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\CodeGenerator\Assembler;

use OpenEuropa\EPoetry\CodeGenerator\Assembler\FluentAdderAssembler;
use OpenEuropa\EPoetry\CodeGenerator\Assembler\FluentAdderAssemblerOptions;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;

/**
 * @internal
 * @coversNothing
 */
final class FluentAdderAssemblerTest extends AbstractAssemblerTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $whitelist = [
            'MyType' => ['prop1'],
        ];

        $this->assembler = new FluentAdderAssembler(
            (new FluentAdderAssemblerOptions())
                ->whitelist($whitelist)
        );
    }

    public function testItAssemble()
    {
        $context = $this->createContext();
        $this->assemble($context);

        $expected = <<<'CODE'
namespace MyNamespace;

class MyType
{
    /**
     * @param string ...$prop1s
     * @return $this
     */
    public function addProp1(... $prop1s) : \MyNamespace\MyType
    {
        $this->prop1 = array_merge($this->prop1, $prop1s);return $this;
    }
}

CODE;

        static::assertEquals($expected, $context->getClass()->generate());
    }

    /**
     * @param \Phpro\SoapClient\CodeGenerator\Context\ContextInterface $context
     */
    protected function assemble(ContextInterface $context)
    {
        $this->assembler->assemble($context);
    }
}
