<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\CodeGenerator\Assembler;

use OpenEuropa\EPoetry\CodeGenerator\Assembler\NullablePropertyAssembler;
use OpenEuropa\EPoetry\CodeGenerator\Assembler\NullablePropertyAssemblerOptions;
use Phpro\SoapClient\CodeGenerator\Assembler\PropertyAssembler;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;

/**
 * @internal
 * @coversNothing
 */
final class NullablePropertyAssemblerTest extends AbstractAssemblerTest
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        parent::setUp();

        $whitelist = [
            'MyType' => ['prop1'],
        ];

        $this->assembler = new NullablePropertyAssembler(
            (new NullablePropertyAssemblerOptions())
                ->whitelist($whitelist)
        );
    }

    /**
     * @param \Phpro\SoapClient\CodeGenerator\Context\ContextInterface $context
     */
    public function assemble(ContextInterface $context)
    {
        $defaultAssembler = new PropertyAssembler();
        $defaultAssembler->assemble($context);
        $this->assembler->assemble($context);
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
     * @var null|string
     */
    private $prop1;


}

CODE;

        static::assertEquals($expected, $context->getClass()->generate());
    }

    public function testItCanAssemble()
    {
        $context = $this->createContext();
        static::assertTrue($this->assembler->canAssemble($context));
    }
}
