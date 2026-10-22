<?php

    namespace App\Models;

    use PDO;
    use App\Core\DB;

    abstract class Model {
        protected PDO $db;
        protected string $table;

        public function __construct()
        {
            $this->db= DB::getConnection();
        }

        public function getByID (int $id):?array {
            $sql="SELECT * FROM {$this->table} WHERE id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->execute([":id" => $id]);
            return $stmt->fetch() ? :null;
        }

        public function create(array $data):?array { // INSERT on db
            $values = implode(",", array_map(fn($v) => is_string($v) ? "'$v'" : $v, array_values($data)));
            $fields = implode(",",array_keys($data));
            $sql="INSERT INTO {$this->table}({$fields}) VALUES ({$values});";
            dd($sql);
            $stmt=$this->db->prepare($sql);
            if ($stmt->execute($data)) {
                return $data;
            }
            return null;
        }

        public function modify(int $id) { // UPDATE on db
            $sql="";
            $stmt=$this->db->prepare($sql);
            $stmt->execute([":id" => $id]);
        }

        public function delete(int $id) { // DELETE on db
            $sql="";
            $stmt=$this->db->prepare($sql);
            $stmt->execute([":id" => $id]);
        }
    }
?>