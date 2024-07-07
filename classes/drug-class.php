<?php 
class drug extends Connection
{
    public function get_drug($id=null)
    {
        $add="";
        if($id!=null)
        {
            $add.=" WHERE DID=$id";
        }
        $sql="SELECT * FROM drug".$add;
        $query=mysqli_query($this->conn,$sql);
        return $query;
    }

}
?>