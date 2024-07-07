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
    public function user_get_prescription($id=null)
    {
        $user=$_SESSION["user_login"]["USID"];
        $add=" ";
        $end=" ORDER BY prescription.id DESC";
        if($id!=null)
        {
            $add.=" AND prescription.id='$id' ";
        }
        $sql="SELECT * FROM prescription 
        INNER JOIN documents ON documents.pres_id=prescription.id
        WHERE prescription.user='$user' AND documents.featured=1 ".$add.$end;
        $query=mysqli_query($this->conn,$sql);
        return $query;

    }
    public function get_all_prescription()
    {
        $sql="SELECT * FROM prescription 
        INNER JOIN documents ON documents.pres_id=prescription.id
        WHERE documents.featured=1 ORDER BY prescription.id DESC";
        $query=mysqli_query($this->conn,$sql);
        return $query;
    }
    public function documents($prescription_id, $feature)
    {
        $sql="SELECT * FROM documents WHERE pres_id=$prescription_id AND featured=$feature";
        $query=mysqli_query($this->conn,$sql);
        return $query;
    }
    public function notification($description,$user)
    {
        $sql="INSERT INTO `notification`(`notification`, `USID`) VALUES ('$description','$user')";
        $query=mysqli_query($this->conn,$sql);

    }
    public function get_admin()
    {
        $sql="SELECT * FROM users WHERE usertype=1";
        $query=mysqli_query($this->conn,$sql);
        return $query;
    }
    public function update_accept($status,$pres_id)
    {
        $sql="UPDATE prescription SET accept_reject='$status' WHERE id='$pres_id'";
        $query=mysqli_query($this->conn,$sql);
        if($status==1)
        {
            $description="Qoutation Accepted";
        }
        else
        {
            $description="Qoutation Rejected";
        }
        $admins=$this->get_admin();
        while ($row=mysqli_fetch_assoc($admins)) 
        {
            $user=$row["USID"];
            $this->notification($description,$user);
        }
        if ($query) 
        {
            return true;
        }
        else 
        {
            return false;
        }
    }
}
?>