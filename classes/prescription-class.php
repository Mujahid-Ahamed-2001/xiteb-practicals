<?php
class prescription extends Connection
{
    public function upload_prescrion($delivery,$time,$note)
    {
        $user=$_SESSION["user_login"]["USID"];
        $sql="INSERT INTO `prescription`( `user`, `delivery_address`, `delivery_time`, `note`) VALUES ('$user','$delivery','$time','$note')";
        $query=mysqli_query($this->conn,$sql);
        if($query)
        {return true;}
        else
        {return false;}
    }
    public function upload_document($presID,$fileName,$feature)
    {
        $user=$_SESSION["user_login"]["USID"];
        $sql="INSERT INTO `documents`(`user`, `pres_id`, `source`,`featured`) VALUES ('$user','$presID','$fileName','$feature')";
        $query=mysqli_query($this->conn,$sql);
        if($query)
        {return true;}
        else
        {return false;}
    }
}
?>