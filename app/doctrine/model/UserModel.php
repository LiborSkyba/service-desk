<?php
//namespace Model;



/**
 * User Model
 *
 * @author Libor Skýba
 */

class UserModel {
    
    /**
     * 
     * @param User $user
     * @return int $user->id
     */
    public static function insert($user) {
                
        $entityManager = EntityModel::entityManager();
        $entityManager->persist($user);
        $entityManager->flush();

        return $user->getId();      
        
    }
    
    /**
     * 
     * @param int $userId
     * @param User $userEdited
     * @return int $user->id
     */
    public static function updateId($userId,$userEdited) {
                
        $entityManager = EntityModel::entityManager();

        $user = $entityManager->find('User', $userId);
        $user->setLogin_name($userEdited->getLogin_name());
        $user->setPassword($userEdited->getPassword());
        $user->setName($userEdited->getName());
        $user->setSurname($userEdited->getSurname());
        $user->setAddress($userEdited->getAddress());
        $user->setTown($userEdited->getTown());
        $user->setPostcode($userEdited->getPostcode());
        $user->setCompany($userEdited->getCompany());
        $user->setIco($userEdited->getIco());
        $user->setDic($userEdited->getDic());
        $user->setPhone($userEdited->getPhone());
        $user->setEmail($userEdited->getEmail());

        $entityManager->persist($user);
        $entityManager->flush();
        
        return $user->getId();      
    }
    
    /**
     * 
     * @param int $userId
     * @param int $roleId
     */
    public static function setRole($userId,$roleId) {
                
        $entityManager = EntityModel::entityManager();
        
        $user = $entityManager->find('User', $userId);
        $role = $entityManager->find('Role', $roleId);
        $user->setRole($role);        
        
        $entityManager->merge($user);
        $entityManager->flush();
        
    }

    /**
     * 
     * @param type $userId
     * @return User $user
     */
    public static function findById($userId) {
                
        $entityManager = EntityModel::entityManager();
        $user = $entityManager->find('User', $userId);
        
        return $user;      
        
    }
    
    /**
     * 
     * @return collectionOfUser $technicians
     */
    public static function findTechnicians(){
                
        $entityManager = EntityModel::entityManager();

        $role = $entityManager->find('Role', 2);
        $productRepository = $entityManager->getRepository('User');
        $technicians = $productRepository->findBy(array('role' => $role));
        
        return $technicians;      
        
    }
        
    /**
     * 
     * @param User $user
     * @return array $userArray
     */
    public static function toArray($user) {                

        $userArray["id"] = $user->getId();
        $userArray["login_name"] = $user->getLogin_name();
        $userArray["password"] = $user->getPassword();
        $userArray["name"] = $user->getName();
        $userArray["surname"] = $user->getSurname();
        $userArray["address"] = $user->getAddress();
        $userArray["town"] = $user->getTown();
        $userArray["postcode"] = $user->getPostcode();
        $userArray["company"] = $user->getCompany();
        $userArray["ico"] = $user->getIco();
        $userArray["dic"] = $user->getDic();
        $userArray["phone"] = $user->getPhone();
        $userArray["email"] = $user->getEmail();
        $userArray["role"] = $user->getRole();
        
        return $userArray;      
        
    }
    
}
