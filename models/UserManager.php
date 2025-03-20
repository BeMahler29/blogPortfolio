<?php

    require_once('Manager.php');

    class UserManager extends Manager {

       
        private function securite($password) {                              // Chiffrement MDP

            $passwordSecure = "aq1".sha1($password."123")."25";
            return $passwordSecure;

        } 
        
        public function autoLogin() {                                       // AutoLog si cookie


            if(isset($_COOKIE['auth']) && !isset($_SESSION['connect'])) {

                $bdd = $this->connection();
        
                // Variable
                $secret = htmlspecialchars($_COOKIE['auth']);
        
                // Le secret existe-t-il ?
                $req = $bdd->prepare('SELECT COUNT(*) AS secretNumber FROM users WHERE secret = ?');
                $req->execute([$secret]);
        
                while($user = $req->fetch()) {
        
                    if($user['secretNumber'] == 1) {
        
                        // Lire tout ce qui concerne l'utilisateur
                        $informations = $bdd->prepare('SELECT * FROM users WHERE secret = ?');
                        $informations->execute([$secret]);
        
                        while($userInformations = $informations->fetch()) {
        
                            $_SESSION['connect']     = 1;
                            $_SESSION['userId']      = $user['id'];
                            $_SESSION['username']	 = $userInformations['username'];
                            $_SESSION['role']        = $userInformations['role']; 
        
                        }
        
                    }
        
                }
        
            }
        
        }

        public function registerUser() {                                    // Enregistrer un nouvel utilisateur

            $bdd = $this->connection();

            if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordTwo'])) {                
        
                // Variables
                $username       = htmlspecialchars($_POST['username']);
                $email			= htmlspecialchars($_POST['email']);
                $password		= htmlspecialchars($_POST['password']);
                $passwordTwo	= htmlspecialchars($_POST['passwordTwo']);
        
                // Les mots de passe sont-ils différents ?
                if($password != $passwordTwo) {
        
                    throw new Exception('Vos mots de passe ne correspondent pas.');
        
                }
        
                // L'adresse email est-elle correcte ?
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
                    throw new Exception('Votre adresse email est invalide.'); 
        
                }
                
                // L'adresse email est-elle en doublon ?
                $req = $bdd->prepare('SELECT COUNT(*) as numberEmail FROM users WHERE email = ?');
                $req->execute([$email]);
        
                while($emailVerification = $req->fetch()) {
        
                    if($emailVerification['numberEmail'] != 0) {
        
                        throw new Exception('Votre adresse email est déjà utilisée par un autre utilisateur.');
                                
                    }
        
                }
        
                // Chiffrement du mot de passe
                $password = $this->securite($password);
        
                // Secret
                $secret = sha1($email).time();
                $secret = sha1($secret).time();
        
                // Ajouter un utilisateur
                $req = $bdd->prepare('INSERT INTO users(username, email, password, secret) VALUES(?, ?, ?, ?)');
                $req->execute([$username, $email, $password, $secret]);
        
                header('location: index.php?page=login&success=1');
                exit();
        
            }

        }

        public function loginUser() {                                       // Connexion utilisateur

            $bdd = $this->connection();

            if(!empty($_POST['email']) && !empty($_POST['password'])) {

                // Variables
                $email      = htmlspecialchars($_POST['email']);                 
                $password		= htmlspecialchars($_POST['password']);    
                
                // Vérification email
		        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    throw new Exception('Votre adresse email est invalide.');                

		        }
                
                // Chiffrement du mot de passe
                $passwordSecure = $this->securite($password);

                // L'adresse email est-elle bien utilisée ?
                $req = $bdd->prepare('SELECT COUNT(*) as numberEmail FROM users WHERE email = ?');
                $req->execute([$email]);

                while($emailVerification = $req->fetch()) {

                    if($emailVerification['numberEmail'] != 1) {

                        throw new Exception('Impossible de vous authentifier correctement.');
                        
                    }

                }

                // Connexion

                $req = $bdd->prepare('SELECT * FROM users WHERE email = ?');
                $req->execute([$email]);

                while ($user = $req->fetch()) {

                    if($passwordSecure == $user['password']) {

                        if($user['blocked'] == 0) {

                            $_SESSION['connect']  = 1;
                            $_SESSION['userId']   = $user['id'];
                            $_SESSION['username'] = $user['username'];
                            $_SESSION['role']     = $user['role'];
            
                            if(isset($_POST['auto'])) {
            
                                setcookie('auth', $user['secret'], time() + 30*24*3600, '/', null, false, true);
            
                            }
            
                            header('location: index.php?page=home&success=1');
                            exit();
                        }
                        else {

                            throw new Exception('Vous avez été bannis ! HA HA HA!!!');

                        }

                        
        
                    }
                    else {
        
                        throw new Exception('Impossible de vous authentifier correctement.');
                               
                    }
                
                }
            }


            

        }

        public function logoutUser() {                                      // Déconnection utilisateur

            session_unset();             // Désactiver
            session_destroy();           // Détruire
        
            setcookie('auth', '', time() - 1);
        
            header('location: index.php');
            exit();

        }



    }