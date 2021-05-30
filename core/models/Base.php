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


    public function timeAgo($datetime){
        $time = strtotime($datetime);
        $current = time();
        $seconds = $current - $time;
        $minutes = round($seconds / 60); 
        $hours = round($seconds / 3600);
        // $days = round($seconds / 3600*24);
        // $weeks = round($seconds /3600*24*7);
        $months = round($seconds /2600640);
        // $years = round($seconds /3600*24*365);

        if ($seconds <= 60){
            if($seconds == 0){
                return 'posted now';
            }else{
                return ''.$seconds.' seconds ago';
            }
        }else if($minutes <= 60){
            return ''.$minutes.' minutes ago';
        }else if($hours <= 24){
            return ''.$hours.' hours ago';
        }else if ($months <= 24){
            return ''.date('M j', $time);
        }else{
            return ''.date('j M Y', $time);
        }
           
    }
}
?>