<?php

namespace App\Globals;

use App\Repository\EditorRepository;

class Editors
{
    private $editorRepository;

    public function __construct(EditorRepository $editorRepository)
    {
        $this->editorRepository = $editorRepository;
    }

    public function getAll()
    {
        $geditors = $this->editorRepository->findAll();

        return $geditors;
    }
}