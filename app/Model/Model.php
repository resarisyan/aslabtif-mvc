<?php

namespace App\Model;

use App\Config\Database;

class Model
{
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getWhere($criteria)
    {
        $where = $this->buildWhereClause($criteria);

        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE ' . $where);
        foreach ($criteria as $key => $value) {
            $this->db->bind($key, $value);
        }

        return $this->db->resultSet();
    }

    public function delete($criteria)
    {
        $where = $this->buildWhereClause($criteria);

        $query = 'DELETE FROM ' . $this->table . ' WHERE ' . $where;
        $this->db->query($query);

        foreach ($criteria as $key => $value) {
            $this->db->bind($key, $value);
        }

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function create($data)
    {
        $keys = array_keys($data);
        $fields = implode(", ", $keys);
        $placeholders = ":" . implode(", :", $keys);

        $query = "INSERT INTO " . $this->table . " ($fields) VALUES ($placeholders)";
        $this->db->query($query);

        foreach ($data as $key => $value) {
            $this->db->bind($key, $value);
        }

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update($criteria, $data)
    {
        $setString = "";
        foreach ($data as $key => $value) {
            $setString .= $key . " = :" . $key . ", ";
        }
        $setString = rtrim($setString, ", ");

        $where = $this->buildWhereClause($criteria);

        $query = "UPDATE " . $this->table . " SET " . $setString . " WHERE " . $where;
        $this->db->query($query);

        foreach ($data as $key => $value) {
            $this->db->bind($key, $value);
        }

        foreach ($criteria as $key => $value) {
            $this->db->bind($key, $value);
        }

        $this->db->execute();
        return $this->db->rowCount();
    }

    private function buildWhereClause($criteria)
    {
        $where = "";
        foreach ($criteria as $key => $value) {
            $where .= $key . " = :" . $key . " AND ";
        }
        $where = rtrim($where, " AND ");
        return $where;
    }
}
