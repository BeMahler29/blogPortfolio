<?php

    session_start();

    require_once('models/ArticlesManager.php');
    require_once('models/ProjectManager.php');
    require_once('models/UserManager.php');
    require_once('models/TestimonialsManager.php');

    


    // Gestion des Articles

    function articles() {                                               // Afficher tous les Articles

        $articleManager = new ArticlesManager();

        $requete = $articleManager->getAllArticles();
        require ('views/articles/articlesView.php');

    }

    function readArticle($id) {                                         // Lire Article

        $articleManager = new ArticlesManager();
        $testimonialManager = new TestimonialsManager();

        $reqTestimonials = $testimonialManager->getArticleTestimonials($id);
        $requete = $articleManager->getArticleById($id);
        require ('views/articles/showArticleView.php');

    }

    function createArticle(){                                           // Créer un Article

        $articleManager = new ArticlesManager();

        if(isset($_POST['title']) && !empty($_POST['content'])) {

            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $img = null;

            if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

                // Taille de l'image
                if ($_FILES['image']['size'] <= 8000000) {
        
                    $informationsImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $informationsImage['extension'];
                    $extensionArray = ['png', 'gif', 'jpg', 'jpeg'];
        
                    if (in_array($extensionImage, $extensionArray)) {

                        $img = time().rand().rand().'.'.$extensionImage;                               // Création nom unique
        
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/articles/'.$img);    // Upload de la nouvelle image                  
                        
                    }
                }

                else {

                    throw new Exception("Il y a eu une erreur lors de l'envoi de l'image");
    
                }

            }

            $result = $articleManager->createArticle($title, $img, $content);

            if ($result) {

                header('location: /articles');
                exit;

            }
            else {

                throw new Exception("L'article n'a pas pu être crée.");

            }



        }


        require('views/articles/createArticleView.php');

    }

    function editArticle($id) {                                         // Modifier l'Article

        $articleManager = new ArticlesManager();

        $requete = $articleManager->getArticleById($id);
        


        if (isset ($_POST['editTitle']) && !empty($_POST['editContent'])) {

            $title = htmlspecialchars($_POST['editTitle']);
            $content = htmlspecialchars($_POST['editContent']);
            $newImg = null;
           
        
            if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

                // Taille de l'image
                if ($_FILES['image']['size'] <= 8000000) {
        
                    $informationsImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $informationsImage['extension'];
                    $extensionArray = ['png', 'gif', 'jpg', 'jpeg'];
        
                    if (in_array($extensionImage, $extensionArray)) {

                        $oldImg = $articleManager->getImageArticleById($id);                              
                        
                        if ($oldImg) {

                            unlink('uploads/articles/'.$oldImg);                                          // S'il y a une ancienne image, ça la supprime 

                        }

        
                        $newImg = time().rand().rand().'.'.$extensionImage;                               // Création nom unique
        
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/articles/'.$newImg);    // Upload de la nouvelle image                  
                        
        
                    }
                }

                else {

                    throw new Exception("Il y a eu une erreur lors de l'envoi de l'image");
    
                }

            }
            
            $result = $articleManager->updateArticle($title, $newImg, $content, $id);

            if ($result) {

                header('location: /articles');
                exit;

            }
            else {

                throw new Exception("L'article n'a pas pu être modifié.");

            }
            



        }
        
        require ('views/articles/editArticleView.php');



    }

    function deleteArticle ($id) {                                      // Supprimer l'Article

        $articleManager = new ArticlesManager();

        $oldImg = $articleManager->getImageArticleById($id);                              
                        
        if ($oldImg) {

            unlink('uploads/articles/'.$oldImg);                                          // Suppression de l'image 

        }

        $result = $articleManager->deleteArticle($id);

            if ($result) {

                header('location: /articles');
                exit;

            }
            else {

                throw new Exception("L'article n'a pas pu être supprimé.");

            }


    }


    // Gestion des projets
    function projects() {                                               // Afficher tous les Projets

        $projectManager = new ProjectsManager();

        $requete = $projectManager->getAllProjects();
        require ('views/projects/projectsView.php');

    }

    function readProject($id) {                                         // Voir le Projet

        $projectManager = new ProjectsManager();
        $testimonialManager = new TestimonialsManager();

        $reqTestimonials = $testimonialManager->getProjectTestimonials($id);
        $requete = $projectManager->getProjectById($id);
        require ('views/projects/showProjectView.php');

    }

    function createProject(){                                           // Créer un Projet
        $projectManager = new ProjectsManager();

        if(isset($_POST['title']) && !empty($_POST['content'])) {

            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            $img = null;

            if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

                // Taille de l'image
                if ($_FILES['image']['size'] <= 8000000) {
        
                    $informationsImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $informationsImage['extension'];
                    $extensionArray = ['png', 'gif', 'jpg', 'jpeg'];
        
                    if (in_array($extensionImage, $extensionArray)) {

                        $img = time().rand().rand().'.'.$extensionImage;                               // Création nom unique
        
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/projects/'.$img);    // Upload de la nouvelle image                  
                        
                    }
                }

                else {

                    throw new Exception("Il y a eu une erreur lors de l'envoi de l'image");
    
                }

            }

            $result = $projectManager->createProject($title, $img, $content);

            if ($result) {

                header('location: /projects');
                exit;

            }
            else {

                throw new Exception("Le projet n'a pas pu être crée.");

            }



        }


        require('views/projects/createProjectView.php');

    }

    function editProject($id) {                                         // Modifier le Projet

        $projectManager = new ProjectsManager();

        $requete = $projectManager->getProjectById($id);
        


        if (isset ($_POST['editTitle']) && !empty($_POST['editContent'])) {

            $title = htmlspecialchars($_POST['editTitle']);
            $content = htmlspecialchars($_POST['editContent']);
            $newImg = null;
           
        
            if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

                // Taille de l'image
                if ($_FILES['image']['size'] <= 8000000) {
        
                    $informationsImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $informationsImage['extension'];
                    $extensionArray = ['png', 'gif', 'jpg', 'jpeg'];
        
                    if (in_array($extensionImage, $extensionArray)) {

                        $oldImg = $projectManager->getImageProjectById($id);                              
                        
                        if ($oldImg) {

                            unlink('uploads/projects/'.$oldImg);                                          // S'il y a une ancienne image, ça la supprime 

                        }

        
                        $newImg = time().rand().rand().'.'.$extensionImage;                               // Création nom unique
        
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/projects/'.$newImg);    // Upload de la nouvelle image                  
                        
        
                    }
                }

                else {

                    throw new Exception("Il y a eu une erreur lors de l'envoi de l'image");
    
                }

            }
            
            $result = $projectManager->updateProject($title, $newImg, $content, $id);

            if ($result) {

                header('location: /projects');
                exit;

            }
            else {

                throw new Exception("Le projet n'a pas pu être modifié.");

            }
            



        }
        
        require ('views/projects/editProjectView.php');



    }

    function deleteProject ($id) {                                      // Supprimer le Projet

        $projectManager = new ProjectsManager();

        $oldImg = $projectManager->getImageProjectById($id);                              
                        
        if ($oldImg) {

            unlink('uploads/projects/'.$oldImg);                         // Suppression de l'image 

        }

        $result = $projectManager->deleteProject($id);

            if ($result) {

                header('location: /projects');
                exit;

            }
            else {

                throw new Exception("Le projet n'a pas pu être supprimé.");

            }


    }
    

    // Gestion des utilisateurs
    function autoLog() {                                                // Connexion si cookie

        $userManager = new UserManager();

        $userManager->autoLogin(); 

    }

    function register() {                                               // Enregistrement

        $userManager = new UserManager();

        $userManager->registerUser(); 
        require('views/auth/registerView.php');
    }

    function login() {                                                  // Login

        $userManager = new UserManager();

        $userManager->loginUser();
        require('views/auth/loginView.php');
    }

    function logout() {                                                 // Déconnexion

        $userManager = new UserManager();

        $userManager->logoutUser(); 

    }


    // Gestion des commentaires
    function postTestimonials() {                                       // Poster un commentaire

        $testimonialManager = new TestimonialsManager();        

        if (isset($_POST['content']) && $_SESSION['connect']) {

            $userId = $_SESSION['userId'];
            $content = htmlspecialchars($_POST['content']);
            $articleId = $_POST['articleId'] ?? null;
            $projectId = $_POST['projectId'] ?? null;

            if (!empty($content)) {

                $result =  $testimonialManager->addTestimonials($userId, $content, $articleId, $projectId);  

                if (!$result) {

                    throw new Exception("Une erreur s'est produite et votre avis n'a pas pu être ajouté.");

                }

                elseif ($articleId) {
                        
                        header("Location: /article/$articleId");                        
                       
                    }

                elseif ($projectId) {

                        header('Location: /project/'.$projectId);                        
        
                }
                    
                    exit();

            
            } 
        }
    }
