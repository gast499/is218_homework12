<html>
<head>
</head>
<body>
<?php
  class CURL{
  
  function httpGet($url)
  {
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false); 
 
    $output=curl_exec($ch);
    
    if($output === false)
    {
        echo "Error Number:".curl_errno($ch)."<br>";
        echo "Error String:".curl_error($ch);
    }
    
    curl_close($ch);
    return $output;
}

  
  function httpPost($url,$params)
{
  $postData = '';
   //create name value pairs seperated by &
   foreach($params as $k => $v) 
   { 
      $postData .= $k . '='.$v.'&'; 
   }
   $postData = rtrim($postData, '&');
 
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
 
    $output=curl_exec($ch);
    
    if($output === false)
    {
        echo "Error Number:".curl_errno($ch)."<br>";
        echo "Error String:".curl_error($ch);
    }
    
    curl_close($ch);
    return $output;
 
}
}

$params = array(
   "name" => "Tameem Haj-Ibrahim",
   "age" => "20",
   "location" => "USA"
);


$c = new Curl();
echo '<h3>CURL REQUESTS</h3>';
echo 'I am now posting information to http://hayageek.com/examples/php/curl-examples/post.php<br>';
echo $c->httpPost("http://hayageek.com/examples/php/curl-examples/post.php",$params);
echo '<br><br>';
echo 'I am now getting information from https://web.njit.edu/~tmh27/is218/Homework12/test.php<br>';
echo $c->httpGet("https://web.njit.edu/~tmh27/is218/Homework12/test.php");
?>
</body>
</html>