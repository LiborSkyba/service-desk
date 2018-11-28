<?php
//namespace Entity;

/**
 * Device Entity Object (ORM)
 *
 * @author Libor Skýba
 * 
 * @Entity @Table(name="device")
 */

class Device
{
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

    /**
     * @Column(type="string")
     * @var string
     */
    protected $producer;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $serial_number;

    /**
     * @ManyToOne(targetEntity="Device_class")
     */
    protected $device_class;

    /**
     * @ManyToOne(targetEntity="User")
     */
    protected $owner;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getProducer() {
        return $this->producer;
    }

    public function getSerial_number() {
        return $this->serial_number;
    }

    public function getDevice_class() {
        return $this->device_class;
    }

    public function getOwner() {
        return $this->owner;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setProducer($producer) {
        $this->producer = $producer;
    }

    public function setSerial_number($serial_number) {
        $this->serial_number = $serial_number;
    }

    public function setDevice_class($device_class) {
        $this->device_class = $device_class;
    }

    public function setOwner($owner) {
        $this->owner = $owner;
    }
   
}
