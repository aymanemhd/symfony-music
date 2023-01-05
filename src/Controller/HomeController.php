<?php

namespace App\Controller;

use App\Entity\Heros;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager ){
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {

        $heros = $this->entityManager->getRepository(Heros::class)->findAll();

        return $this->render('home/index.html.twig' , [
            'heros' =>$heros
        ]);
    }
}
