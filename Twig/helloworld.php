 <?php

 require_once __DIR__.'/bootstrap.php';

 $parameters = [
 'my_var' => 'Hello world !!!',
 'name' => 'Charmi ',
 'surname' => ' Hirapara',
 'title' => 'Twig - Dynamic Title'
 ];

 $user = array(
    'name'=> 'geeta ',
    'age' => 18,
    'gender' => ' Female'
 ); 


 // Render our view
 echo $twig->render(
    'helloworld.html.twig', 
     array('user'=>$user, 'parameters'=>$parameters)
    );
 
$twig->addExtension(new CacheExtension());
$twig->addExtension(new \Twig\Extension\SandboxExtension());
?>
