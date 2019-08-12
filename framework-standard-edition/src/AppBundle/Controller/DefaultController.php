<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/about/{prenom}", name="about")
     */
    public function aboutAction(string $prenom, Request $request)
    {
        $prenom = ucfirst($prenom);
        return $this->render('default/about.html.twig', ['p' => $prenom]);
    }

    /**
     * @Route("/book", name="book")
     */
    public function bookAction()
    {
        $livres = [['titre' => 'DUNE', 'auteur' => 'F.HERBERT', 'parution' => new \DateTime('1965-11-11'), 'presentation' => 'une presentation'], ['titre' => 'Un titre2 ', 'auteur' => 'Un auteur 2', 'parution' => new \DateTime('1957-01-08'), 'presentation' => 'une presentation 2'], ['titre' => 'Une nouveauté', 'auteur' => 'Un auteur contemporain', 'parution' => new \DateTime('2019-08-01'), 'presentation' => 'une presentation 2']];

        return $this->render('default/book.html.twig', ['livres' => $livres]);
    }
}
