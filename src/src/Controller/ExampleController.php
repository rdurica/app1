<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bridge\Twig\Attribute\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Attribute\Route;

class ExampleController extends AbstractController
{
    #[Route('/', name: 'example', methods: ['GET'])]
    #[Template('index.html.twig')]
    public function index(MailerInterface $mailer): array
    {
//        $email = (new Email())
//            ->from('hello@example.com')
//            ->to('you@example.com')
//            //->cc('cc@example.com')
//            //->bcc('bcc@example.com')
//            //->replyTo('fabien@example.com')
//            //->priority(Email::PRIORITY_HIGH)
//            ->subject('Time for Symfony Mailer!')
//            ->text('Sending emails is fun again!')
//            ->html('<p>See Twig integration for better HTML integration!</p>');
////
//        $mailer->send($email);
//        return $this->json('{"status": "SUCCESS"}');
        return [
            'message' => 'Hello World!',
        ];

        return $this->renderView('index.html.twig');
    }

    #[Route('/fetch', name: 'fetch', methods: ['GET'])]
    public function fetchData(): Response
    {
        return $this->json(['status' => 'success']);
    }
}
