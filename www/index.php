<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="col-8 ms-3">
    <?php
    include('str.php');

    function ShowItem($item, $n)
    {
      echo "<h$n><a href='" . $item['url'] . "'>" . $item['name'] . "</a></h$n></br>";
      echo "<p>" . $item['snippet'] . "</p></br>";
    }

    $data2 = json_decode(GetSearchResponse(), true);

    $showedDeepLinks = false;

    foreach ($data2['webPages']['value'] as $item) 
    {
      echo "<div class='row'>";
    //   echo "count ".count($item['deepLinks']);
    //   echo "</br>";

      ShowItem($item, 4);

      if(!$showedDeepLinks)
      {
        $len = count($item['deepLinks']);

        for ($i = 0; $i < $len; $i++)
        {
          echo "<div class='row ms-3'>";

          echo "<div class='col-6'>";
          ShowItem($item['deepLinks'][$i], 5);          
          echo "</div>";

          echo "<div class='col-6'>";
          if($i + 1 < $len)
          {
            ShowItem($item['deepLinks'][$i + 1], 5);
          }          
          echo "</div>";

          echo "</div>";

          $i++;
        }

        $showedDeepLinks = true;
      }

      echo "</div>";
    }
    ?>
  </div>
</body>
</html>