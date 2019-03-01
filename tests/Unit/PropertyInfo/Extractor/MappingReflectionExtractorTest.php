<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\PropertyInfo\Extractor;

use OpenEuropa\EPoetry\PropertyInfo\Extractor\MappingReflectionExtractor;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;

/**
 * Class EpoetryReflectionExtractorTest.
 *
 * @internal
 * @coversNothing
 */
final class MappingReflectionExtractorTest extends TestCase
{
    /**
     * Data provider.
     *
     * @return array
     */
    public function getTypesCases(): array
    {
        return $this->getFixture(__DIR__ . '/../../../fixtures/PropertyInfo/Extractor/mapping-reflection-extractor.yml');
    }

    /**
     * @dataProvider getTypesCases
     *
     * @param mixed $input
     */
    public function testGetTypes($input): void
    {
        $reflectionExtractor = new MappingReflectionExtractor();

        $parent = $input['parent'];

        foreach ($input['properties'] as $property => $property_type) {
            /** @var \Symfony\Component\PropertyInfo\Type $type */
            $type = $reflectionExtractor->getTypes($parent, $property);
            $this->assertArrayHasKey(0, $type);

            if (!$type[0]->getClassName()) {
                $a = 1;
            }

            $this->assertEquals($property_type, $type[0]->getClassName());
        }
    }

    /**
     * Get the content of the fixture.
     *
     * @param string $filename
     *   The filename
     *
     * @return array
     *   The array
     */
    private function getFixture(string $filename): array
    {
        return Yaml::parseFile($filename);
    }
}
