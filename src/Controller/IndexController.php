<?php

namespace App\Controller;

use App\Entity\Link;
use App\Form\LinkType;
use App\Repository\LinkRepository;
use App\Service\HashingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Request $request, HashingService $hasingService, LinkRepository $linkRepository): Response
    {
        $link = new Link();
        $form = $this->createForm(LinkType::class, $link);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $url = $form->getData()->getUrl();
            if ($existingLink = $linkRepository->findOneBy(['url' => $url])) {
                $link = $existingLink;
            } else {
                $link->setHash($hasingService->generate());
                $em = $this->getDoctrine()->getManager();
                $em->persist($link);
                $em->flush();
            }
            return $this->redirectToRoute('view', ['hash' => $link->getHash()]);
        }
        return $this->render('index/index.html.twig', [
            'url_form' => $form->createView(),
        ]);
    }
}
