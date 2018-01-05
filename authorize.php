<?php
include_once('./inc.php');
?>

<html>
<body>

<?php
if(isset($_GET['code'])) {

  $output = shell_exec('curl -u "'.$client_id.':'.$client_secret.'" -v "https://www.ravelry.com/oauth2/token" -d "grant_type=authorization_code&code='.$_GET['code'].'&redirect_uri=$redirect_uri"');
  echo "<br><br>out: ".print_r($output);

  $result_json = json_decode($output, true);

  if(isset($result_json['access_token'])) {

    echo "token = ".$result_json['access_token']."<br>";
    echo "expires_in = ".$result_json['expires_in']."<br>";
    echo "refresh_token = ".$result_json['refresh_token']."<br><br>";

    //test
    $cmd = 'curl -k -X GET -H "Authorization: Bearer '.$result_json['access_token'].'" https://api.ravelry.com/current_user.json';
    echo $cmd;

    $output = shell_exec($cmd);
    echo "<br><br>out: ".print_r($output);


  }
}
?>

</body>
</html>
