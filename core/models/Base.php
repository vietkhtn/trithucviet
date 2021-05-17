<?php 

Class Base{
    protected $pdo;

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($table, $fields = array()) {
        $columns = implode(',', array_keys($fields)); // first-name, last-name, email,...
        $values = ':'.implode(', :', array_keys($fields)); // :firstname, :lastname,...
        $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})"; // INSERT INTO users (first-name, last-name, email) VALUES (:firstname, :lastname, :email,...);
        
        // Binding varialble to keys 
        if ($statement = $this->pdo->prepare($sql)){
            foreach ($fields as $key => $data) {
                $statement->bindValue(':'.$key, $data);
            }
            $statement->execute();
            return $this->pdo->lastInsertId();
        }
    }

    public function update($table, $userId, $fields = array()) {
        $columns = '';
        $i = 1;

        foreach ($fields as $name => $value){
            $columns .= "{$name} = :{$name}"; //coverPic = :coverPic
            // if mutiple field update, add comma between columns
            if($i < count($fields)){
                $columns .= ',';
            }
            $i++;
        }
        // Update Query
        $sql = "UPDATE {$table} SET {$columns} WHERE user_id = {$userId}";

        // Binding value to sql query
        if($statement = $this->pdo->prepare($sql)){
            foreach ($fields as $key =>$value){
                $statement->bindValue(':'.$key, $value);
            }
        }
        $statement->execute();
    }
}

?>