<?php


namespace App\Controller\Front;

use App\Repository\DesignerRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class DesignerController extends AbstractController
{
    #[Route("designer", name: "designer_list")]
    public function designerList(DesignerRepository $designerRepository)
    {
        $designer = $designerRepository->findAll();

        return $this->render("front/designer.html.twig",['designer'=> $designer]);

    }

    #[Route("design/{id}", name: "design_show")]
    public function designShow($id, DesignerRepository $designerRepository)
    {
        $design = $designerRepository->find($id);

        return $this->render("front/design.html.twig",['design'=>$design]);
    }

}