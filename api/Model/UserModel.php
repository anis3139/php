<?php
require_once PROJECT_ROOT_PATH . "/Model/Database.php";

class UserModel extends Database
{
    public function getUsers($limit)
    {
        return $this->select("SELECT * FROM users ORDER BY user_id ASC LIMIT ?", ["i", $limit]);
    }
    public function getUsersById($id)
    {
        return $this->select("SELECT * FROM users WHERE user_id = '{$id}' LIMIT 1");
    }
    public function destroy($id)
    {
        return $this->delete("DELETE FROM users WHERE user_id = '{$id}'");
    }
}