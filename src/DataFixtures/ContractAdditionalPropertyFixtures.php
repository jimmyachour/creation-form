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
        $property0 = new ContractAdditionalProperty();
        $property0->setTitle('modèle');
//        $property0->setContractType($this->getReference('cession_car'));
        $this->addReference('property0',$property0);
        $manager->persist($property0);

        $property1 = new ContractAdditionalProperty();
        $property1->setTitle('couleur');
//        $property1->setContractType($this->getReference('cession_car'));
        $this->addReference('property1',$property1);
        $manager->persist($property1);

        $property2 = new ContractAdditionalProperty();
        $property2->setTitle('immatriculation');
//        $property2->setContractType($this->getReference('cession_car'));
        $this->addReference('property2',$property2);
        $manager->persist($property2);

        $property3 = new ContractAdditionalProperty();
        $property3->setTitle('carburant');
//        $property3->setContractType($this->getReference('cession_car'));
        $this->addReference('property3',$property3);
        $manager->persist($property3);


        $manager->flush();
    }



}
