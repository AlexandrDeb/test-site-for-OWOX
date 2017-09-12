<?php

class Privat extends Model
{
    public function getPost()
    {
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

}