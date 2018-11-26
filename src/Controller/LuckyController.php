<?php
/**
 * Lucky controller file
 *
 * PHP Version 7.2
 *
 * @category Controller
 * @package  Controller
 * @author   Gaëtan Rolé-Dubruille <gaetan@wildcodeschool.fr>
 */
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Flight controller.
 *
 * @Route("lucky")
 *
 * @category Controller
 * @package  Controller
 * @author   Gaëtan Rolé-Dubruille <gaetan@wildcodeschool.fr>
 */
class LuckyController extends AbstractController
{
    /**
     * Just a random function
     *
     * @Route("/number", name="lucky_number")
     * @throws           \Exception if it was not possible to
     * gather sufficient entropy.
     * @return           Response A Response instance
     */
    public function number()
    {
        $number = random_int(0, 100);

        return $this->render(
            'lucky/number.html.twig', [
            'number' => $number,
            ]
        );
    }
}
