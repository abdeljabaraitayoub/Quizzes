# Quizzes

## Contexte du projet
- En tant que développeur fullstack travaillant pour une société, votre mission est de concevoir et mettre en œuvre une plateforme en ligne pour faciliter la gestion des cours, des quiz et des statistiques liées à la progression des étudiants.

## Objectifs Principaux :

- Gestion des Cours : Les administrateurs doivent pouvoir effectuer les opérations CRUD (Create, Read, Update, Delete) sur les cours
- Gestion des Questions & Réponses : Les administrateurs doivent pouvoir gérer les questions associées à chaque cours. Chaque question doit être liée à quatre réponses, dont une seule est correcte.
- Gestion des Utilisateurs : Les administrateurs doivent pouvoir effectuer les opérations CRUD sur les utilisateurs. Chaque utilisateur doit avoir des cours attribués et des résultats d'exercices associés.
- Page de Statistiques : Les administrateurs auront accès à une page dédiée aux statistiques. Cette page devrait fournir une vue d'ensemble des statistiques globales, y compris le nombre total de quiz passés par tous les utilisateurs, le nombre d'utilisateurs enregistrés, et un graphique représentant la progression d'un utilisateur dans les quiz choisis à partir d'une liste déroulante.
- Fonctionnalités pour les Étudiants :
  + Consultation des Résultats de Quiz :+  Les étudiants doivent pouvoir visualiser les résultats de leurs quiz, y compris les réponses correctes.
  + Exploration des Cours :+  Les étudiants doivent avoir accès à une liste de cours disponibles.
  + Sauvegarde de la Progression :+  Les étudiants doivent pouvoir sauvegarder leur progression dans un cours pour reprendre là où ils se sont arrêtés. Cette fonctionnalité doit être mise en œuvre en utilisant + Ajax+  et enregistrer la progression dans la base de données. Veillez à prendre en compte l'enregistrement de la progression d'un étudiant dans un cours.
  + Passage de Quiz :+  Les étudiants doivent avoir la possibilité de passer des quiz en ligne.
  + Authentification et Autorisation :+  Un système d'authentification sera mis en place avec deux rôles : administrateur et étudiant. L'authentification sera réalisée en utilisant des sessions, avec des mots de passe hachés pour garantir la sécurité des informations d'identification.

## User Stories :

- En tant qu'administrateur, je veux pouvoir ajouter, afficher, modifier et supprimer des cours pour personnaliser l'offre de formation.
- En tant qu'administrateur, je veux pouvoir gérer les questions associées à chaque cours (ajouter, afficher, modifier, supprimer) pour maintenir la qualité des quiz.
- En tant qu'administrateur, je veux pouvoir gérer les utilisateurs (ajouter, afficher, modifier, supprimer) pour assurer un suivi précis de la progression.
- En tant qu'administrateur, je veux pouvoir consulter les statistiques globales pour évaluer la performance générale des utilisateurs.
- En tant qu'étudiant, je veux pouvoir consulter mes résultats de quiz avec les réponses correctes pour comprendre mes points forts et faibles.
- En tant qu'étudiant, je veux pouvoir explorer la liste des cours disponibles pour choisir ceux qui me conviennent.
- En tant qu'étudiant, je veux pouvoir sauvegarder ma progression dans un cours pour reprendre là où je me suis arrêté.
- En tant qu'étudiant, je veux pouvoir passer des quiz pour évaluer mes connaissances.
- En tant qu'administrateur, je veux pouvoir supprimer une question d'un quiz pour corriger d'éventuelles erreurs.
- En tant qu'administrateur, je veux pouvoir gérer les sessions des utilisateurs (connexion, déconnexion) pour assurer la sécurité de la plateforme.