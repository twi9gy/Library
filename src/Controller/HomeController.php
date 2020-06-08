<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request)
    {
        $books = $this->getDoctrine()
            ->getRepository(Book::class)
            ->findAll_OrderDESC();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'books' => $books,
        ]);
    }
}
