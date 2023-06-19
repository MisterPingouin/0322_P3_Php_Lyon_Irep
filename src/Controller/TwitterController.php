<?php

namespace App\Controller;

use App\Service\TwitterService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TwitterController extends AbstractController
{
    #[Route('/twitter', name: 'app_twitter')]
    public function index(TwitterService $twitterService): Response
    {
        // Créer une URL de connexion et rediriger l'utilisateur vers celle-ci
        $url = $twitterService->createLoginUrl();

        return $this->render('twitter/index.html.twig', [
            'login_url' => $url,
        ]);
    }
}
