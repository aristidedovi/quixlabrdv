# gestion de rendez-vous dans un hôpital

La racine du projet est le dossier public. en local :
        
        * $ php -S localhost:8000 -d display_errors=1 -t public/
*********************
        la table employer fait reférence aux utilisateur dans le système avec
           leur identifiant comme téléphone et leurs mots de passe.

== Déploiement du projet

* Cloner ou telecharger le projet depuis github 

* configuration d la base de donnée

Mettre a jour les informations de connexion à votre base de donnée dans le fichier config/config.php

        return array(
            "db_user" => "root",
            "db_pass" => "root",
            "db_host" => "localhost",
            "db_name" => "rdv"
        );

* Executer le fichier sql_new.sql dans votre serveur de base de donnée. le sql_test.sql est un 
fichier sql de test.

        *sql_new.sql
        *sql_test.sql

* L'identifiant de connexion de l'administrateur par defaut est 
    
        Tel : 778580286
        Mdp : aristide2

* Les fonctinalités principale se trouve a ce lien

        lien : [lien du document](https://docs.google.com/document/d/1pWIgEi8PUXJ63MBN26167VgHkJgzftsQcPyLKd9_rgQ/edit?usp=sharing)