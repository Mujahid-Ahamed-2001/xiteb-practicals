<?php 
class login extends Connection
{
    public function login($email,$password)
    {
        $sql="SELECT * FROM users WHERE email='$email' && password='$password'";
        $query=mysqli_query($this->conn,$sql);
        return $query;
    }
}
?>