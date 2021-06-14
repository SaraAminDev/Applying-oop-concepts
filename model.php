<?php

//database connection

class Model{
    
    private $servername='localhost';
    
    private $username='root';
    
    private $password='';
    
    private $dbname='crudop';
    
    private $conn;
    
    function __construct()
    {
        $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
        
        if($this->conn->connect_error)
        {
            
            echo 'connection Failed';
        }else
        {
            
            return $this->conn;
        }
        
        
    }//constructorclosed
      
    //function defined for insert records
    
     public function insertRecord($post)
     {
        $name=$_POST['name'];
         
         $email=$_POST['email'];
         
         $sql="INSERT INTO users (name,email) VAlUES ('$name','$email')";
         
         $result=$this->conn->query($sql);
         
         if($result)
         {
             
             header('location: index.php?msg=ins');
         }else
         {
             
             echo "ERROR".$sql."<br>".$this->conn->error;
         }
         
     }// insert function is closed
    
    
      public function updateRecord($post)
     {
        $name=$_POST['name'];
         
         $email=$_POST['email'];
          
        $id=$post['hid'];
         
         $sql="UPDATE users SET name='$name',email='$email' WHERE id='$id' ";
         
         $result=$this->conn->query($sql);
         
         if($result)
         {
             
             header('location: index.php?msg=ups');
         }else
         {
             
             echo "ERROR".$sql."<br>".$this->conn->error;
         }
      }
    
    
    public function deleteRecord($delid)
    {
         
         $sql="DELETE FROM users WHERE id='$delid'";
        
         
         $result=$this->conn->query($sql);
        
        if($result)
         {
             
             header('location: index.php?msg=del');
         }else
         {
             
             echo "ERROR".$sql."<br>".$this->conn->error;
         }
        
        
    }
    
    
    public function displayRecord()
    {
        
        $sql="SELECT * FROM users";
        
        $result=$this->conn->query($sql);
        
        if($result->num_rows>0)
            
        {
     while($row=$result->fetch_assoc())
         
     {  
         $data[]=$row;
         
         
     }//whileclose
        
        return $data;
        
        }//if close
          
    }//displayRecord close
    
    
    public function displayRecordById($editid)
        
    {
        $sql="SELECT * FROM users WHERE id='$editid'";

        $result=$this->conn->query($sql);
        
        if($result->num_rows==1){

            $row=$result->fetch_assoc();
        
          return $row;
        }// if close
        
    }//displayrecordById closed
    
  
    
    
}//class closed





?>