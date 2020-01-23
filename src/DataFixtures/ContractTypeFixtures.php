<?php

namespace App\DataFixtures;

use App\Entity\ContractAdditionalProperty;
use App\Entity\ContractType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ContractTypeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $contractType = new ContractType();
        $contractType->setName('cession véhicule');
        for($x=0; $x <= 3; $x++) {
            $contractType->addAdditionalProperty($this->getReference('property' . $x));

        }
        $this->addReference('cession_car' ,$contractType);
        $manager->persist($contractType);

        $contractType1 = new ContractType();
        $contractType1->setName('immobilier');
        for($x=4; $x <= 9; $x++) {
            $contractType->addAdditionalProperty($this->getReference('property' . $x));

        }
        $this->addReference('immo' ,$contractType1);
        $manager->persist($contractType1);

        $manager->flush();
    }


    public function getDependencies()
    {
        return [ContractAdditionalPropertyFixtures::class];
    }
}
