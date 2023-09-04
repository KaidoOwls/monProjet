<?php

namespace App\Service;

use Symfony\Component\BrowserKit\Response;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

//...

class MailService
{
    private $paramBag;

    public function __construct(ParameterBagInterface $paramBag)
    {
        $this->paramBag = $paramBag;
    }

    public function sendMail($expediteur, $destinataire, $sujet, $message)
    {
        // On se sert du parameterBag et du nom du paramètre ('images_directory') pour récupérer le chemin du dossier "images"
        $dossiers_images = $this->paramBag->get('images_directory');

        // Vous pouvez maintenant utiliser $dossiers_images dans votre méthode pour le traitement nécessaire.
        // ...
    }
}