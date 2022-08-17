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

        /** @var \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetailsIn */
        if ($requestDetailsIn->hasDecideReference() && !$requestDetailsIn->hasDocumentToAdopt()) {
            $this->context->buildViolation($constraint->decideReferenceMessage)
                ->atPath('decideReference')
                ->addViolation();
        }

        $this->validateProducts($requestDetailsIn, $constraint);
    }

    /**
     * Validates products value.
     */
    protected function validateProducts($requestDetailsIn, Constraint $constraint): void
    {
        if ($requestDetailsIn->hasOriginalDocument()
            && $requestDetailsIn->getOriginalDocument()->hasLinguisticSections()
            && $requestDetailsIn->getOriginalDocument()->getLinguisticSections()->hasLinguisticSection()
            && $requestDetailsIn->hasProducts()) {
            // If there is defined just one source language in the linguisticSections, then the list of the products should not include this language;
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
