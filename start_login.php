<?php
include_once('./inc.php');
?>

<html>
<body>

<?php
echo '<a href="https://www.ravelry.com/oauth2/auth?client_id='.$client_id.'&redirect_uri='.$redirect_uri.'&state='.$state.'&response_type=code&scope=offline">Authorize with Ravelry</a>';
?>

</body>
</html>
