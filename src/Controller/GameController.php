<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; // Nous avons besoin d'accéder à la requête pour obtenir le numéro de page
use Knp\Component\Pager\PaginatorInterface; // Nous appelons le bundle KNP Paginator

use App\Entity\Game;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {   
        
        $games = $this->getDoctrine()
        ->getRepository(Game::class)
        ->findby([], ['name' => 'ASC']);

        $games = $paginator->paginate(
            $games, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            6 // Nombre de résultats par page
        );

        return $this->render('game/index.html.twig', [
            'game' => $games,
        ]);
    }
  


    /**
     * @Route("/games/{id}", name="games")
     */
    
    public function games($id)
    {

        $game = $this->getDoctrine()
        ->getRepository(Game::class)
        ->find($id);

        if (!$game) {
            return $this->redirectToRoute('game');
        }


        return $this->render('editor/index.html.twig', [
            'game' => $game,
        ]);
    }

}
