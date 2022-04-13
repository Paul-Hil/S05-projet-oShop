# Routes

## Sprint 1

| URL                           | HTTP Method | Controller          | Method         | Title               | Content                            | Comment                                                 |
| ----------------------------- | ----------- | ------------------- | -------------- | ------------------- | ---------------------------------- | ------------------------------------------------------- |
| `/`                           | `GET`       | `MainController`    | `home`         | Dans les shoe       | 5 categories                       | -                                                       |
| `/mentions-legales/`          | `GET`       | `MainController`    | `legal-notice` | Mentions légales    | The notice...                      | -                                                       |
| `/catalogue/categorie/[i:id]` | `GET`       | `CatalogController` | `category`     | Nom de la catégorie | Products related to the category   | -                                                       |
| `/catalog/type/[i:id]`        | `GET`       | `CatalogController` | `type`         | Nom du type         | Products related to the type       | Explain here the dynamics parts of your URL (`[]`)      |
| `/catalog/marque/[i:id]`      | `GET`       | `CatalogController` | `marque`       | Nom de la marque    | Products related to the brand name | *                                                       |
| `/catalog/produit/[i:id]`     | `GET`       | `CatalogController` | `produit`      | Nom du produit      | Products related to the product    | Display template linked to the product through his `id` |