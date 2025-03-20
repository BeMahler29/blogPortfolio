<?php

    require_once('Manager.php');

    class ArticlesManager extends Manager {

        public function getAllArticles () {                                                      // Retourne tout les articles du plus récent au plus vieux

            $bdd = $this->connection();
            $requete = $bdd->query('SELECT * FROM articles ORDER BY date DESC');
            return $requete;

        }

        public function getArticleById ($id) {                                                   // Retourne l'article par l'id

            $bdd = $this->connection();
            $requete = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
            $requete->execute([$id]);
            return $requete;

        }

        public function getImageArticleById($id) {                                               // Retourne l'image de l'article par l'id 

            $bdd = $this->connection();
            $requete = $bdd->prepare('SELECT img FROM articles WHERE id = ?');
            $requete->execute([$id]);
            return $requete->fetchColumn();  // Retourne uniquement l'image

        }

        public function createArticle ($title, $image, $content) {                               // Crée un article 

            $bdd = $this->connection();
            
            

            $requeteUpdate = $bdd->prepare('INSERT INTO articles(title, img, content) VALUES (?, ?, ?) ');
            $result = $requeteUpdate->execute([$title, $image, $content]);            
            return $result;

        }

        public function updateArticle ($titleUpdate, $imageUpdate, $contentUpdate, $id) {        // Modifie l'article

            $bdd = $this->connection();

            if ($imageUpdate === null) {

                $requeteUpdate = $bdd->prepare('UPDATE articles SET title = ?, content = ? WHERE id = ?');
                $result = $requeteUpdate->execute([$titleUpdate, $contentUpdate, $id]);

            }
            else {

                $requeteUpdate = $bdd->prepare('UPDATE articles SET title = ?, img = ?, content = ? WHERE id = ?');
                $result = $requeteUpdate->execute([$titleUpdate, $imageUpdate, $contentUpdate, $id]);

            }
            

            return $result;

        }

        public function deleteArticle ($id) {                                                    // Supprime l'article par son id

            $bdd = $this->connection();
            $requete = $bdd->prepare('DELETE FROM articles WHERE id = ?');
            $result = $requete->execute([$id]);

            return $result;

        }

    }