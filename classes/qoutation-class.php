<?php 
class qoutation extends Connection
{
    public function insert_qoute($drug_id,$pres_id,$drug,$price,$qty,$amount)
    {
        $sql="INSERT INTO `qoutation`(`drug_id`, `pres_id`, `drugs`, `prices`, `quantitys`, `amounts`) VALUES ('$drug_id','$pres_id','$drug','$price','$qty','$amount')";
        $query=mysqli_query($this->conn,$sql);
        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function user($id)
    {
        $sql="SELECT * FROM `users` WHERE USID='$id'";
        $query=mysqli_query($this->conn,$sql);
        return $query;
    }
    public function select_pres($pres_id)
    {
        $sql="SELECT * FROM `prescription` WHERE id='$pres_id'";
        $query=mysqli_query($this->conn,$sql);
        return $query;
    }
    public function update_pres_status($pres_id,$status)
    {
        $sql="UPDATE prescription SET status='$status' WHERE id='$pres_id'";
        $query=mysqli_query($this->conn,$sql);
        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function notification($description,$user)
    {
        $sql="INSERT INTO `notification`(`notification`, `USID`) VALUES ('$description','$user')";
        $query=mysqli_query($this->conn,$sql);

    }
    public function get_qoute($pres_id)
    {
        $sql="SELECT * FROM `qoutation` WHERE `pres_id`='$pres_id'";
        $query=mysqli_query($this->conn,$sql);
        return $query;
    }
}
?>