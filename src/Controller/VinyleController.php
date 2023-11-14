<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\String\UnicodeString;

class VinyleController extends AbstractController
{
    #[Route('/')]
    public function homepage(): Response 
    {
        $musiques = [
            ['artiste' => 'Nekfeu', 'musique' => 'Risibles amours'],
            ['artiste' => 'Mz' , 'musique' => 'Eve'],
            ['artiste' => 'Damso', 'musique' => 'Signaler'],
            ['artiste' => 'Disiz', 'musique' => 'Poids lourd'],
            ['artiste' => 'Népal' , 'musique' => 'Skyclub'],
        ];
        return $this -> render('vinyl/homepage.html.twig', [
            'title' => 'Nekfeu',
            'musiques' => $musiques,
        ]);
    }

    #[Route('/browse/{slug}')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? (new UnicodeString(str_replace('-', ' ', $slug)))->title() : null;

        return $this->render('/vinyl/browse.html.twig', [
            'genre' => $genre,
        ]);
    }
}