<?php

namespace App\Transformer;

use App\Entity\Note;

class NoteTransformer
{
    public static function transform(Note $note): array
    {
        return [
            'id' => $note->getId(),
            'content' => $note->getContent()
        ];
    }
}