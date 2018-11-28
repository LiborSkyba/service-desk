<?php
// namespace Model;

/**
 * Role Model
 *
 * @author Libor Skýba
 */

class RoleModel {

    /**
     * 
     * @param int $roleId
     * @return Role $role
     */
    public static function findById($roleId) {
                
        $entityManager = EntityModel::entityManager();
        $role = $entityManager->find('Role', $roleId);
        
        return $role;      
        
    }
}
