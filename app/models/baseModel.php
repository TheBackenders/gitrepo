<?php

require __DIR__ . '\..\database\connection.php';
require_once 'Family.php';

class baseModel
{
    protected $connection;
    public function __construct()
    {


        $this->connection = \Connection::getConnection();
    }
    public function all($table_name, $args)
    {

        $query_str = '';
        foreach ($args as $column) {

            $query_str = $query_str . $column . ',';
        }


        $query = 'SELECT ' . rtrim($query_str, ',') . ' FROM ' . $table_name;
        $result = $this->connection->query($query);
        // var_dump($result);
        return $result;
    }

    public function getOne($table_name, $args, $values)
    {
        try {
            $query_str = '';
            foreach ($args as $column) {

                $query_str = $query_str . $column . ',';
            }

            $query = 'SELECT * FROM ' . $table_name . ' WHERE ' . rtrim($query_str, ',') . "=?";

            $stmt = $this->connection->prepare($query);

            $stmt->execute($values);
            return $stmt;


        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }


    public function getObjectById($table_name, $id)
    {
        try {


            $query = 'SELECT * FROM ' . $table_name . ' WHERE id =:id';

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Family');
            return $stmt->fetch();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function deleteObjectById($table_name, $id)
    {
        try {


            $query = 'DELETE FROM ' . $table_name . ' WHERE id =?';
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(1, $id);
            return $stmt->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    public function updateById($table_name, $values, $columns, $id)
    {

        $query_str = '';
        foreach ($columns as $column) {
            $query_str = $query_str . $column . '=?,';
        }





        $query = 'UPDATE ' . $table_name . ' SET ' . rtrim($query_str, ',') . " WHERE id" . "=" . $id . "";
        //die($query);
        $stmt = $this->connection->prepare($query);

        $stmt->execute($values);




    }

    public function insert($table_name, $args, $values)
    {

        $query_str = '';
        $values_str = '';

        foreach ($args as $column) {
            $query_str = $query_str . $column . ',';
            $values_str = $values_str . '?,';
        }
        $query = 'INSERT INTO ' . $table_name . '(' . rtrim($query_str, ',') . ') VALUES (' . rtrim($values_str, ',') . ')';
        try {
            $stmt = $this->connection->prepare($query);
            $count = 1;
            foreach ($values as $value) {
                $stmt->bindValue($count, $value);
                $count = $count + 1;
            }
            echo '<pre>';

            $stmt->execute();
            ;
        } catch (\Exception $ex) {
            echo ($ex->getMessage());
        }
        // die($query);

    }
}








?>