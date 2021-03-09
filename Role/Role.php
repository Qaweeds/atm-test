<?php

/**
 * 1. Создать класс Role
 * a. DB таблица role.
 * b. Поля DB таблицы
 * id ­ int, 5, primary key, autoincrement,
 * role ­ varchar, 20
 * c. Сущности
 * role
 * d. Методы
 * getRole ­ получить роль
 * getRoles ­ получить список ролей
 * postRole ­ сохранить роль
 * putRole ­ обновить роль
 * deleteRole ­ удалить роль
 * getUsersByRole ­ получение списка пользователей по роли
 */
class Role extends Controller
{
    protected static $menuOption = 'role';

    public $role;

    public function setR($arr)
    {
        $this->role = $arr;
    }

    public function getRole()
    {
        $this->role;
    }

    public function getRoles($tbl_name, $options = array())
    {
        $sql = "SELECT * FROM $tbl_name ORDER BY id";
        $this->db
            ->prepare($sql)
            ->execute();

        return $this->db->fetchAll();
    }

    public function postRole($table, $role)
    {
        $sql = "INSERT INTO $table (`role`) VALUES (:role)";
        $this->db
            ->prepare($sql)
            ->bindValue(':role', $this->db->escape($role))
            ->execute();

        return 'Данные успешно сохранены';
    }

    public function putRole($table, $id, $role)
    {
        $sql = "UPDATE $table SET role=:role WHERE id=:id";
        $this->db
            ->prepare($sql)
            ->bindValue(':role', $this->db->escape($role))
            ->bindValue(':id', $this->db->escape($id), DataBase::PARAM_INT)
            ->execute();

        return 'Данные успешно обновлены';
    }

    public function deleteRole($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=:id";
        $this->db
            ->prepare($sql)
            ->bindValue(':id', $this->db->escape($id), DataBase::PARAM_INT)
            ->execute();

        return true;
    }

    public function getUsersByRole()
    {
//        $sql = "SELECT `user` FROM $tbl_name WHERE id=:id";
        $sql = "SELECT u.firstname,r.role FROM user_role ur
            JOIN user u ON ur.user_id=u.id
            JOIN role r ON ur.role_id=r.id;";

        $this->db
        ->prepare($sql)
//        ->bindValue(':id', $this->db->escape($id), DataBase::PARAM_INT)
        ->execute();

        return $this->db->fetchAll();
    }

    public function setUsersByRole($user_id, $role_id)
    {
        $sql = "INSERT INTO user_role (`user_id`,`role_id`) VALUES (:userId, :roleId)";
        $this->db
            ->prepare($sql)
            ->bindValue(':userId', $this->db->escape($user_id), DataBase::PARAM_INT)
            ->bindValue(':roleId', $this->db->escape($role_id), DataBase::PARAM_INT)
            ->execute();

        return 'Пользователь получил роль';
    }
}
//
//$role=new Role();
//$role->getRoles('role');
