<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\CodeGenerator\Assembler;

use OpenEuropa\EPoetry\CodeGenerator\Assembler\HasPropertyAssembler;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;

/**
 * @internal
 * @coversNothing
 */
final class HasPropertyAssemblerTest extends AbstractAssemblerTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->assembler = new HasPropertyAssembler();
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
     * @return bool
     */
    public function hasProp1() : bool
    {
        return !empty($this->prop1);
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
