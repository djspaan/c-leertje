<?php

require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$dbParams = include('config/database.php');

$config = Setup::createAnnotationMetadataConfiguration(['/Entities'], true);

try {
    $entityManager = EntityManager::create($dbParams, $config);
} catch (\Doctrine\ORM\ORMException $e) {
    // TODO
}
