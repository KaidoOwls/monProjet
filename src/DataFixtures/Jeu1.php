<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Disc;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class Jeu1 extends Fixture
{
    public function load(ObjectManager $manager): void
    {
    
$artist1 = new Artist();

$artist1->setName("Queens Of The Stone Age");
$artist1->setUrl("https://qotsa.com/");
$artist1->setTitle("Diouf Sabrar");
$artist1->setPicture("bite");

$manager->persist($artist1);

$disc1 = new Disc();
$disc1->setTitle("Songs for the Deaf");
$disc1->setPicture("https://en.wikipedia.org/wiki/Songs_for_the_Deaf#/media/File:Queens_of_the_Stone_Age_-_Songs_for_the_Deaf.png");
$disc1->setLabel("Interscope Records");

$manager->persist($disc1);
$disc1->setArtist($artist1);
$manager->flush();

    }
}

