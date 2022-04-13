<?php 

namespace oShop\Models;

use PDO;
use oShop\Utils\Database;

class Brand extends CoreModel {
    private $name;
    private $footer_order;

    public function findTopFiveFooter()
    {
         // Seule la requête change par rapport à findAll()
         $sql = 'SELECT *
         FROM `brand`
         WHERE `footer_order` != 0
         ORDER BY `footer_order` ASC
         LIMIT 5';

         // On récupère la connexion à PDO
        $pdo = Database::getPDO();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // On récupère un objet de type Brand
        $brands = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'oShop\Models\Brand');

        // On le renvoie
        return $brands;
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
     * Get the value of footer_order
     */ 
    public function getFooter_order()
    {
        return $this->footer_order;
    }

    /**
     * Set the value of footer_order
     *
     * @return  self
     */ 
    public function setFooter_order($footer_order)
    {
        $this->footer_order = $footer_order;

        return $this;
    }
}