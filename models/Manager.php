<?php 

    class Manager {


        // Fonction de connection de la Base de Données

        protected function connection() {

            try {

                $bdd = new PDO ('mysql:host=localhost;dbname=projet_passerelle_2;charset=utf8', 'root', '');

            }

            catch (Exception $e) {

                throw new Exception('Erreur :'.$e->getMessage());

            }

            return $bdd;            

        }

    }