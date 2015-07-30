<?php
if(!empty($_GET['bit'])){
  //convert to integer
  $inte=(float)$_GET['bit'];
  //get value of a bitcoin from url
  $bit_url='https://blockchain.info/ticker';
  //store json
  $bit_json=file_get_contents($bit_url);
  //decode json
  $bit_decode=json_decode($bit_json,true);
  //extract value

$asd=$_GET['cur'];
if ($asd == 0) {
  $bit_value=$bit_decode['USD']['15m'];
 $bit_final= (float)$bit_value*$inte;
 }
 elseif ($asd == 1) {
   $bit_value=$bit_decode['EUR']['15m'];
  $bit_final= (float)$bit_value*$inte;
 }
  elseif($asd == 2 ){
    $bit_value=$bit_decode['GBP']['15m'];
   $bit_final= (float)$bit_value*$inte;
  }
 elseif($asd == 3){
   $bit_value=$bit_decode['HKD']['15m'];
  $bit_final= (float)$bit_value*$inte;
 }
}
?>
<html>
<Head>
  <title>bitcoin converter</title>
  <style>
  #contents{
    position: absolute;
    top: 150px;
    left: 500px;
    width: 300px;
  height: 250px;
  background-color: #d1c4e9;
  border-radius: 30px;
  
  -webkit-border-radius: 15px;
  border: 3px solid #512da8;
  padding: 5px;
  }
  </style>

  </head>
  <body>
    <div id="contents">
  <center>  <h1>Bitcoin Converter</h1>
    <br/>
    <form action="bits.php">
      <input type="text" name="bit">
      <br/>
      <select name="cur" size="1">
        <option value="0">USD
        <option value="1">EURO
        <option value="2">GBP
        <option value="3">HKD

        </select>
      <input type="submit" value="Get rates" />

    </form>
<?php
if(!empty($bit_final)){
  echo '<h3>'.$bit_final.'</h3>';
  echo '<h3>Unit Value: <b>'.$bit_value.'</b></h3>';
}

?>
</center>
</div>
  </body>
  </html>
