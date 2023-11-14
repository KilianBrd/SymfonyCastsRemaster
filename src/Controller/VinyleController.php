<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VinyleController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response 
    {
        $musiques = [
            ['artiste' => 'Nekfeu', 'musique' => 'Risibles amours'],
            ['artiste' => 'Milan Kundera' , 'musique' => 'Risibles amours'],
            ['artiste' => 'Jack London', 'musique' => 'Martin Eden'],
            ['artiste' => 'Albert Camus', 'musique' => 'L\'étranger'],
            ['artiste' => 'John Fante' , 'musique' => 'Demande à la poussière'],
        ];
        return $this -> render('vinyl/homepage.html.twig', [
            'title' => 'Nekfeu',
            'musiques' => $musiques,
        ]);
    }

    #[Route('/browse/{album}')]
    public function browse(string $album): Response
    {
        $titre = str_replace('-', ' ', $album); //remplace des termes

        return new Response('Album : ' . $titre);
    }
}