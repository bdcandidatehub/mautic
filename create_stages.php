<?php

require_once __DIR__.'/app/config/bootstrap.php';

use Mautic\StageBundle\Entity\Stage;
use Mautic\StageBundle\Model\StageModel;

$container = \Mautic\CoreBundle\Helper\CoreParametersHelper::getContainer();

/** @var StageModel $stageModel */
$stageModel = $container->get('mautic.stage.model.stage');

$stages = [
    [
        'name' => 'Cold',
        'description' => 'Initial contact or lead',
        'weight' => 0,
        'isPublished' => true
    ],
    [
        'name' => 'Warm',
        'description' => 'Engaged but not ready for next step',
        'weight' => 1,
        'isPublished' => true
    ],
    [
        'name' => 'Engaged',
        'description' => 'Actively interested and moving forward',
        'weight' => 2,
        'isPublished' => true
    ],
    [
        'name' => 'Hire Ready',
        'description' => 'Ready for final hiring decision',
        'weight' => 3,
        'isPublished' => true
    ]
];

foreach ($stages as $stageData) {
    $stage = new Stage();
    $stage->setName($stageData['name']);
    $stage->setDescription($stageData['description']);
    $stage->setWeight($stageData['weight']);
    $stage->setIsPublished($stageData['isPublished']);
    
    $stageModel->saveEntity($stage);
    echo "Created stage: {$stageData['name']}\n";
}

echo "All stages created successfully!\n"; 