<?php

namespace Model;

use Nette;
use Nette\Security as NS;


/**
 * Users management.
 */
class UserManager extends Nette\Object implements Nette\Security\IAuthenticator
{
    public $database;

    function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

    function authenticate(array $credentials)
    {
        list($username, $password) = $credentials;
        $row = $this->database->table('user')
            ->where('login_name', $username)->fetch();

        if (!$row) {
            throw new NS\AuthenticationException('User not found.');
        }

//        if ($row->password !== md5($password)) {

        if ($row->password !== $password) {
            throw new NS\AuthenticationException('Invalid password.');
        }

        return new NS\Identity($row->id, $row->role_id);
    }
    
}
