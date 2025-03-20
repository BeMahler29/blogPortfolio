<!-- Routeur -->


<?php

    require_once ('controllers/Controller.php');

    autoLog();                                                   // Connexion si cookie


    
    // Récupérer URL
    $page = isset($_GET['page']) ? explode('/', trim($_GET['page'], '/')) : ['home'];    // Vérifie si $_GET['page'] existe, si oui, "explose" l'url et stock dans un tableau les différentes chaines de caractères séparé par '/'. Sinon retourne ['home']
                                                                                         // trim() permet de supprimer les '/' avant et après. Sinon cela crée des éléments vides dans explode() 

    

    
    try {

        switch ($page[0]) {

        
        case 'home':                                             // Page d'accueil

            require ('views/homeView.php');
            break;


       
        case 'articles':                                         // Gestion des Articles

            Articles();
            break;

        case 'article':       

            if (isset($page[1]) && is_numeric($page[1])) {

               readArticle($page[1]);
            
            }
            break;

        case 'article-create':

            createArticle();
            break;
            
        case 'article-edit':

            if (isset($page[1]) && is_numeric($page[1])) {

                editArticle($page[1]);

            } 
            break;

        case 'article-delete':

            if (isset($page[1]) && is_numeric($page[1])) {

                deleteArticle($page[1]);

            } 
            break;



            case 'projects':                                         // Gestion des Projets

                projects();
                break;
    
            case 'project':       
    
                if (isset($page[1]) && is_numeric($page[1])) {
    
                   readProject($page[1]);
                
                }
                break;
    
            case 'project-create':
    
                createProject();
                break;
                
            case 'project-edit':
    
                if (isset($page[1]) && is_numeric($page[1])) {
    
                    editProject($page[1]);
    
                } 
                break;
    
            case 'project-delete':
    
                if (isset($page[1]) && is_numeric($page[1])) {
    
                    deleteProject($page[1]);
    
                } 
                break;



            case 'register':                                         // Gestion Authentification

                register();
                break;

            case 'login':

                login();
                break;

            case 'logout':

                logout();
                break;

            case 'add-testimonials':

                postTestimonials();
                break;


            default:                                                // Page introuvable
                
                throw new Exception("Cette page n'existe pas ou a été déplacée.");
            
            break;
                
    }
    }

    catch (Exception $e) {

        $error = $e->getMessage();
        require ('views/errorView.php');

    }
    