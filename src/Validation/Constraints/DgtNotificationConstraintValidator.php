<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use OpenEuropa\EPoetry\Notification\Type\DgtNotification;

/**
 * Validates DgtNotification class.
 */
class DgtNotificationConstraintValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($dgtNotification, Constraint $constraint): void
    {
        if (!$constraint instanceof DgtNotificationConstraint) {
            throw new UnexpectedTypeException($constraint, RequestDetailsInConstraint::class);
        }

        $this->validateNotificationType($dgtNotification, $constraint);
    }

    /**
     * Validates products value.
     */
    protected function validateNotificationType(DgtNotification $dgtNotification, Constraint $constraint): void
    {
        if (!$dgtNotification->hasNotificationType()) {
            return;
        }

        $notificationType = $dgtNotification->getNotificationType();
        if ($notificationType === 'RequestStatusChange' && !$dgtNotification->hasLinguisticRequest()) {
            $this->context->buildViolation($constraint->propertyRequiredMessage)
                ->atPath('notificationType')
                ->setParameter('{{ property }}', 'linguisticRequest')
                ->setParameter('{{ notificationType }}', $notificationType)
                ->addViolation();
        }
    }
}
