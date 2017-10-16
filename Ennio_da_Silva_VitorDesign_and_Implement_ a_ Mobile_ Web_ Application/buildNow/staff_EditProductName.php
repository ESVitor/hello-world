<!DOCTYPE html>



<html>
    
    <head>
        
        <title> Staff_EditProductName</title>
        
        <?php
            include('header.php');
        ?>
    
    </head>
    
       
    <body>
        
        <div id="div2" >
        
            <?php
           
                if($_POST){
                    
                    $product_id = $_POST['text-1'];
                    $name = $_POST['text-2'];
                
                    try {
                        
                        include('db.php');
                        
                        $sql = "UPDATE products SET name = ? WHERE product_id= ?";
                        $sth = $DBH->prepare($sql);

                        
                        $sth->bindParam(1,$name, PDO::PARAM_INT);
                        $sth->bindParam(2,$product_id, PDO::PARAM_INT);

                        $sth->execute();
  
                    } catch(PDOException $e) {echo $e;}
                
                echo '<h3 style="color:red">The product name is updated</h3><br>';    
                }
            ?>
            <br>
            <h3>Edit product's name</h3>
            
            <form action="staff_EditProductName.php" method="post">
            
               Product ID:<input type="text" name="text-1" id="text-1"/>
               Name:<input type="text" name="text-2" id="text-2"/>
               <button type="submit1" class="ui-btn ui-corner-all">update! </button>
            
            </form>
        
        </div>
        
        <a href="staff.php"  data-transition="fade" class="ui-btn">Return to Staff page</a>
        
        <?php
            include('footer.php');
        ?>
        
    </body>
</html>