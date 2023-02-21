<?PHP
    include_once '../class/page.php';


    $page = new PAGE();
   

    $result = $page->read($_GET['page_id']);
    $row = mysqli_num_rows($result); 
    if($row!=0)     {
        session_destroy();
        session_start();
        $res = mysqli_fetch_assoc($result);
        $url = $res['url'];
        
    }
    echo $url;



?>
