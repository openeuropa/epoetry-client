<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Context\PropertyContext;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;
use Phpro\SoapClient\Exception\AssemblerException;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\PropertyGenerator;

/**
 * Add methods to check if the object has a property.
 */
class HasPropertyAssembler extends AbstractAssembler
{
    /**
     * {@inheritdoc}
     */
    public function assemble(ContextInterface $context)
    {
        $property = $context->getProperty();
        $class = $context->getClass();

        $body = sprintf(
            'return !empty($this->%s);',
            $property->getName()
        );

        // Add a ::has[Property]() method.
        $hasMethodData = [
            'name' => Normalizer::generatePropertyMethod(
                'has',
                $property->getName()
            ),
            'parameters' => [],
            'visibility' => PropertyGenerator::VISIBILITY_PUBLIC,
            'body' => $body,
            'returntype' => 'bool',
            'docblock' => DocBlockGenerator::fromArray([
                'tags' => [
                    [
                        'name' => 'return',
                        'description' => 'bool',
                    ],
                ],
            ]),
        ];

        try {
            $class
                ->addMethodFromGenerator(
                    MethodGenerator::fromArray($hasMethodData)
                );
        } catch (\Exception $e) {
            throw AssemblerException::fromException($e);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function canAssemble(ContextInterface $context): bool
    {
        return $context instanceof PropertyContext;
    }
}
