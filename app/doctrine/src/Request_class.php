<?php
//namespace Entity;

/**
 * Request_class Entity Object (ORM)
 *
 * @author Libor Skýba
 * 
 * @Entity @Table(name="request_class")
 */

class Request_class {

    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */  
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }    
    
}
