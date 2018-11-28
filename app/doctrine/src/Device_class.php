<?php
//namespace Entity;

/**
 * Device_class Entity Object (ORM)
 *
 * @author Libor Skýba
 * 
 * @Entity @Table(name="device_class")
 */

class Device_class {

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
