# augustin_charly_POO
My work for the OOP exam.

Question 1
la méthode __destruct()

Question 2
visiblités:
  - public: accessible partout
  - privé: uniquement accessible depuis l'intérieur de la classe
  - protected: accessible depuis la classe et celles qui en héritent
  
Question 3
avantages du MVC:
  - séparer la logique de l'affichage
  - en repartissant clairement les rôles, le code est mieux ordonné et plus facile à maintenir

Question 4
le pattern MVC se compose des éléments suivants:
  - le modèle est composé des classes qui décrivent la structure de la donnée telle que présente en base de donnée et des méthodes d'accès par requettage
  - la vue est la partie affichage, c'est la partie renvoyée au client une fois les données récupérées et injéctées. C'est aussi celle qui permet au client
  d'interagir.
  - le contrôleur va s'occuper de verifier que la requête de l'utilisateur est conforme, faire appel au modèle pour récuperer les données puis les injecter
  dans la vue pour ensuite envoyer cette vue en réponse.
