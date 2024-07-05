<?php 
class signup extends Connection
{
    public function emailvalidate($email)
    {
        $sql="SELECT * FROM users WHERE email='$email'";
        $query=mysqli_query($this->conn,$sql);
        $count=mysqli_num_rows($query);
        if($count>0)
        {
            return false;
        }
        else
        {
            return true;
        }

    }
    public function create_user($name,$email,$address,$phone,$dob,$password)
    {
        $sql="INSERT INTO `users`( `name`, `email`, `address`, `phone`, `dob`, `password`) VALUES ('$name','$email','$address','$phone','$dob','$password')";
        $query=mysqli_query($this->conn,$sql);
        if($query)
        {
            $last_id = mysqli_insert_id($this->conn);
            return $last_id;
        }
        else
        {
            return false;
        }
    }
    public function get_user_by_id($id)
    {
        $sql="SELECT * FROM users WHERE USID='$id'";
        $query=mysqli_query($this->conn,$sql);
        return  $query;
    }
}
?>