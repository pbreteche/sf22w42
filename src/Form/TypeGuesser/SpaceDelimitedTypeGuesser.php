<?php

namespace App\Form\TypeGuesser;

use App\Form\SpaceDelimitedType as SpaceDelimitedFormType;
use App\Types\SpaceDelimitedType;
use Doctrine\ORM\Mapping\ClassMetadata;
use Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormTypeGuesserInterface;
use Symfony\Component\Form\Guess\Guess;
use Symfony\Component\Form\Guess\TypeGuess;
use Symfony\Component\Form\Guess\ValueGuess;

class SpaceDelimitedTypeGuesser extends DoctrineOrmTypeGuesser implements FormTypeGuesserInterface
{
    public function guessType(string $class, string $property): ?TypeGuess
    {
        /** @TODO implements my own getMetadata to prevent extending all DoctrineOrmGuesser */
        $ret = $this->getMetadata($class);
        /** @var $metadata ClassMetadata */
        [$metadata, $name] = $ret;

        if (SpaceDelimitedType::NAME == $metadata->getTypeOfField($property)) {
            return new TypeGuess(SpaceDelimitedFormType::class, [], Guess::VERY_HIGH_CONFIDENCE);
        }

        return new TypeGuess(TextType::class, [], Guess::LOW_CONFIDENCE);
    }

    public function guessMaxLength(string $class, string $property): ?ValueGuess
    {
        return null;
    }

    public function guessPattern(string $class, string $property): ?ValueGuess
    {
        return null;
    }
}