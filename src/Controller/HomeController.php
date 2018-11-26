<?php
/**
 * Home controller file
 *
 * PHP Version 7.2
 *
 * @category Controller
 * @package  Controller
 * @author   Gaëtan Rolé-Dubruille <gaetan@wildcodeschool.fr>
 */
namespace App\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\CategoryType;
use App\Entity\Category;

/**
 * Home page controller.
 *
 * @category Controller
 * @package  Controller
 * @author   Gaëtan Rolé-Dubruille <gaetan@wildcodeschool.fr>
 */
class HomeController extends AbstractController
{
    /**
     * Showing home page
     *
     * @Route("/", name="homepage")
     * @return     Response A Response instance
     */
    public function index()
    {
        return $this->render('home.html.twig');
    }

    /**
     * Showing form to create category
     *
     * @Route("/category", name="addCategory")
     * @return Response A Response instance
     */
    public function category(Request $request, ObjectManager $manager)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $manager->persist($category);
            $manager->flush();
        }
        return $this->render('blog/addcategory.html.twig',[
            'form'=> $form->createView()
        ]);
    }
}