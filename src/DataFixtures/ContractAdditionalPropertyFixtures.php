<?php

namespace App\DataFixtures;

use App\Entity\ContractAdditionalProperty;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ContractAdditionalPropertyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /***** Cession Car ******/

        $property0 = new ContractAdditionalProperty();
        $property0->setTitle('modèle');
        $this->addReference('property0',$property0);
        $manager->persist($property0);

        $property1 = new ContractAdditionalProperty();
        $property1->setTitle('couleur');
        $this->addReference('property1',$property1);
        $manager->persist($property1);

        $property2 = new ContractAdditionalProperty();
        $property2->setTitle('immatriculation');
        $this->addReference('property2',$property2);
        $manager->persist($property2);

        $property3 = new ContractAdditionalProperty();
        $property3->setTitle('carburant');
        $this->addReference('property3',$property3);
        $manager->persist($property3);


        /********* Immo *********/

        $property4 = new ContractAdditionalProperty();
        $property4->setTitle('nombre de piece');
        $this->addReference('property4',$property4);
        $manager->persist($property4);

        $property5 = new ContractAdditionalProperty();
        $property5->setTitle('surface');
        $this->addReference('property5',$property5);
        $manager->persist($property5);

        $property6 = new ContractAdditionalProperty();
        $property6->setTitle('prix');
        $this->addReference('property6',$property6);
        $manager->persist($property6);

        $property7 = new ContractAdditionalProperty();
        $property7->setTitle('etat');
        $this->addReference('property7',$property7);
        $manager->persist($property7);

        $property8 = new ContractAdditionalProperty();
        $property8->setTitle('adresse');
        $this->addReference('property8',$property8);
        $manager->persist($property8);

        $property9 = new ContractAdditionalProperty();
        $property9->setTitle('nombre de chambre');
        $this->addReference('property9',$property9);
        $manager->persist($property9);
        $manager->flush();
    }
}
