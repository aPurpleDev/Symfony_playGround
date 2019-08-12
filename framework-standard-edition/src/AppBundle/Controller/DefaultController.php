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
        $livres = [['id' => 1, 'titre' => 'DUNE', 'auteur' => 'F.HERBERT', 'parution' => new \DateTime('1965-11-11'), 'presentation' => 'The most epic space tale around'], ['id' => 2,'titre' => 'jS, novice to Ninja ', 'auteur' => 'Jon Dev', 'parution' => new \DateTime('2007-01-08'), 'presentation' => 'De novice à Ninja en quelques mois.'], ['id' => 3,'titre' => 'La fin du PHP', 'auteur' => 'Paul Mc Code', 'parution' => new \DateTime('2019-08-01'), 'presentation' => 'débat: le PHP mourrera-t-il un jour?'],['id' => 4, 'titre' => 'Les enfants de Dune', 'auteur' => 'F.HERBERT', 'parution' => new \DateTime('1965-11-11'), 'presentation' => 'The most epic space tale around']];

        return $this->render('default/book.html.twig', ['livres' => $livres]);
    }

    /**
     * @Route("/expand/{id}", name="expand")
     */
    public function expandAction(int $id = 1)
    {
        $livres = [['id' => 1, 'titre' => 'DUNE', 'auteur' => 'F.HERBERT', 'parution' => new \DateTime('1965-11-11'), 'presentation' => 'The most epic space tale around'], ['id' => 2,'titre' => 'jS, novice to Ninja ', 'auteur' => 'Jon Dev', 'parution' => new \DateTime('2007-01-08'), 'presentation' => 'De novice à Ninja en quelques mois.'], ['id' => 3,'titre' => 'La fin du PHP', 'auteur' => 'Paul Mc Code', 'parution' => new \DateTime('2019-08-01'), 'presentation' => 'débat: le PHP mourrera-t-il un jour?'],['id' => 4, 'titre' => 'Les enfants de Dune', 'auteur' => 'F.HERBERT', 'parution' => new \DateTime('1965-11-11'), 'presentation' => 'The most epic space tale around']];

        $i = 0;
        while($livres[$i]['id'] != $id)
        {
            $i++;
        }

        $livre = $livres[$i];

        return $this->render('default/expand.html.twig', ['livres'=>$livres,'id' => $id,'livre' => $livre]);
    }

    /**
     * @Route("/auteur/{auteur}", name="auteur")
     */
    public function auteurAction(string $auteur = "F.HERBERT")
    {
        $livres = [['id' => 1, 'titre' => 'DUNE', 'auteur' => 'F.HERBERT', 'parution' => new \DateTime('1965-11-11'), 'presentation' => 'The most epic space tale around'], ['id' => 2,'titre' => 'jS, novice to Ninja ', 'auteur' => 'Jon Dev', 'parution' => new \DateTime('2007-01-08'), 'presentation' => 'De novice à Ninja en quelques mois.'], ['id' => 3,'titre' => 'La fin du PHP', 'auteur' => 'Paul Mc Code', 'parution' => new \DateTime('2019-08-01'), 'presentation' => 'débat: le PHP mourrera-t-il un jour?'],['id' => 4, 'titre' => 'Les enfants de Dune', 'auteur' => 'F.HERBERT', 'parution' => new \DateTime('1965-11-11'), 'presentation' => 'The most epic space tale around']];

        $i = 0;
        while($livres[$i]['auteur'] != $auteur)
        {
            $i++;
        }

        $selection = [];
        array_push($selection,$livres[$i]);

        return $this->render('default/auteur.html.twig', ['livres'=>$livres,'selection'=>$selection]);
    }
}
