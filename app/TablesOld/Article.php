<?php
namespace App\Table;

use App\App;

class Article extends Table {

    protected static  $table = 'article';

    public static function getLast(){
        return self::query("
                                    SELECT article.id,article.titre,contenu, categories.titre as categorie 
                                    FROM article 
                                    LEFT JOIN categories 
                                        ON category_id = categories.id
                                        ");
    }


    public static function lastByCategory($categorie_id){
        return self::query("
                                    SELECT article.id,article.titre,contenu, categories.titre as categorie 
                                    FROM article 
                                    LEFT JOIN categories 
                                        ON category_id = categories.id
                                    WHERE category_id = ?
                                        ", [$categorie_id]);

    }

    public function getUrl(){
        return 'index.php?p=article&id='.$this->id;
    }

    public function getExtrait(){
        $html = '<p>'.substr($this->contenu,0,100).'......</p>';
        $html .= '<p><a href="'.$this->getURL().'">Voir la suite</a></p>';
        return $html;
    }
}