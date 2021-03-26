Feature: Home Page and Dashboard

  #                                  #
  # HOME PAGE AND FORM CONTACT VALID #
  #                                  #
  Scenario: Home Page and form Contact [HAPPY FLOW]
    When I am on "/"
    Then the response status code should be 200
    And I should see "La solution logicielle Kiribati"
    And I follow "Contact"
    Then the response status code should be 200
    And I should see "UNE DÉMONSTRATION ? NOUS RENCONTRER ?"
    And I fill in "Nom de famille TEST" for "contact_firstName"
    And I fill in "Prénom  TEST" for "contact_lastName"
    And I fill in "email@TEST.fr" for "contact_email"
    And I fill in "Message de test" for "contact_message"
    And I press "Envoyer"
    And the response status code should be 200

  #                               #
  # SITE WEB FORM CONTACT ERROR   #
  #                               #

  Scenario: Form contact - name min message [ERROR FLOW]
    When I am on "/contact"
    Then the response status code should be 200
    And I fill in "1" for "contact_firstName"
    And I fill in "Prénom  TEST" for "contact_lastName"
    And I fill in "email@TEST.fr" for "contact_email"
    And I fill in "Message de test" for "contact_message"
    And I press "Envoyer"
    And I should see "Le nom doit avoir au minimum 2 caractères"


  Scenario: Form contact - lastName min message [ERROR FLOW]
    When I am on "/contact"
    Then the response status code should be 200
    And I fill in "nom de test" for "contact_firstName"
    And I fill in "1" for "contact_lastName"
    And I fill in "email@TEST.fr" for "contact_email"
    And I fill in "Message de test" for "contact_message"
    And I press "Envoyer"
    And I should see "Le prénom doit avoir au minimum 2 caractères"


  Scenario: Form contact - email invalid [ERROR FLOW]
    When I am on "/contact"
    Then the response status code should be 200
    And I fill in "nom de test" for "contact_firstName"
    And I fill in "prenom de test" for "contact_lastName"
    And I fill in "email@test" for "contact_email"
    And I fill in "Message" for "contact_message"
    And I press "Envoyer"
    And I should see "l'email n'est pas valide"

  Scenario: Form contact - message min message [ERROR FLOW]
    When I am on "/contact"
    Then the response status code should be 200
    And I fill in "nom de test" for "contact_firstName"
    And I fill in "prenom de test" for "contact_lastName"
    And I fill in "email@TEST.fr" for "contact_email"
    And I fill in "M" for "contact_message"
    And I press "Envoyer"
    And I should see "Le message doit avoir au minimum 2 caractères"

  #                 #
  # DASHBOARD LOGIN #
  #                 #
  Scenario: Admin Login -  email and password errors [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I should see "Connexion"
    And I fill in "test@test.fr" for "email"
    And I fill in "test" for "password"
    And I press "connexion"
    And I should see "Email could not be found."


  Scenario: Admin Login - password errors [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I should see "Connexion"
    And I fill in "admin@test.fr" for "email"
    And I fill in "test" for "password"
    And I press "connexion"
    And I should see "Identifiants invalides."


  Scenario: Admin Login and Dashboard - [HAPPY FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I should see "Connexion"
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I should see "dashboard"
    And I follow "Email"


  #                       #
  # Dashboard ADD ARTICLE #
  #                       #
  Scenario: Add Article - Title min message [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Articles"
    And I follow "Créer Article"
    And I fill in "1" for "Titre"
    And I fill in "1" for "Contenu"
    And I fill in "27/03/2021" for "Date de publication"
    And I press "Créer"
    And I should see "Le titre doit avoir au minimum 2 caractères"

  Scenario: Add Article - Title max message [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Articles"
    And I follow "Créer Article"
    And I fill in "AZERTYUIOPAZERTYUIOPAZERTYcccccUIOPAZERTYUIOAZERTYUIIOPAERERTYUYIOOUYTREZzkljfzgziorghzoihf,ezkzpjfepfdlfgjlkrjgffffffffffffffffffffdddddddddddddddddddddddddddddffffffffffffffffffffffffffkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee" for "Titre"
    And I fill in "1" for "Contenu"
    And I fill in "27/03/2021" for "Date de publication"
    And I press "Créer"
    And I should see "Le titre doit avoir au maximum 255 caractères"

  Scenario: Add Article [HAPPY FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Articles"
    And I follow "Créer Article"
    And I fill in "test titre de l'article" for "Titre"
    And I fill in "contenu de l'article" for "Contenu"
    And I fill in "27/03/2021" for "Date de publication"
    And I select "Sparesotto Anais" from "Auteur"
    And I select "Climat" from "Catégorie"
    And I press "Créer"
    Then the response status code should be 200


  #                           #
  # DASHBOARD DELETE ARTICLE  #
  #                           #

  Scenario: Delete Article [HAPPY FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Articles"
    And I follow "supprimer"
    ### check suppression


  #                           #
  # DASHBOARD ADD AUTHOR      #
  #                           #

  Scenario: Add Author [HAPPY FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Auteur"
    And I follow "Créer Author"
    And I fill in "Nom de Test" for "Nom"
    And I fill in "Prénom de test" for "Prénom"
    And I press "Créer"
    Then the response status code should be 200

  Scenario: Add Author - FirstName min message [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Auteur"
    And I follow "Créer Author"
    And I fill in "1" for "Nom"
    And I fill in "Prénom de test" for "Prénom"
    And I press "Créer"
    And I should see "Le nom de l'auteur doit avoir au minimum 2 caractères"
    Then the response status code should be 200

  Scenario: Add Author - LastName min message [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Auteur"
    And I follow "Créer Author"
    And I fill in "nom de l'auteur" for "Nom"
    And I fill in "1" for "Prénom"
    And I press "Créer"
    And I should see "Le prénom de l'auteur doit avoir au minimum 2 caractères"
    Then the response status code should be 200

  #                           #
  # DASHBOARD ADD CATEGORY    #
  #                           #

  Scenario: Add Category [HAPPY FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Categories"
    And I follow "Créer Category"
    And I fill in "Nom de Test" for "Nom"
    And I press "Créer"
    Then the response status code should be 200

  Scenario: Add Category - name min message [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Categories"
    And I follow "Créer Category"
    And I fill in "1" for "Nom"
    And I press "Créer"
    And I should see "Le nom de la catégorie doit avoir au minimum 2 caractères"
    Then the response status code should be 200

  #                           #
  # DASHBOARD ADD EMPLOYEE    #
  #                           #

  Scenario: Add Employee [HAPPY FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Salariés"
    And I follow "Créer Employee"
    And I fill in "Nom de Test" for "Nom"
    And I fill in "Prénom de test" for "Prénom"
    #And I select in "Sertisseur" from "Métier"
    And I fill in "description employé" for "Déscription"
    And I press "Créer"
    Then the response status code should be 200

  Scenario: Add Employee - Métier null [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Salariés"
    And I follow "Créer Employee"
    And I fill in "Nom de Test" for "Nom"
    And I fill in "Prénom de test" for "Prénom"
    And I fill in "description employé" for "Déscription"
    And I press "Créer"
    And I should see "Vous devez choisir un métier"

  Scenario: Add Employee - FirstName min message [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Salariés"
    And I follow "Créer Employee"
    And I fill in "1" for "Nom"
    And I fill in "Prénom de test" for "Prénom"
      #And I select in "Sertisseur" from "Métier"
    And I fill in "description employé" for "Déscription"
    And I press "Créer"
    And I should see "Le nom du salarié doit avoir au minimum 2 caractères"

  Scenario: Add Employee - lastName min message [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Salariés"
    And I follow "Créer Employee"
    And I fill in "nom" for "Nom"
    And I fill in "1" for "Prénom"
      #And I select in "Sertisseur" from "Métier"
    And I fill in "description employé" for "Déscription"
    And I press "Créer"
    And I should see "Le prénom du salarié doit avoir au minimum 2 caractères"

  Scenario: Add Employee - Biography is null [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Salariés"
    And I follow "Créer Employee"
    And I fill in "nom" for "Nom"
    And I fill in "prénom" for "Prénom"
      #And I select in "Sertisseur" from "Métier"
    And I fill in "" for "Déscription"
    And I press "Créer"
    And I should see "Vous devez renseigner une descritpion"


    #                 #
    #  DASHBOARD JOB  #
    #                 #

  Scenario: Add Job  [HAPPY FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Métier"
    And I follow "Créer Job"
    And I fill in "métier" for "Métier"
    And I press "Créer"
    And the response status code should be 200

  Scenario: Add Job - Name min message [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Métier"
    And I follow "Créer Job"
    And I fill in "m" for "Métier"
    And I press "Créer"
    And I should see "Le métier doit avoir au minimum 2 caractères"

  Scenario: Add Job - Name is null [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Métier"
    And I follow "Créer Job"
    And I fill in "" for "Métier"
    And I press "Créer"
    And I should see "Le métier ne peut pas être vide"


  #                               #
  # DASHBOARD TESTIMONIAL         #
  #                               #

  Scenario: Add Testimonial [HAPPY FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Témoignage"
    And I follow "Créer Testimonial"
    And I fill in "nom entreprise" for "Entreprise"
    And I fill in "Nom et Prénom" for "Nom et Prénom"
    And I fill in "Métier" for "Métier"
    And I fill in "témoignage" for "témoignage"
    And I press "Créer"
    And the response status code should be 200


  Scenario: Add Testimonial - form null [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Témoignage"
    And I follow "Créer Testimonial"
    And I fill in "" for "Entreprise"
    And I fill in "" for "Nom et Prénom"
    And I fill in "" for "Métier"
    And I fill in "" for "témoignage"
    And I press "Créer"
    And I should see "Ce champ ne peut pas être vide"


  Scenario: Add Testimonial - min message [ERROR FLOW]
    When I am on "/admin"
    Then the response status code should be 200
    And I fill in "admin@test.fr" for "email"
    And I fill in "admin" for "password"
    And I press "connexion"
    Then the response status code should be 200
    And I follow "Témoignage"
    And I follow "Créer Testimonial"
    And I fill in "1" for "Entreprise"
    And I fill in "1" for "Nom et Prénom"
    And I fill in "1" for "Métier"
    And I fill in "1" for "témoignage"
    And I press "Créer"
    And I should see "L'entreprise doit avoir au minimum 2 caractères"
    And I should see "Le nom doit avoir au minimum 2 caractères"
    And I should see "Le métier doit avoir au minimum 2 caractères"
    And I should see "Le témoignage doit avoir au minimum 20 caractères"
