<?php

    require_once('Manager.php');

    class ProjectsManager extends Manager {

        public function getAllProjects () {                                                            // Retourne tout les projets du plus récent au plus vieux

            $bdd = $this->connection();
            $requete = $bdd->query('SELECT * FROM projects ORDER BY date DESC');
            return $requete;

        }

        public function getProjectById ($id) {                                                         // Retourne le projet par l'id

            $bdd = $this->connection();
            $requete = $bdd->prepare('SELECT * FROM projects WHERE id = ?');
            $requete->execute([$id]);
            return $requete;

        }

        public function getImageProjectById($id) {                                                     // Retourne l'image du projet par son id

            $bdd = $this->connection();
            $requete = $bdd->prepare('SELECT img FROM projects WHERE id = ?');
            $requete->execute([$id]);
            return $requete->fetchColumn();          // Retourne uniquement l'image

        }

        public function createProject ($title, $image, $content) {                                     // Crée le projet            

            $bdd = $this->connection();            

            $requeteUpdate = $bdd->prepare('INSERT INTO projects(title, img, content) VALUES (?, ?, ?) ');
            $result = $requeteUpdate->execute([$title, $image, $content]);            
            return $result;

        }

        public function updateProject ($titleUpdate, $imageUpdate, $contentUpdate, $id) {              // Modifie le projet

            $bdd = $this->connection();

            if ($imageUpdate === null) {

                $requeteUpdate = $bdd->prepare('UPDATE projects SET title = ?, content = ? WHERE id = ?');
                $result = $requeteUpdate->execute([$titleUpdate, $contentUpdate, $id]);

            }
            else {

                $requeteUpdate = $bdd->prepare('UPDATE projects SET title = ?, img = ?, content = ? WHERE id = ?');
                $result = $requeteUpdate->execute([$titleUpdate, $imageUpdate, $contentUpdate, $id]);

            }
            

            return $result;

        }

        public function deleteProject ($id) {                                                          // Supprime le projet par son id

            $bdd = $this->connection();
            $requete = $bdd->prepare('DELETE FROM projects WHERE id = ?');
            $result = $requete->execute([$id]);

            return $result;

        }

    }