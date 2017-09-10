<?php

class Page extends Model
{

    public function getList()
    {
        // Текст запроса к БД
        $sql = "SELECT  title, content FROM pages";
        $q = $this->db->query($sql);
        $array = array();
        $i = 0;
        while ($r = $q->fetch(PDO::FETCH_ASSOC)) {
            $array[$i]['title'] = $r['title'];
            $array[$i]['content'] = $r['content'];
            $i++;
        }
        return $array;
    }

    public function getByAlias($alias)
    {
        //Соединение с базой данных

        $sql = 'SELECT * FROM pages WHERE alias = :alias';

        //подгоовка запроса
        $result = $this->db->prepare($sql);

        $result->bindParam(':alias', $alias, PDO:: PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        //выполнение запроса
        $result->execute();

        //возвращение результата
        return $result->fetch();

    }
}


