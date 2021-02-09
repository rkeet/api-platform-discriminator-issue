<?php

namespace App\DataFixtures;

use App\Entity\Another;
use App\Entity\Form;
use App\Entity\Workflow;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private const WORKFLOWS = [
        [
            'name' => 'workflow 1',
            'someVar' => 'some variable 1',
        ],
        [
            'name' => 'workflow 2',
            'someVar' => 'some variable 2',
        ],
        [
            'name' => 'workflow 3',
            'someVar' => 'some variable 3',
        ]
    ];

    private const FORMS = [
        'form_1' => [
            'name' => 'form 1',
            'anothers' => [
                [
                    'name' => 'another name 1',
                ]
            ]
        ],
        'form_2' => [
            'name' => 'form 2',
            'anothers' => [
                [
                    'name' => 'another name 2',
                ],
                [
                    'name' => 'another name 3',
                ]
            ]
        ],
        'form_3' => [
            'name' => 'form 3',
            'anothers' => [
                [
                    'name' => 'another name 4',
                ]
            ]
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::WORKFLOWS as $array) {
            $entity = new Workflow($array['name'], $array['someVar']);
            $manager->persist($entity);
        }

        foreach (self::FORMS as $ref => $array) {
            $form = new Form($array['name']);

            foreach ($array['anothers'] as $anotherArray) {
                $another = new Another($anotherArray['name'], $form);
                $form->addAnother($another);

                $manager->persist($another);
            }

            $manager->persist($form);
        }

        $manager->flush();
    }
}
