<?php

    require_once('Manager.php');

    class TestimonialsManager extends Manager {

        public function getArticleTestimonials($articleId) {                                             // Voir les commentaires des articles

            $bdd = $this->connection();

            $reqTestimonials = $bdd->prepare('SELECT testimonials.*, users.username 
                	                  FROM testimonials 
                                      INNER JOIN users
                                      ON testimonials.user_id = users.id
                                      WHERE testimonials.article_id = ?
                                      ORDER BY date_create DESC');

            $reqTestimonials->execute([$articleId]); 
            return $reqTestimonials;            

        }

        public function getProjectTestimonials($projectId) {                                             // Voir les commentaires des projets

            $bdd = $this->connection();

            $reqTestimonials = $bdd->prepare('SELECT testimonials.*, users.username 
                	                  FROM testimonials 
                                      INNER JOIN users
                                      ON testimonials.user_id = users.id
                                      WHERE testimonials.project_id = ?
                                      ORDER BY date_create DESC');

            $reqTestimonials->execute([$projectId]); 
            return $reqTestimonials;            

        }

        public function addTestimonials($userId, $content, $articleId = null, $projectId = null) {       // Ajouter un commentaire

            $bdd = $this->connection();

            $requete = $bdd->prepare('INSERT INTO testimonials (user_id, content, article_id, project_id) VALUES (?, ?, ?, ?)');
            $requete->execute([$userId, $content, $articleId, $projectId]);
            return $requete;
        }

    }