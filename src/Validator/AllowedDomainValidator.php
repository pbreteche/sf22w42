<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AllowedDomainValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        /* @var AllowedDomain $constraint */

        if (null === $value || '' === $value) {
            return;
        }

        $domainFound = false;

        foreach ($constraint->domains as $domain) {
            if (0 === strrpos($value, $domain)) {
                $domainFound = true;
                break;
            }
        }

        if (!$domainFound) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }
    }
}
