<!DOCTYPE html>



<html>
    
    <head>
        
        <title> AdminPassword</title>
        
        <?php
            include('header.php');
        ?>
    
    </head>
    
   
    <body>
        
       <div id="div4" >
        
            <?php
            
                if($_POST){
                    
                    $user_id2 = $_POST['text-5'];
                    $password = $_POST['text-6'];
                
                    try {

                        include('db.php');

                        
                        $sql = "UPDATE users SET password = ? WHERE user_id= ?";
                        $sth = $DBH->prepare($sql);

                        
                        $sth->bindParam(1,$password, PDO::PARAM_INT);
                        $sth->bindParam(2,$user_id2, PDO::PARAM_INT);

                        $sth->execute();
  
                    } catch(PDOException $e) {echo $e;}
                
                echo '<h3 style="color:red">The password is updated</h3><br>';    
                }
            ?>
            <br>
            <h3>Edit user's password</h3>
            
            <form action="#div4" method="post">
            
               User ID:<input type="text" name="text-5" id="text-5"/>
               Password:<input type="text" name="text-6" id="text-6"/>
               <button type="submit" class="ui-btn ui-corner-all">update! </button>
            
            </form>
        
        </div>
        
        <a href="admin.php"  data-transition="fade" class="ui-btn">Return to administrator page</a>
        
        <?php
            include('footer.php');
        ?>
        
    </body>
</html>