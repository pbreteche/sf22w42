<?php

namespace App\Entity;

enum PostStateEnum: string
{
    case draft = 'draft';
    case published = 'published';
    case deprecated = 'deprecated';
}
