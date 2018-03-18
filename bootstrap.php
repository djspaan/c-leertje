<?php

require_once 'vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Importer\Client;

$dbParams = include('config/database.php');

$config = Setup::createAnnotationMetadataConfiguration(['/Entities'], true);

$entityManager = EntityManager::create($dbParams, $config);

Client::setEntityManager($entityManager);
