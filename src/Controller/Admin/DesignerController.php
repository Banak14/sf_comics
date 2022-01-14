<?php


namespace App\Controller\Admin;

use App\Entity\Designer;
use App\Repository\DesignerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AdminDesignerController extends AbstractController
{
    #[Route("admin/designer", name: "admin_designer_list")]
    public function adminListDesigner(DesignerRepository $designerRepository)
    {
        $designer = $designerRepository->findAll();

        return $this->render("admin/designer.html.twig",['designer'=> $designer]);

    }

    #[Route("admin/design/{id}", name: "admin_design_show")]
    public function adminShowDesign($id, DesignerRepository $designerRepository)
    {
        $design = $designerRepository->find($id);

        return $this->render("admin/design.html.twig",['design'=>$design]);
    }



    #[Route("admin/update/design/{id}", name: "admin_update_design")]

    public function adminUpdateDesigner(
        $id,
        DesignerRepository $designerRepository,
        Request $request,
        EntityManagerInterface $entityManagerInterface
    ) {

        $design = $designerRepository->find($id);

        $designForm = $this->createForm(DesignType::class,$design);

        $designForm->handleRequest($request);

        if ($designForm->isSubmitted() && $designForm->isValid()) {
            $entityManagerInterface->persist($design);
            $entityManagerInterface->flush();

            return $this->redirectToRoute("admin_designer_list");
        }


        return $this->render("admin/designform.html.twig", ['comicForm' => $designForm->createView()]);
    }

    
    #[Route("admin/create/design/{id}", name: "admin_create_design")]
    public function adminCreateDesigner(Request $request, EntityManagerInterface $entityManagerInterface)
    {
        $design = new Designer();

        $designForm = $this->createForm(DesignType::class, $design);

        $designForm->handleRequest($request);

        if ($designForm->isSubmitted() && $designForm->isValid()) {
            $entityManagerInterface->persist($design);
            $entityManagerInterface->flush();

            return $this->redirectToRoute("admin_designer_list");
        }


        return $this->render("admin/designform.html.twig", ['designForm' => $designForm->createView()]);
    }

    
     #[Route("admin/delete/design/{id}", name: "admin_delete_design")]
    public function adminDeleteDesigner(
        $id,
        DesignerRepository $designerRepository,
        EntityManagerInterface $entityManagerInterface
    ) {

        $design = $designerRepository->find($id);

        $entityManagerInterface->remove($design);

        $entityManagerInterface->flush();

        return $this->redirectToRoute("admin_design_list");
    }
}


