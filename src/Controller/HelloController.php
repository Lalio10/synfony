<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello/{name}")
     */
    public function hello(string $name)
    {
        return $this->render('hello/hello.html.twig', ['name' => $name]);
    }
}
