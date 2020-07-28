<?php
namespace App\Controller\Backend;

use App\Controller\Controller;
use App\Manager\UserManager;
use App\Model\User;

class UserController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->renderer->setViewsPath("views/backend/user/");
        $this->manager = new UserManager();

        // On vérifie la connexion
        $this->isConnected();
    }

    public function edit() {
        // Affiche le formulaire pour modifier le mot de passe
        $this->response('password', [
            'title' => "Modifier votre mot de passe"
        ]);
    }

    public function update() {
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->manager->update($hash);
        header('Location:' . env("URL_PREFIX") . '/admin');
    }
}