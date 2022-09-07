<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\CodeGenerator\Assembler;

use OpenEuropa\EPoetry\CodeGenerator\Assembler\ArrayGetterAssembler;
use OpenEuropa\EPoetry\CodeGenerator\Assembler\ArrayGetterAssemblerOptions;
use Phpro\SoapClient\CodeGenerator\Assembler\GetterAssembler;
use Phpro\SoapClient\CodeGenerator\Assembler\GetterAssemblerOptions;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;

/**
 * @internal
 * @coversNothing
 */
final class ArrayGetterAssemblerTest extends AbstractAssemblerTest
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

        $this->assembler = new ArrayGetterAssembler(
            (new ArrayGetterAssemblerOptions())
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
     * @return string[]|array|null
     */
    public function getProp1() : ?array
    {
        return $this->prop1;
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
        $originalAssembler = new GetterAssembler((new GetterAssemblerOptions())
            ->withReturnType()
            ->withReturnNull());
        $originalAssembler->assemble($context);
        $this->assembler->assemble($context);
    }
}
