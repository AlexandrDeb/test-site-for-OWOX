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


    public function checUnicEmail($email)
    {
        $sql = 'SELECT email FROM users WHERE email = :email limit 1';

        $result = $this->db->prepare($sql);
        $result->bindParam(':email', $email, PDO:: PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        
        return $result->fetch();

    }

    public function regUser($login, $email, $password)
    {
        $role = 1;
        $sql = 'INSERT INTO users (login, email, password, role) '
            . 'VALUES (:login, :email, :password, :role)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $this->db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);
        return $result->execute();
    }

}




