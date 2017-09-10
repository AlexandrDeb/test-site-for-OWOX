<?php

class User extends Model
{

    public function getByLogin($email)
    {
        $sql = 'SELECT * FROM users WHERE email = :email limit 1';

        $result = $this->db->prepare($sql);
        $result->bindParam(':email', $email, PDO:: PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();


        return $result->fetch();

    }

}




