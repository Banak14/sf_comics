<?php

namespace App\Controller\Front;

use App\Repository\ComicsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class ComicsController extends AbstractController

{
    #[Route("comics", name: "comic_list")]
    public function comicsList(ComicsRepository $comicsRepository)
    {
        $comics = $comicsRepository->findAll();

        return $this->render("front/comics.html.twig", ['comics'=>$comics]);
        
    }

    #[Route("comic/{id}", name: "comic_show")]
    public function comicShow($id,ComicsRepository $comicsRepository)
    {
        $comic = $comicsRepository->find($id);
        return $this->render("front/comic.html.twig",['product' => $comic]);
    }
}