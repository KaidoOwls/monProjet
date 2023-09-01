<?php

namespace App\Service;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
//...

class MailService
{
    //On injecte l'interface ParameterBag

    private $paramBag;
    public function __construct(ParameterBagInterface $paramBag){

        $this->paramBag = $paramBag;
    }

    public function sendMail($expediteur, $destinataire, $sujet, $message){

    }
//On se sert du parameterBag et du nom du paramètre ('image_directory') pour récupèrer le chemin du dossier "images"
        $dossiers_images = $this->paramBag->get('images_directory');
//...

}