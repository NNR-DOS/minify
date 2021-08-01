<?php

namespace App\Controller;

use App\Entity\Link;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewController extends AbstractController
{
    #[Route('/view/{hash}', name: 'view')]
    public function index(Request $request, Link $url): Response
    {
        return $this->render('view/index.html.twig', [
            'url' => $url,
            'schemeAndHost' => $request->getSchemeAndHttpHost(),
        ]);
    }
}
