
<?php
include "twitteroauth/twitteroauth.php";

$consumer_key = "";
$consumer_secret = "";
$access_token = "";
$access_token_secret = "";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=save&result_type=recent&count=20');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Twitter-API search</title>
</head>
<body>
  <form action="" method="post">
    <label>Cari : <input type="text" name="katakunci" placeholder=""/></label>
  </form>
  <?php
  if (isset($_POST['katakunci'])){
    $tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q='.$_POST['katakunci'].'&result_type=recent&count=50');
  foreach ($tweets as $tweet) {
    foreach ($tweet as $t) {
      echo '<img src="'.$t->user->profile_image_url.'" /> '.$t->text.'</br>.';
      }
    }}
   ?>

</body>
</html>
