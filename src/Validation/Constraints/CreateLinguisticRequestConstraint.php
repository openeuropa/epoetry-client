<?php

namespace OpenEuropa\EPoetry\Validation\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 *
 * @SuppressWarnings("PMD.TooManyFields")
 */
class CreateLinguisticRequestConstraint extends Constraint
{
    public $requestedDeadlineHotlMessage = 'Requested deadline has to be empty for the "HOTL" template.';

    public $requestedDeadlineRequiredMessage = 'Requested deadline is required.';

    public $requestedDeadlinePastMessage = 'Requested deadline can not be in the past.';

    public $workflowCodeMessage = 'Workflow code "{{ code }}" is not allowed for template "{{ template }}".';

    public $contactsMinimumMessage = 'At least one "{{ role }}" contact should be presented.';

    public $contactsMaximumMessage = 'Maximum of "{{ count }}" "{{ role }}" contacts should be presented.';

    public $slaAnnexRequiredMessage = 'Choose a valid slaAnnex value: NO, ANNEX8A, ANNEX8B.';

    public $slaAnnexIgnoredMessage = 'SlaAnnex value is ignored for the "{{ product }}".';

    public $slaCommitmentIgnoredMessage = 'SlaCommitment value is ignored for the "{{ product }}".';

    public $slaCommitmentRequiredMessage = 'SlaCommitment value is required if slaAnnex is ANNEX8B.';

    public $sentViaRueSensitiveMessage = 'Sent via rue is true only if Sensitive value is true.';

    public $sentViaRueProductTypeMessage = 'Sent via rue can not be TRUE for the "{{ product }}" product type.';

    public $destinationIgnoredMessage = 'Description value is ignored for the "{{ product }}".';

    public $destinationRequiredMessage = "Choose a valid destination value:\n" .
    "- EM for Member State\n" .
    "- EXT for Citizen/Company\n" .
    "- IE for European Institutions\n" .
    "- INTERNE for Internal\n" .
    "- JO for Official Journal\n" .
    "- PUBLIC for Public";

    public $procedureIgnoredMessage = 'Procedure value is ignored for the "{{ product }}".';

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
