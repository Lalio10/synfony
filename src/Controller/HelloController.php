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

    /**
     * @Route("/hello/{name}/{times}")
    )
     */
    public function helloManyTime(string $name, int $times = 3)
    {
        if ($times <= 0 || $times > 10) {
            $times = 3;
        }
        return $this->render('hello/hellomanytimes.html.twig', ['name' => $name, 'times' => $times]);
    }
}
