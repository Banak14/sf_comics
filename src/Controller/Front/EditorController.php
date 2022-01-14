<?php

namespace App\Controller\Front;

use App\Repository\EditorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

class EditorController extends AbstractController
{
    #[Route("editors", name: "editor_list")]
    public function editorList(EditorRepository $editorRepository)
    {
        $editors = $editorRepository->findAll();
        return $this->render("front/editors.html.twig",['editors'=>$editors]);

    }

    #[Route("editor/{id}", name: "editor_show")]
    public function editorShow($id,EditorRepository $editorRepository)
    {
        $editor= $editorRepository->find($id);
        
        return $this->render("front/editor.html.twig",['editor'=>$editor]);

    }
}