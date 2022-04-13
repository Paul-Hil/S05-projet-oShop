<?php

namespace oShop\Models;

use PDO;
use oShop\Utils\Database;

/**
 * Classe de Model Product
 * Représente la table SQL 'product'
 * 
 * ! Pas de Setter sur $id (Auto incrémente dans la bdd)
 */

 // Racourcis vsCode: /** */
 class Product extends CoreModel {
    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;
    private $brand_id;
    private $category_id;
    private $type_id;
    
    /**
     * Get one product by its id
     *
     * @param int $id Product primary Key
     * @return Product Product found
     */
    public function find(int $id) : Product
    {
        $sql = "SELECT * FROM product WHERE id={$id}"; // Requête pour un produit

        $pdo = Database::getPDO();  // On récupère la connexion à PDO

        $pdoStatement = $pdo->query($sql);  // On exécute la requête

        $product = $pdoStatement->fetchObject('oShop\Models\Product');  // On récupère un objet de type Product

        return $product;
    }

    // On le renvoie
    /**
     * Get all products
     */
    public function findAll() : array
    {
        $sql = "SELECT * FROM product";

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);

        $products = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Product'); // On récupère un tableau d'objets de type Product
        return $products;
    }

    public function findJoinedToAll(int $id)
    {
        $sql = "SELECT product.*, brand.name AS brand_name, category.name AS category_name, type.name AS type_name
        FROM `product`
        INNER JOIN brand ON product.brand_id = brand.id
        LEFT JOIN category ON product.category_id = category.id
        INNER JOIN type ON product.type_id = type.id
        WHERE product.id = {$id}";

        // On récupère la connexion à PDO
        $pdo = Database::getPDO();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // On récupère un objet de type Product
        $product = $pdoStatement->fetchObject('oShop\Models\Product');

        // On le renvoie
        return $product;
    }

    public function findDescription(int $id)
    {
        $sql = "SELECT `description` FROM `product` WHERE product.id = {$id}";

        $pdo = Database::getPDO();  // On récupère la connexion à PDO

        $pdoStatement = $pdo->query($sql);  // On exécute la requête

        $descriptionProduct = $pdoStatement->fetchObject('oShop\Models\Product');  // On récupère un objet de type Product

        return $descriptionProduct;
    }

    public function findType($id) : array
    {
        $sql = "SELECT * FROM `product`
        WHERE type_id={$id}"; // Requête pour un produit

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);

        $type = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Product'); // On récupère un tableau d'objets de type Product
        return $type;
    }

    public function findTypeName($id)
    {
        // $sql ="SELECT type.name AS type_name
        // FROM `product`
        // INNER JOIN `type` ON product.type_id = type.id
        // WHERE product.id = {$id}"; // Requête pour un produit
        // $sql = "SELECT *, type.name AS type_name
        // FROM `product`
        // INNER JOIN type ON product.type_id = type.id
        // WHERE type.id = {$id}";
        $sql = "SELECT product.*, brand.name AS brand_name, category.name AS category_name, type.name AS type_name
        FROM `product`
        INNER JOIN brand ON product.brand_id = brand.id
        LEFT JOIN category ON product.category_id = category.id
        INNER JOIN type ON product.type_id = type.id
        WHERE type.id = {$id}";

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);

        $typeName = $pdoStatement->fetchObject('oShop\Models\Product'); // On récupère un tableau d'objets de type Product
        return $typeName;
    }

    public function findCategory($id) : array
    {
        $sql = "SELECT * FROM `product` 
        WHERE category_id={$id}"; // Requête pour un produit

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);

        $category = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Product'); // On récupère un tableau d'objets de type Product
        return $category;
    }

    public function findCategoryName($id)
    {
        // $sql ="SELECT category.name AS category_name
        // FROM `product`
        // LEFT JOIN category ON product.category_id = category.id
        // WHERE product.id = {$id}"; // Requête pour un produit

        // $sql= "SELECT product.name AS product_name
        // FROM `category`
        // LEFT JOIN product ON category.product_id = product.id
        // WHERE category.id = {$id}";

        $sql="SELECT product.*, brand.name AS brand_name, category.name AS category_name, type.name AS type_name
        FROM `product`
        INNER JOIN brand ON product.brand_id = brand.id
        LEFT JOIN category ON product.category_id = category.id
        INNER JOIN type ON product.type_id = type.id
        WHERE category.id = {$id}" ;

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);

        $categoryName = $pdoStatement->fetchObject('oShop\Models\Product'); // On récupère un tableau d'objets de type Product
        return $categoryName;
    }

    public function findBrand($id) : array
    {
        $sql = "SELECT * FROM `product` 
        WHERE brand_id={$id}"; // Requête pour un produit

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);

        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Product'); // On récupère un tableau d'objets de type Product
        return $brands;
    }

    public function findBrandName(int $id)
    {
        $sql="SELECT product.*, brand.name AS brand_name, category.name AS category_name, type.name AS type_name
        FROM `product`
        INNER JOIN brand ON product.brand_id = brand.id
        LEFT JOIN category ON product.category_id = category.id
        INNER JOIN type ON product.type_id = type.id
        WHERE brand.id = {$id}";

        $pdo = Database::getPDO();  // On récupère la connexion à PDO
        $pdoStatement = $pdo->query($sql);  // On exécute la requête

        $brandName = $pdoStatement->fetchObject('oShop\Models\Product');  // On récupère un objet de type Product
        return $brandName;
    }

    public function findBrandNameForProduct(int $id)
    {
        $sql="SELECT product.*, brand.name AS brand_name, category.name AS category_name, type.name AS type_name
        FROM `product`
        INNER JOIN brand ON product.brand_id = brand.id
        LEFT JOIN category ON product.category_id = category.id
        INNER JOIN type ON product.type_id = type.id
        WHERE product.id = {$id}";

        $pdo = Database::getPDO();  // On récupère la connexion à PDO
        $pdoStatement = $pdo->query($sql);  // On exécute la requête

        $brandName = $pdoStatement->fetchObject('oShop\Models\Product');  // On récupère un objet de type Product
        return $brandName;
    }


    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of rate
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @return  self
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of type_id
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }
 }