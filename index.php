<?php

// include model here

include('model.php');

$obj = new Model();

//insert record

if(isset($_POST['submit']))
    
{ 
    // to insert record
    
    $obj->insertRecord($_POST);
        
}

if(isset($_POST['update']))
    
{   
     $obj->updateRecord($post);
    
}

if(isset($_GET['del']))
{
    $delid=$_GET['del'];
     $obj-> deleteRecord($delid);
    
}


?>



<html>

    <head><title>CRUD operations in PHP oops</title>
    
        <style>
            h2{
                
                text-align: center;
                
            }
            
            
          h4{
                
                text-align: center;
                color:aqua;
            }
                      
      form 
           {
            
            
            width: 500px;
            margin: 50px auto;
            text-align: left;
            padding: 20px;
            border: 1px solid #bbbbbb;
            
        } 
            .form-control
            {
                margin: 10px 0px 10px 0px;
                
            }
            
            .form-group label
            {
                
                
                  
            display: block;
            text-align: left;
            margin:3px;
           
                
            }
            
            .form-group input{
            
            height:30px;
            width:350px;
            padding: 5px 10px;
            font-size: 16px;
            border-radius :5px;
            border: 1px solid grey;
            background: #800000;
                
            
        }     
        .btn{
            
            padding: 10px;
            font-size: 15px;
            color: white;
            background: #5F9EA0;
            border:none;
            border-radius:5px;
            
         }    
        table{
    
    width:500px;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
    
}


tr{
    
    border-bottom: 1px solid #cbcbcb;
}

th,td{
    
    border: none;
    height: 30px;
    padding: 2px;
    color:firebrick;
    
}

tr:hover{
    
    background: #F5F5F5;
}    
            
        </style>
        
        
    </head>

    <body><br>
        <h2  style="color:aqua;">CRUD Operations in PHP</h2><br>
        
    <div class="container">
        
          <!-- success message -->
           <?php
            
            if(isset($_GET['msg'])AND $_GET['msg']=='ins')
            {
                
                echo '<div class="alert alert-primary" role = "alert"> record inserted successfully</div>';
            }
                
                ?>
        
        
        
          <!-- success message -->
           <?php
            
            if(isset($_GET['msg'])AND $_GET['msg']=='ups')
            {
                
                echo '<div class="alert alert-primary" role = "alert"> record updated successfully</div>';
            }
                
                ?>
        
        
        
          <!-- success message -->
           <?php
            
            if(isset($_GET['msg'])AND $_GET['msg']=='del')
            {
                
                echo '<div class="alert alert-primary" role = "alert"> record deleted successfully</div>';
            }
                
                ?>
       
        <?php
        
  /* fetch record for updating*/
        
        if(isset($_GET['editid']))
        {
            $editid=$_GET['editid'];
            
            $myrecord=$obj->displayRecordById($editid);
          
        
        ?> <!-- updated form -->
        
         <form action="index.php" method="POST">
         
            <div class="form-group">
                
                <label>Name</label>
                
                <input type="text" name="name" placeholder="enter your name" value="<?php echo $myrecord['name'];?>" class="form-control"/>
            </div>
            
            <div class="form-group">
                
                <label>Email</label>
                
                <input type="text" name="email" placeholder="enter your email"  value="<?php $myrecord['email']; ?>"class="form-control"/>
            </div>
            
          <div class="form-group">
              
              <input type="hidden" name="hid" value="<?php echo $myrecord['id'];?>">  
            <input type="submit" name="update" value="update" class="btn">
              
              
            </div>
        
        </form>
        
        <?php
            
        }else{
        
        ?>
        
        <form action="index.php" method="POST">
         
            <div class="form-group">
                
                <label>Name</label>
                
                <input type="text" name="name" placeholder="enter your name" class="form-control"/>
            </div>
            
            <div class="form-group">
                
                <label>Email</label>
                
                <input type="text" name="email" placeholder="enter your email" class="form-control"/>
            </div>
            
          <div class="form-group">
                
            <input type="submit" name="submit" value="submit" class="btn">
            </div>
        
        </form>
        <?php
        }// else close?>
           
        
        <h4>Display Records</h4>
      
       
        <table>
        
            <tr>
            
                <th>S.NO</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            
            </tr>
            <?php
            
      
            
            $data=$obj->displayRecord();
            $sno=1;
            
            foreach ($data as $value)
                
            {?>
            <tr>
                <td><?php echo $sno++; ?></td>
                
                <td><?php echo $value['name']; ?></td>
                
                <td><?php echo $value['email']; ?></td>
                
                 
                    <td><a  class="edit_btn" href="index.php?editid=<?php echo $value['id'];?>">Edit</a></td> 
                    
                <td><a  class= "btn" href="index.php?del=<?php echo $value['id'];?>">Delete</a></td>
                
                
            </tr>
            
                
            <?php    
            }//foreach close
            
            ?>
            
            
            
         </table>
        </div>
        
  
        
        
    </body>



</html>