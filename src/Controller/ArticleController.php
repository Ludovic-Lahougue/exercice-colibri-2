<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/article/{id}', name: 'article', methods: ['GET', 'HEAD'])]
    public function index($id): Response
    {
        $repository = $this->em->getRepository(Article::class);
        $article = $repository->find($id);
        return $this->render('article/details.html.twig', [
            'article' => $article
        ]);
    }
}
