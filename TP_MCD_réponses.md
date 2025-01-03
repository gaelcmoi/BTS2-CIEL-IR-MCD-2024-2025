### 1. Identification des entités principales  
- **Quel est l'élément central du jeu League of Legends que nous cherchons à modéliser ?**\
dans le cas de loldle classique on cherche à modeliser un jeu ou l'on recherche un champion via ses caracteristiques   

### 2. Définition des attributs  
- **Quels types d'informations sont nécessaires pour décrire complètement un champion ?**\
  toutes ses caracteristiques qui le definissent : competences(s), année de sortie, type de portée(s), region(s),  genre(s), espece(s), role(s),  ressources  
- **Comment pouvez-vous représenter l'identifiant unique d'un champion dans le modèle ?**\
  via son nom  
- **Quels types de données seraient appropriés pour chaque attribut que vous avez identifié ?**\
  ?  

### 3. Identification des entités secondaires  
- **Outre les champions, quelles autres catégories d'informations sont importantes dans League of Legends et pourront être modélisées sous forme d'entités ?**\
  toutes ses caracteristiques qui le definissent : competences(s), année de sortie, type de portée(s), region(s),  genre(s), espece(s), role(s),  ressource  

### 4. Définition des attributs pour les entités secondaires  
- **Pour chaque entité secondaire que vous avez identifiée, quelles informations sont nécessaires pour la décrire ?**\
  leur type(s) et/ou nom  

### 5. Établissement des relations  
- **Quelles sont les connexions logiques entre l'entité principale (champion) et les entités secondaires ?**\
  l'appartenance sous différentes formes (etre, faire parti)   
- **Comment exprimeriez-vous ces connexions en termes de relations dans un MCD ?**\
  dans un diagramme  

### 6. Détermination des cardinalités  
- **Pour chaque relation que vous avez identifiée, réfléchissez :**\
  tout appartient a champion que cela soit en unique ou non
  
- **Un champion peut-il avoir plusieurs instances de cette caractéristique ?**\
  oui s'il possede 2 des caracteristiques présentés dans la clé secondaire en question
  
- **Cette caractéristique peut-elle être partagée par plusieurs champions ?**\
  oui n'importe quelle des secondaires
  
- **Comment ces réponses se traduisent-elles en termes de cardinalités dans votre modèle ?**\
  1/1 ou 1/n
  
### 7. Création du diagramme  
- **Utilisez draw.io pour créer votre diagramme. Quels symboles allez-vous utiliser pour représenter les différents éléments de votre MCD ?**\
  2 barres (1/1) et 3 bras/1barres (1/n)
- **Comment allez-vous organiser visuellement votre diagramme pour qu'il soit clair et facile à comprendre ?**\
  sous forme de "pyramide" champion en haut et les caracteristiques en découlant 
