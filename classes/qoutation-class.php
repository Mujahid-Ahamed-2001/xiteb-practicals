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
    public function get_qoute($pres_id)
    {
        $sql="SELECT * FROM `qoutation` WHERE `pres_id`='$pres_id'";
        $query=mysqli_query($this->conn,$sql);
        return $query;
    }
}
?>