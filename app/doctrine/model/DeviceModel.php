<?php
//namespace Model;

/**
 * Device Model
 *
 * @author Libor Skýba
 */

class DeviceModel {

    /**
     * 
     * @param Device $device
     * @return int $device->id
     */
    public static function insert($device) {
                
        $entityManager = EntityModel::entityManager();
        $entityManager->persist($device);
        $entityManager->flush();

        return $device->getId();      
        
    }
    
    /**
     * 
     * @param int $deviceId
     * @param Device $deviceEdited
     * @return int $device->id
     */
    public static function updateId($deviceId,$deviceEdited) {
                
        $entityManager = EntityModel::entityManager();

        $device = $entityManager->find('Device', $deviceId);
        $device->setName($deviceEdited->getName());
        $device->setProducer($deviceEdited->getProducer());
        $device->setSerial_number($deviceEdited->getSerial_number());

        $entityManager->persist($device);
        $entityManager->flush();
        
        return $device->getId();      
    }
    
    /**
     * 
     * @param int $deviceId
     * @param int $device_classId
     */
    public static function setDevice_class($deviceId,$device_classId) {
                
        $entityManager = EntityModel::entityManager();
        
        $device = $entityManager->find('Device', $deviceId);
        $device_class = $entityManager->find('Device_class', $device_classId);
        $device->setDevice_class($device_class);        
        
        $entityManager->merge($device);
        $entityManager->flush();
        
    }

    /**
     * 
     * @param int $deviceId
     * @param int $ownerId
     */
    public static function setOwner($deviceId,$ownerId) {
                
        $entityManager = EntityModel::entityManager();
        
        $device = $entityManager->find('Device', $deviceId);
        $owner = $entityManager->find('User', $ownerId);
        $device->setOwner($owner);        
        
        $entityManager->merge($device);
        $entityManager->flush();
        
    }

    /**
     * 
     * @return collectionOfDevice $devices
     */
    public static function findAll() {
                
        $entityManager = EntityModel::entityManager();
        
        $productRepository = $entityManager->getRepository('Device');
        $devices = $productRepository->findAll();
        
        return $devices;      
        
    }

    /**
     * 
     * @param int $deviceId
     * @return Device $device
     */
    public static function findById($deviceId) {
                
        $entityManager = EntityModel::entityManager();
        $device = $entityManager->find('Device', $deviceId);
        
        return $device;      
        
    }
    
    /**
     * 
     * @param User $owner
     * @return collectionOfClass $devices
     */
    public static function findByOwner($owner) {
                
        $entityManager = EntityModel::entityManager();
        
        $productRepository = $entityManager->getRepository('Device');
        $devices = $productRepository->findBy(array('owner' => $owner));

        return $devices;      
        
    }

    /**
     * 
     * @param Device $device
     * @return array $deviceArray
     */
    public static function toArray($device) {                

        $deviceArray["id"] = $device->getId();
        $deviceArray["name"] = $device->getName();
        $deviceArray["producer"] = $device->getProducer();
        $deviceArray["serial_number"] = $device->getSerial_number();
        $deviceArray["device_class"] = $device->getDevice_class();
        $deviceArray["owner"] = $device->getOwner();
        
        return $deviceArray;      
        
    }
        
}
