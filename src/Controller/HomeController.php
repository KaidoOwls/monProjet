<?php

namespace App\Controller;

use App\Repository\DiscRepository;
use App\Repository\ArtistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    //On va avoir souvent besoin d'injecter les respositories de nos entités dans les contrôleurs et les services
    //Pour ne pas les injecter dans chaque fonction, on va les instancier UNE SEULE fois dans le constructeur de notre contrôleur:
    //N'oubliez pas d'importer vos respositories (les lignes "use..." en haut de la page)
    private $artistRepo;
    private $discRepo;
    private $em;

    public function __construct(ArtistRepository $artistRepo, DiscRepository $discRepo, EntityManagerInterface $em)
    {
        $this->artistRepo = $artistRepo;
        $this->discRepo = $discRepo;
        $this->em = $em;

    }

    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {



          //on appelle le repository pour accéder à la fonction
          $artistes = $this->artistRepo->getSomeArtists("Neil");

          //on teste le contenu de la variable $artistes : dd() veut dire Dump and Die DD veut dire qu'a l'instant t tout ce qui compose la variable artiste


       // ...    

        //on appelle la fonction `findAll()` du repository de la classe `Artist` afin de récupérer tous les artists de la base de données;

        $artistes = $this->artistRepo->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            //on va envoyer à la vue notre variable qui stocke un tableau d'objets $artistes (c'est-à-dire tous les artistes trouvés dans la base de données)
            'artistes' => $artistes
        ]);
    }

}