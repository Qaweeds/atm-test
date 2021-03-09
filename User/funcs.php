<?php
include_once "../_autoload.php";

/**
 *
 */
class User extends Controller
{
    protected static $menuOption = 'user';

    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $phone;

    public function setUser($f_name, $l_name, $email_, $pass, $phone_ = '')
    {
        $this->firstname = $f_name;
        $this->lastname = $l_name;
        $this->email = $email_;
        $this->password = $pass;
        $this->phone = $phone_;
    }

    public function check_email()
    {
        $query = "SELECT id FROM user WHERE email = :email";
        $this->db
            ->prepare($query)
            ->bindValue(':email', $this->db->escape($this->email))
            ->execute();

        $res = $this->db->fetchAll();

        return $res;
    }

    public function getUser($id)
    {
        $query = "SELECT * FROM `user` WHERE `id` = :id";
        $this->db
            ->prepare($query)
            ->bindValue(':id', $this->db->escape($id), DataBase::PARAM_INT)
            ->execute();

        return $this->fetchRow();
    }

    public function getUsers($order = 'id', $param = false)
    {
        $sql = ($param) ? "SELECT * FROM user ORDER BY :order DESC"
            : "SELECT * FROM user ORDER BY :order";

        $this->db
            ->prepare($sql)
            ->bindValue(':order', $this->db->escape($order))
            ->execute();

        return $this->db->fetchAll();
    }

    public function postUser()
    {
        $checked = $this->check_email();
        if (!$checked) {
            $sql = "INSERT INTO user(`firstname`, `lastname`, `email`, `password`, `phone`, `created_at`)
                VALUES(:firstname, :lastname, :email, :password, :phone, :created_at)";

            $this->db
                ->prepare($sql)
                ->bindValue(':firstname', $this->db->escape($this->firstname))
                ->bindValue(':lastname', $this->db->escape($this->lastname))
                ->bindValue(':email', $this->db->escape($this->email))
                ->bindValue(':password', $this->db->escape($this->password))
                ->bindValue(':phone', $this->db->escape($this->phone))
                ->bindValue(':created_at', (new DateTime())->format('Y-m-d H:i:s'))
                ->execute();

            return true;
        } else {
            return false;
        }
    }

    public function putUser($id)
    {
        $sql = "UPDATE user
            SET firstname = :firstname,
                lastname = :lastname,
                email = :email,
                password = :password,
                phone = :phone
            WHERE id = :id";

        $this->db
            ->prepare($sql)
            ->bindValue(':firstname', $this->db->escape($this->firstname))
            ->bindValue(':lastname', $this->db->escape($this->lastname))
            ->bindValue(':email', $this->db->escape($this->email))
            ->bindValue(':password', $this->db->escape($this->password))
            ->bindValue(':phone', $this->db->escape($this->phone))
            ->bindValue(':id', $this->db->escape($id), DataBase::PARAM_INT)
            ->execute();

        return true;
    }

    public function deleteUser($id)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $this->db
            ->prepare($sql)
            ->bindValue(':id', $this->db->escape($id), DataBase::PARAM_INT)
            ->execute();

        return true;
    }

    public function getUserRole($id)
    {
        $sql = "SELECT role FROM user WHERE id = :id";
        $this->db
            ->prepare($sql)
            ->bindValue(':id', $this->db->escape($id), DataBase::PARAM_INT)
            ->execute();

        return $this->db->fetchAll();
    }
}

$user_arr = array(
    'id',
    'firstname',
    'lastname',
    'email',
    'phone',
    'created_at'
); //массив для сортировки
