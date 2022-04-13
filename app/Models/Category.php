<?php 

namespace oShop\Models;

use PDO;
use oShop\Utils\Database;

class Category extends CoreModel {
    private $name;
    private $subtitle;
    private $picture;
    private $home_order;

    /**
     * Get one category by its id
     *
     * @param int $id Category primary Key
     * @return Category Category found
     */
    public function find(int $id) : Category
    {
        $sql = "SELECT * FROM category WHERE id={$id}"; // Requête pour une catégorie


        $pdo = Database::getPDO();  // On récupère la connexion à PDO

        $pdoStatement = $pdo->query($sql);  // On exécute la requête


        $category = $pdoStatement->fetchObject('oShop\Models\Category');  // On récupère un objet de type Category

        return $category;
    }

    // On le renvoie
    /**
     * Get all Category
     */
    public function findAll(int $id) : array
    {
        $sql = "SELECT * FROM `product` WHERE `category_id`={$id}";

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);

        $category = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Category'); // On récupère un tableau d'objets de type Product
        return $category;
        
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
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
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

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
     * Get the value of home_order
     */ 
    public function getHome_order()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *
     * @return  self
     */ 
    public function setHome_order($home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }
}