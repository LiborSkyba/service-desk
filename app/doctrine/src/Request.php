<?php
//namespace Entity;

/**
 * Request Entity Object (ORM)
 *
 * @author Libor Skýba
 * 
 * @Entity @Table(name="request")
 */

class Request
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
    protected $title;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $description;
    
    /**
     * @Column(type="datetime")
     * @var DateTime     
     */
    protected $created_time;
    
    /**
     * @Column(type="datetime")
     * @var DateTime     
     */
    protected $assigned_time;
    
    /**
     * @Column(type="datetime")
     * @var DateTime     
     */
    protected $end_time;
    
    /**
     * @ManyToOne(targetEntity="Request_status")
     */
    protected $request_status;

    /**
     * @ManyToOne(targetEntity="Request_class")
     */
    protected $request_class;

    /**
     * @ManyToOne(targetEntity="User")
     */
    protected $owner;

    /**
     * @ManyToOne(targetEntity="User")
     */
    protected $technician;

    /**
     * @ManyToOne(targetEntity="Device")
     */
    protected $device;

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCreated_time() {
        return $this->created_time;
    }

    public function getAssigned_time() {
        return $this->assigned_time;
    }

    public function getEnd_time() {
        return $this->end_time;
    }

    public function getRequest_status() {
        return $this->request_status;
    }

    public function getRequest_class() {
        return $this->request_class;
    }

    public function getOwner() {
        return $this->owner;
    }

    public function getTechnician() {
        return $this->technician;
    }

    public function getDevice() {
        return $this->device;
    }
    
    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setCreated_time(DateTime $created_time) {
        $this->created_time = $created_time;
    }

    public function setAssigned_time(DateTime $assigned_time) {
        $this->assigned_time = $assigned_time;
    }

    public function setEnd_time(DateTime $end_time) {
        $this->end_time = $end_time;
    }

    public function setRequest_status($request_status) {
        $this->request_status = $request_status;
    }

    public function setRequest_class($request_class) {
        $this->request_class = $request_class;
    }

    public function setOwner($owner) {
        $this->owner = $owner;
    }

    public function setTechnician($technician) {
        $this->technician = $technician;
    }

    public function setDevice($device) {
        $this->device = $device;
    }

   
}


