<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\File;


class MailerController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(MailerInterface $mailer): Response
    {

        $email = (new Email())
        // ...
        ->addPart(new DataPart(new File('/path/to/documents/terms-of-use.pdf')))
        // vous pouvez, si vous le souhaitez, demander aux clients mail d'afficher un certain nom pour le fichier 
        ->addPart(new DataPart(new File('/path/to/documents/privacy.pdf'), 'Privacy Policy'))
        // vous pouvez aussi spécifier le type de document (autrement, il est deviné)
        ->addPart(new DataPart(new File('/path/to/documents/contract.doc'), 'Contract', 'application/msword'))
    ;

        $email = (new TemplatedEmail())
            ->from('hello@example.com')
//            ->to('you@example.com')
            ->to(new Address('ryan@example.com'))
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')

            // le chemin de la vue Twig à utiliser dans le mail
            ->htmlTemplate('emails/signup.html.twig')

            // un tableau de variable à passer à la vue; 
           //  on choisit le nom d'une variable pour la vue et on lui attribue une valeur (comme dans la fonction `render`) :
            ->context([
                    'expiration_date' => new \DateTime('+7 days'),
                    'username' => 'foo',
                ]);

        $mailer->send($email);

        // ...
        return $this->render('emails/signup.html.twig', [
            'controller_name' => 'MailerController',
            'emails' => $mailer
        ]);
    }
}