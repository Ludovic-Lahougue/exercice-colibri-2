<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/article/new', name: 'create_article')]
    public function create(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleFormType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newArticle = $form->getData();
            $this->em->persist($newArticle);
            $this->em->flush();
            return $this->redirectToRoute('colibri');
        }

        return $this->render('article/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/article/edit/{id}', name: 'edit_article')]
    public function edit($id, Request $request): Response
    {
        $repository = $this->em->getRepository(Article::class);
        $article = $repository->find($id);
        $form = $this->createForm(ArticleFormType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $article->setTitre($form->get('titre')->getData());
            $article->setDescription($form->get('description')->getData());
            $article->setContenu($form->get('contenu')->getData());

            $this->em->flush();
            return $this->redirectToRoute('article', array('id' => $article->getId()));
        }

        return $this->render('article/edit.html.twig', [
            'form' => $form->createView(),
            'article' => $article
        ]);
    }

    #[Route('/article/delete/{id}', name: 'delete_article', methods: ['GET', 'DELETE'])]
    public function delete($id): Response
    {
        $repository = $this->em->getRepository(Article::class);
        $article = $repository->find($id);
        $this->em->remove($article);
        $this->em->flush();

        return $this->redirectToRoute('colibri');
    }

    #[Route('/article/{id}', name: 'article', methods: ['GET'])]
    public function index($id): Response
    {
        $repository = $this->em->getRepository(Article::class);
        $article = $repository->find($id);
        return $this->render('article/details.html.twig', [
            'article' => $article
        ]);
    }
}
