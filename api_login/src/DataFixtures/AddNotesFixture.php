<?php

namespace App\DataFixtures;

use App\Entity\Note;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;

class AddNotesFixture extends Fixture implements DependentFixtureInterface
{
    public function __construct(private EntityManagerInterface $em){

    }

    public function load(ObjectManager $manager): void
    {
        $user = $this->getReference('default_user', User::class);

        if ($user == null) {
            throw new Exception('Brak uzytkownika');
        }

        $notes = [
            'Pogoda: Słonecznie, 25°C.',
            'Spotkanie z Janem o 14:00 w kawiarni "Pod Dębem".',
            'Kupić mleko i chleb w sklepie osiedlowym.',
            'Odebrać paczkę z paczkomatu na ulicy Wiśniowej.',
            'Napisać podsumowanie projektu do 16:00.',
        ];

        foreach ($notes as $content) {
            $note = new Note();
            $note->setContent($content);
            $note->setUser($user);
            $manager->persist($note);
            $manager->flush();
        }
    }

    public function getDependencies(): array
    {
        return [
            AddUserFixture::class,
        ];
    }
}
