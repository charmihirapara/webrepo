 <?php
 require_once __DIR__.'/bootstrap.php';
 include 'dbconnection.php';

 $user = array(
    'name'=> 'geeta ',
    'age' => 18,
    'gender' => ' Female'
 ); 

 $res = mysqli_query($con , "SELECT * FROM Category");
 $data = array();
 $co = 1;
 while ($rec = mysqli_fetch_array($res)) 
 {
   $data['name'] .= $rec['name']."\n";
   $data['category_id'] .= $rec['category_id'];
   $data['order_no'] .= $rec['order_no'];
 }


 // Render our view
 echo $twig->render(
    'phpproject.html.twig',
    array('record'=>$data)
    );
 
$twig->addExtension(new CacheExtension());
$twig->addExtension(new \Twig\Extension\SandboxExtension());
?>
