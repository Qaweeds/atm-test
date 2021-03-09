<?php
include_once "../_autoload.php";

class Gallery extends Controller
{
    protected static $menuOption = 'gallery';

    public function postGallery($title, $desc)
    {
        $query = "INSERT INTO gallery(`title`, `description`, `created_at`) VALUES (:title, :description, :createdAt)";
        $this->db
            ->prepare($query)
            ->bindValue(':title', $this->db->escape($title))
            ->bindValue(':description', $this->db->escape($desc))
            ->bindValue(':createdAt', (new DateTime())->format('Y-m-d H:i:s'))
            ->execute();

        return true;
    }

    public function getGallery($update)
    {
        $query = "SELECT `title`, `description` FROM gallery WHERE `id` = :id";
        $this->db
            ->prepare($query)
            ->bindValue(':id', $this->db->escape($update), DataBase::PARAM_INT)
            ->execute();

        return $this->db->fetchAll();
    }

    public function getGalleries()
    {
        $query = "SELECT * FROM gallery";
        $this->db
            ->prepare($query)
            ->execute();

        return $this->db->fetchAll();
    }

    public function putGallery($title, $desc, $update)
    {
        $query = "UPDATE gallery SET `title` = :title, `description` = :description WHERE `id` = :id";
        $this->db
            ->prepare($query)
            ->bindValue(':title', $this->db->escape($title))
            ->bindValue(':description', $this->db->escape($desc))
            ->bindValue(':id', $this->db->escape($update), DataBase::PARAM_INT)
            ->execute();

        return true;
    }

    public function deleteGallery($delete)
    {
        $query = "DELETE FROM gallery WHERE `id` = :id";
        $this->db
            ->prepare($query)
            ->bindValue(':id', $this->db->escape($delete), DataBase::PARAM_INT)
            ->execute();

        return true;
    }
}



