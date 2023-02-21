<?PHP 

$uid = $_POST['uid'];
$img = $_POST['img'];
$timerec = $_POST['timerec'];
$score = $_POST['score'];
        
        $servername = "localhost";
        $username = "root";
        $password = "aot#avsec";
        $dbname = "xsim2";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "INSERT INTO `cbt`(`user_id`,  `time_record`, `image_count`, `score`) VALUES ('".$uid."','".$timerec."','".$img."','".$score."')";
        
        if ($conn->multi_query($sql) === TRUE) {
          echo "1";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
       
?>