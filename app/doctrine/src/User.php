<?php
//namespace Entity;

/**
 * User Entity Object (ORM)
 *
 * @author Libor Skýba
 * 
 * @Entity @Table(name="user")
 */

class User
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
    protected $login_name;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $password;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $surname;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $address;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $town;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $postcode;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $company;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $ico;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $dic;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $phone;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $email;

    /**
     * @ManyToOne(targetEntity="Role")
     */
    protected $role;

    public function getId() {
        return $this->id;
    }

    public function getLogin_name() {
        return $this->login_name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getTown() {
        return $this->town;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function getCompany() {
        return $this->company;
    }

    public function getIco() {
        return $this->ico;
    }

    public function getDic() {
        return $this->dic;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRole() {
        return $this->role;
    }

    public function setLogin_name($login_name) {
        $this->login_name = $login_name;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setSurname($surname) {
        $this->surname = $surname;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setTown($town) {
        $this->town = $town;
    }

    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    public function setCompany($company) {
        $this->company = $company;
    }

    public function setIco($ico) {
        $this->ico = $ico;
    }

    public function setDic($dic) {
        $this->dic = $dic;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setRole($role) {
        $this->role = $role;
    }

}
