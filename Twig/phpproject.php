 <?php
 require_once __DIR__.'/bootstrap.php';
 include 'dbconnection.php';

//Category
 $res = mysqli_query($con , "SELECT * FROM Category");
 while ($rec = mysqli_fetch_array($res)) 
 {
   $data[] = array(
      'category_id' => $rec['category_id'],
      'name' => $rec['name'],
      'order_no' => $rec['order_no']
   );
 }

//User
 $user = mysqli_query($con , "SELECT * FROM User");
 while ($urec = mysqli_fetch_array($user)) 
 {
   $udata[] = array(
      'user_id' => $urec['user_id'],
      'name' => $urec['name'],
      'email' => $urec['email'],
      'created_at' => $urec['created_at'],
      'updated_at' => $urec['updated_at']
   );
 }

 //Location
 $location = mysqli_query($con , "SELECT * FROM Location WHERE parent_id != 0");
 while ($lrec = mysqli_fetch_array($location)) 
 {
   $p_name = mysqli_fetch_array(mysqli_query($con, "SELECT name AS perent_name FROM Location WHERE location_id = '".$lrec['parent_id']."' "));

   $ldata[] = array(
      'location_id' => $lrec['location_id'],
      'parent_id' => $lrec['parent_id'],
      'name' => $lrec['name'],
      'pname' => $p_name['perent_name']
   );
 }

 //Product
 $product = mysqli_query($con , "SELECT u.name AS uname,l.name AS lname,c.name AS cname,p.product_name,p.price,p.status,p.created_at,p.updated_at FROM Product p 
   JOIN User u ON p.user_id = u.user_id 
   JOIN Location l ON p.location_id = l.location_id 
   JOIN Category c ON p.category_id = c.category_id
   ");
 while ($prec = mysqli_fetch_array($product)) 
 {
   $pdata[] = array(
      'uname' => $prec['uname'],
      'lname' => $prec['lname'],
      'cname' => $prec['cname'],
      'product_name' => $prec['product_name'],
      'price' => $prec['price'],
      'status' => $prec['status'],
      'created_at' => $prec['created_at'],
      'updated_at' => $prec['updated_at']
   );
 }


 // Render our view
 if ($_GET['status']=='NO') 
 {
   echo $twig->renderBlock('form_block');
 }
 else
 {
   echo $twig->render(
    'phpproject.html.twig',
     array('cdata'=>$data,'udata'=>$udata,'ldata'=>$ldata,'pdata'=>$pdata)    
    );  
 }
 
 
$twig->addExtension(new CacheExtension());
$twig->addExtension(new \Twig\Extension\SandboxExtension());
?>
