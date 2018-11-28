<?php
//namespace Model;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

/**
 * Device Model
 *
 * @author Libor Skýba
 */

class EntityModel {

    /**
     * 
     * @return entityManager $entityManager
     */
    public static function entityManager() {

    $config = Setup::createAnnotationMetadataConfiguration(array("../src"), true);
    
    $config->setProxyDir('../tmp');
//    $config->setAutoGenerateProxyClasses(false);

    $connectSqlite = array(
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/db.sqlite',
    );

    $connectMysql = array(
    'dbname' => 'czservis',
    'user' => 'czservis',
    'password' => 'C04814FA48',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
    );

    $entityManager = EntityManager::create($connectMysql, $config);
    
    return $entityManager;
    }
}