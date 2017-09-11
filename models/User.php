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


    public function checkEmailAndImage($email)
    {
        $sql = 'SELECT email, image FROM users WHERE email = :email limit 1';

        $result = $this->db->prepare($sql);
        $result->bindParam(':email', $email, PDO:: PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();

    }

    public function regUser($login, $email, $password, $image = null, $facebookId = null)
    {
        $sql = 'INSERT INTO users (login, email, password, image, facebook_id) '
            . 'VALUES (:login, :email, :password, :image, :facebook_id)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':facebook_id', $facebookId, PDO::PARAM_STR);
        return $result->execute();
    }

    public function chekUnicFacebookId($facebookId)
    {
        $sql = 'SELECT facebook_id, image FROM users WHERE facebook_id = :facebook_id limit 1';

        $result = $this->db->prepare($sql);
        $result->bindParam(':facebook_id', $facebookId, PDO:: PARAM_INT);
        $result->bindParam(':facebook_id', $facebookId, PDO:: PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();

    }

}




