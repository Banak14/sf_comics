<?php

namespace App\Controller\Front;

use App\Entity\Editor;
use App\Repository\EditorRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminEditorController extends AbstractController
{
    #[Route("admin/editors", name: "admin_editor_list")]
    public function adminListEditor(EditorRepository $editorRepository)
    {
        $editors = $editorRepository->findAll();
        return $this->render("admin/editors.html.twig",['editors'=>$editors]);

    }

    #[Route("admin/editor/{id}", name: "admin_editor_show")]
    public function adminShowEditor($id,EditorRepository $editorRepository)
    {
        $editor= $editorRepository->find($id);
        
        return $this->render("admin/editor.html.twig",['editor'=>$editor]);

    }


    #[Route("admin/update/editor/{id}", name:"admin_update_editor")]

    public function adminUpdateEditor(
        $id,
        EditorRepository $editorRepository,
        Request $request,
        EntityManagerInterface $entityManagerInterface
    ) {

        $editor = $editorRepository->find($id);

        $editorForm = $this->createForm(EditorType::class,$editor);

        $editorForm->handleRequest($request);

        if ($editorForm->isSubmitted() && $editorForm->isValid()) {
            $entityManagerInterface->persist($editor);
            $entityManagerInterface->flush();

            return $this->redirectToRoute("admin_editor_list");
        }


        return $this->render("admin/editorform.html.twig", ['editorForm' => $editorForm->createView()]);
    }

    
    #[Route("admin/create/editor/", name:"admin_create_editor")]
    public function adminComicCreate(Request $request, EntityManagerInterface $entityManagerInterface)
    {
        $editor = new Editor();

        $editorForm = $this->createForm(ProductType::class, $editor);

        $editorForm->handleRequest($request);

        if ($editorForm->isSubmitted() && $editorForm->isValid()) {
            $entityManagerInterface->persist($editor);
            $entityManagerInterface->flush();

            return $this->redirectToRoute("admin_editor_list");
        }


        return $this->render("admin/editorform.html.twig", ['editorForm' => $editorForm->createView()]);
    }

    
     #[Route("admin/delete/editor/{id}", name:"admin_delete_editor")]
    public function adminDeleteComic(
        $id,
        EditorRepository $editorRepository,
        EntityManagerInterface $entityManagerInterface
    ) {

        $editor = $editorRepository->find($id);

        $entityManagerInterface->remove($editor);

        $entityManagerInterface->flush();

        return $this->redirectToRoute("admin_editor_list");
    }
}

