<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Base class for constraints.
 */
abstract class BaseConstraint extends Constraint
{
    /**
     * {@inheritdoc}
     */
    public function getTargets(): array|string
    {
        return self::CLASS_CONSTRAINT;
    }
}
