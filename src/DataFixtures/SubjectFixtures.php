<?php

namespace App\DataFixtures;

use App\Entity\Subject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SubjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $subject = ['CEJM', 'Maths', 'Anglais', 'Bloc 1', 'Bloc 2', 'Bloc 3', 'Ateliers de professionnalisation'];

        for ($i = 1; $i <= 5; $i++) {
            $classLevel = new Subject();
            $classLevel->setLabel(sprintf('%s', $faker->randomElement($subject)));
            $manager->persist($classLevel);

            $this->addReference('subject_' . $i, $classLevel);
        }

        $manager->flush();
    }

}
