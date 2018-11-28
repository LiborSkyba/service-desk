<?php
// namespace Model;

/**
 * Request Model
 *
 * @author Libor Skýba
 */

class RequestModel {

    /**
     * 
     * @param Request $request
     * @return int $request->id
     */
    public static function insert($request) {
                
        $entityManager = EntityModel::entityManager();
        $entityManager->persist($request);
        $entityManager->flush();

        return $request->getId();      
        
    }

    /**
     * 
     * @param int $requestId
     * @param Request $requestEdited
     * @return int $request->id
     */
    public static function update($requestId,$requestEdited) {
                
        $entityManager = EntityModel::entityManager();

        $request = $entityManager->find('Request', $requestId);
        $request->setTitle($requestEdited->getTitle());
        $request->setDescription($requestEdited->getDescription());

        $entityManager->persist($request);
        $entityManager->flush();
        
        return $request->getId();      
    }
    
    /**
     * 
     * @param int $requestId
     * @param int $ownerId
     */
    public static function setOwner($requestId,$ownerId) {
                
        $entityManager = EntityModel::entityManager();
        
        $request = $entityManager->find('Request', $requestId);
        $owner = $entityManager->find('User', $ownerId);
        $request->setOwner($owner);        
        
        $entityManager->merge($request);
        $entityManager->flush();
        
    }

    /**
     * 
     * @param int $requestId
     * @param int $deviceId
     */
    public static function setDevice($requestId,$deviceId) {
                
        $entityManager = EntityModel::entityManager();
        
        $request = $entityManager->find('Request', $requestId);
        $device = $entityManager->find('Device', $deviceId);
        $request->setDevice($device);        
        
        $entityManager->merge($request);
        $entityManager->flush();
        
    }

    /**
     * 
     * @param int $requestId
     * @param int $request_classId
     */
    public static function setRequest_class($requestId,$request_classId) {
                
        $entityManager = EntityModel::entityManager();
        
        $request = $entityManager->find('Request', $requestId);
        $request_class = $entityManager->find('Request_class', $request_classId);
        $request->setRequest_class($request_class);        
        
        $entityManager->merge($request);
        $entityManager->flush();
        
    }

    /**
     * 
     * @param int $requestId
     * @param int $request_statusId
     */
    public static function setRequest_status($requestId,$request_statusId) {
                
        $entityManager = EntityModel::entityManager();
        
        $request = $entityManager->find('Request', $requestId);
        $request_status = $entityManager->find('Request_status', $request_statusId);
        $request->setRequest_status($request_status);        
        
        $entityManager->merge($request);
        $entityManager->flush();
        
    }

    /**
     * 
     * @param int $requestId
     * @param User $technicianId
     */
    public static function setTechnician($requestId, $technicianId) {
                
        $entityManager = EntityModel::entityManager();
        
        $request = $entityManager->find('Request', $requestId);
        $technician = $entityManager->find('User', $technicianId);
        $request->setTechnician($technician);        
        
        $entityManager->merge($request);
        $entityManager->flush();        
        
    }

    /**
     * 
     * @param int $requestId
     */
    public static function ended($requestId) {
                
        $entityManager = EntityModel::entityManager();
        
        $request = $entityManager->find('Request', $requestId);
        $request_status = $entityManager->find('Request_status', 5);
        $request->setEnd_time(new \DateTime());
        $request->setRequest_status($request_status);        
        
        $entityManager->merge($request);
        $entityManager->flush();
        
    }

    /**
     * 
     * @return collectionOfRequest $requests
     */
    public static function findAll() {
                
        $entityManager = EntityModel::entityManager();
        
        $productRepository = $entityManager->getRepository('Request');
        $requests = $productRepository->findAll();
        
        return $requests;      
        
    }

    /**
     * 
     * @param int $requestId
     * @return Request $request
     */
    public static function findById($requestId) {
                
        $entityManager = EntityModel::entityManager();     
        $request = $entityManager->find('Request', $requestId);

        return $request;      
        
    }

    /**
     * 
     * @param User $owner
     * @return collectionOfRequest $requests
     */
    public static function findByOwner($owner) {
                
        $entityManager = EntityModel::entityManager();
        
        $productRepository = $entityManager->getRepository('Request');
        $requests = $productRepository->findBy(array('owner' => $owner));

        return $requests;      
        
    }

    /**
     * 
     * @param User $technician
     * @return collectionOfRequest $requests
     */
    public static function findByTechnician($technician) {
                
        $entityManager = EntityModel::entityManager();
        
        $productRepository = $entityManager->getRepository('Request');
        $requests = $productRepository->findBy(array('technician' => $technician));

        return $requests;      
        
    }

    /**
     * 
     * @param Device $device
     * @return collectionOfRequest $requests
     */
    public static function findByDevice($device) {
                
        $entityManager = EntityModel::entityManager();
        
        $productRepository = $entityManager->getRepository('Request');
        $requests = $productRepository->findBy(array('device' => $device));

        return $requests;      
        
    }
    
    /**
     * 
     * @param Request $request
     * @return array $requestArray
     */
    public static function toArray($request) {                

        $requestArray["id"] = $request->getId();
        $requestArray["title"] = $request->getTitle();
        $requestArray["description"] = $request->getDescription();
        $requestArray["request_class"] = $request->getRequest_class();
        
        return $requestArray;      
        
    }
    
}
