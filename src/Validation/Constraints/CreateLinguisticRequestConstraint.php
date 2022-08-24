<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CreateLinguisticRequestConstraint extends Constraint
{
    public $requestedDeadlineRequiredMessage = '"requestedDeadline" is required.';

    public $requestedDeadlinePastMessage = '"requestedDeadline" cannot be in the past.';

    public $workflowCodeMessage = '"workflowCode" "{{ code }}" is not allowed for template "{{ template }}".';

    public $contactsMinimumMessage = 'At least one "{{ role }}" contact should be presented.';

    public $contactsMaximumMessage = 'Maximum of "{{ count }}" "{{ role }}" contacts should be presented.';

    public $slaAnnexRequiredMessage = 'Choose a valid "slaAnnex" value: NO, ANNEX8A, ANNEX8B.';

    public $slaCommitmentRequiredMessage = '"slaCommitment" value is required if "slaAnnex" is ANNEX8B.';

    public $sentViaRueSensitiveMessage = '"sentViaRue" can be set to "true" only if "sensitive" value is also set to "true".';

    public $sentViaRueProductTypeMessage = '"sentViaRue" cannot be set to "true" for the following "{{ product }}" product type.';

    public $destinationRequiredMessage = "Choose a valid destination value:\n" .
    "- EM for Member State\n" .
    "- EXT for Citizen/Company\n" .
    "- IE for European Institutions\n" .
    "- INTERNE for Internal\n" .
    "- JO for Official Journal\n" .
    "- PUBLIC for Public";

    public $procedureRequiredMessage = "Choose a valid procedure value:\n" .
    "- DEGHP for Documents e-Greffe hors procedures\n" .
    "- NEANT for None\n" .
    "- PROAC for Expedited Written Procedure\n" .
    "- PROCD for Delegation procedure\n" .
    "- PROCE for Written Procedure\n" .
    "- PROCH for Empowerment procedure\n" .
    "- PROCO for Oral Procedure\n" .
    "- REUNAU for Other Meeting\n" .
    "- REUNCS for Council Meeting";

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
