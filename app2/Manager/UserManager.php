<?php
namespace App\Manager;

class UserManager extends Manager {

    public function update($password) {
        $req = $this->db->prepare('UPDATE users SET password = :password WHERE id = 1');
        $req->execute(array(
            'password' => $password,
        ));
    }

    public function getPassword() {
        $req = $this->db->query('SELECT password FROM users WHERE id = 1');
        $result = $req->fetch();
        $password = $result['password'];
        return $password;
    }
}