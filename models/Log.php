<?php
class Log
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addLog($id, $action) {
        $sql = "INSERT INTO activity_logs (activity_by, activity)
                VALUES (:id, :activity)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'        => $id,
            ':activity'  => $action
        ]);
    }
}
?>