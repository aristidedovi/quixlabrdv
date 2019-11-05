 <?php
 define('ROOT', dirname(__DIR__));
 require ROOT.'/app/App.php';

 App::load();
 $app = new \Core\Database\MysqlDatabase();
 $db_errors = $app->getPDO();
 //var_dump($db_errors);

 if(isset($_GET['p'])){
     $page = $_GET['p'];
 }else{
     if(is_numeric($db_errors)){
         if($db_errors == 1049 || $db_errors == 2002 || $db_errors == 1045  ){
             $page = 'users.db';
         }
     }else{
         $page = 'users.login';
     }
 }
//var_dump($page);
 $page = explode('.',$page);
 if($page[0] === 'admin'){
     $controller = '\App\Controller\Admin\\'.ucfirst($page[1]).'Controller';
     $action = $page[2];
 }else{
     $controller = '\App\Controller\\'.ucfirst($page[0]).'Controller';
     $action = $page[1];
     //var_dump($action);
 }
 //var_dump($controller.'.php');
 $file = str_replace("App", "app", $controller.'.php');
 $file = ROOT.$file;

 $file = str_replace("\\",DIRECTORY_SEPARATOR, $file);
// var_dump($file,$controller,$action);

 $notfound = new App\Controller\AppController();

 if(file_exists($file)){
     $controller = new $controller();
     if(method_exists($controller,$action)){
         $controller->$action();
     }else{
         $notfound->notFound();
         //die("La methode n'existe pas");
     }
 }else{
     $notfound->notFound();
     //die("Le controlleur n'existe pas");
     //var_dump($file);
     //var_dump(file_exists($file));
 }
 //$file = ROOT.$file.'.php';
 //var_dump($file);
 //var_dump(file_exists($file));
 //if(file_exists($file)){


 //}else{

   //  var_dump("page introuvable");
// }
 ?>