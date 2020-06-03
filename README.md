# my_auto
Projet php


### Ajouter des fichier sur le depot git
git add .

### Ajouter un message a la version du code
git commit -am" message du commit "
OU git commit -m 'message'

### Pour Envoyer le code sur le serveur github
git push origin (master) -

### pour changer de branche git 
git checkout (nom_de_la_branche) - git checkout master


### pour créer une nouvelle branche
git checkout -b nom_de_la_nouvelle_branche - git checkout -b ft-add-seance
OU git branch nom_de_la_nouvelle_branche puis git checkout nom_de_la_nouvelle_branche (pour se placer dedans)


### pour supprimer une branche
git branch -d localBrancheName

git push origin --delete brancheName

### pour créer un nouveau fichier au projet 
touch index.css (par exemple)

### pour savoir deans quelle branche on est
 git status 

### pour deplacer les changements d'une branche vers le master (on se met dans le master)
git merge nom_de_la_nouvelle_branche qu'on veut merger