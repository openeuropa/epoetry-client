<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validates RequestDetailsIn class.
 */
class RequestDetailsInConstraintValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($requestDetailsIn, Constraint $constraint): void
    {
        if (!$constraint instanceof RequestDetailsInConstraint) {
            throw new UnexpectedTypeException($constraint, RequestDetailsInConstraint::class);
        }

        $this->validateProducts($requestDetailsIn, $constraint);
    }

    /**
     * Validates products value.
     */
    protected function validateProducts($requestDetailsIn, Constraint $constraint): void
    {
        if ($requestDetailsIn->hasOriginalDocument()
            && $requestDetailsIn->hasProducts()
            && $requestDetailsIn->getOriginalDocument()->hasLinguisticSections()
            && $requestDetailsIn->getOriginalDocument()->getLinguisticSections()->hasLinguisticSection()) {
            // If only one source language is defined in "linguisticSections", then the product list should not include that language;
            $linguisticSections = $requestDetailsIn->getOriginalDocument()->getLinguisticSections()->getLinguisticSection();

            if (count($linguisticSections) === 1) {
                $linguisticSectionOut = reset($linguisticSections);
                $language = $linguisticSectionOut->getLanguage();

                $products = $requestDetailsIn->getProducts()->getProduct();
                foreach ($products as $key => $product) {
                    if ($language === $product->getLanguage()) {
                        $this->context->buildViolation($constraint->productsLanguageMessage)
                            ->atPath("products.product[$key]")
                            ->setParameter('{{ language }}', $language)
                            ->addViolation();
                        break;
                    }
                }
            }
        }
    }
}
