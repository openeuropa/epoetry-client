<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates \OpenEuropa\EPoetry\Notification\Type\Product class.
 */
class ProductConstraintValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($product, Constraint $constraint): void
    {
        if (!$constraint instanceof ProductConstraint) {
            throw new UnexpectedTypeException($constraint, ProductConstraint::class);
        }

        /** @var \OpenEuropa\EPoetry\Notification\Type\Product $product */
        if ($product->hasStatus() && $product->getStatus() === 'Ongoing' && !$product->hasAcceptedDeadline()) {
            $this->context->buildViolation($constraint->propertyRequiredMessage)
                ->atPath('acceptedDeadline')
                ->setParameter('{{ property }}', 'acceptedDeadline')
                ->setParameter('{{ status }}', 'Ongoing')
                ->addViolation();
        }

        if ($product->hasAcceptedDeadline() && $product->getAcceptedDeadline()->getTimestamp() < time()) {
            // Accepted deadline can not be in the past.
            $this->context->buildViolation($constraint->acceptedDeadlinePastMessage)
                ->atPath('acceptedDeadline')
                ->addViolation();
        }
    }
}
