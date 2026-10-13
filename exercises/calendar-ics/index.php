<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title></title>
</head>

<body>
  <?php
  include("fusion_ics.php");
    if(isset($_FILES['ics1']) && isset($_FILES['ics2'])){
      if(!empty($_FILES['ics1']['tmp_name']) && !empty($_FILES['ics2']['tmp_name'])){
        $array_merged = fusion_ics($_FILES['ics1']['tmp_name'], $_FILES['ics2']['tmp_name']);
        envoi_ics($array_merged, "merged_agenda.ics");
        //print_r($_FILES);
      }else{
        echo 'non';
      }
    }else{

  ?>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" accept="text/calendar" name="ics1" value="">
    <input type="file" accept="text/calendar" name="ics2" value="">
    <button type="submit" name="button">Envoyer</button>
  </form>

</body>
<?php } ?>
</html>
