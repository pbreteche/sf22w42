<?php

namespace App\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\SimpleArrayType;

class SpaceDelimitedType extends SimpleArrayType
{
    public const NAME = 'space_delimited';

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (!$value) {
            return null;
        }

        return implode(' ', $value);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (!$value) {
            return [];
        }

        $value = is_resource($value) ? stream_get_contents($value) : $value;

        return explode(' ', $value);
    }

    public function getName(): string
    {
        return self::NAME;
    }

}