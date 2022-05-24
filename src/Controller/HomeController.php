<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/', name: 'colibri')]
    public function index(): Response
    {
        $repository = $this->em->getRepository(Article::class);
        $articles = $repository->findBy([], ['id' => 'DESC']);
        return $this->render('home.html.twig', [
            'articles' => $articles
        ]);
    }
}
