# oShop / Dans les shoe

On a codé 2 routes (donc 2 pages) du projet oShop. Il en reste encore beaucoup...

## Routes :motorway:

### Documentation :pencil2:

On va commencer par rédiger la documentation de routes du _Sprint_.

Comme on ne doit pas coder dans ce dépôt, un fichier d'exemple à copier-coller dans ton dépôt est [fourni ici](./routes.md). Tu pourras ensuite le compléter.

Par convention, on va placer les méthodes des pages "statiques" (mentions légales, CGV, etc.) et la page d'accueil dans le `MainController`.  
Les pages liées au contenu du catalogue seront dans le `CatalogController`.

Pour la méthode HTTP, toutes les URL sont accédées en `GET` par le navigateur par défaut, sauf si un formulaire est envoyé en `POST`.

Dans les URLs, on pourra avoir des portions "variables" ou "dynamiques". Elles sont entourées par des `[]` dans la doc.

Ha, et, dernière info, et non des moindres :  
La documentation est à rédiger **entièrement en anglais**, "of course" :guardsman:

Voici la liste des pages et leur URL (avec parfois des "ID" pouvant changer) :

- accueil : `/`
- mentions légales : `/mentions-legales/`
- catégorie #12 : `/catalogue/categorie/12`
- type #40 : `/catalogue/type/40`
- marque #2 : `/catalogue/marque/2`
- produit #4 : `/catalogue/produit/4`

### Coder ! :keyboard:

Une fois la doc rédigée, il n'y a plus qu'à coder ces routes, ces _Controllers_, ces méthodes et ces _Views_... :keyboard:

<details><summary>l'énoncé est trop court, pas assez guidé ?</summary>

Alors reprend pas à pas les parties du code qu'on a produit en cours pour chaque page/route.

Une route, c'est le lien entre une URL (source/entrée) et une méthode d'un _Controller_ (qui génère la sortie grâce à une _View_).  
Tu as donc la liste de tous les éléments à mettre en place pour chaque page/URL du site.

</details>

## Bonus :floppy_disk:

<details><summary>Mais c'est qu'un bonus !</summary>

[Mais comme tu sembles vraiment intéressé(e), le voici](./bonus1.md) :muscle:

</details>
