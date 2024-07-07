<?php 
class notification extends Connection
{
    public function notification()
    {
        $user=$_SESSION["user_login"]["USID"];
        $sql="SELECT * FROM notification WHERE USID='$user'";
        $query=mysqli_query($this->conn,$sql);
        return $query;
    }
}
?>