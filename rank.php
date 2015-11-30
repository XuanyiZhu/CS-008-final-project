<?php
$Star1 = "star.png";
$Star2 = "star.png";
$Star3 = "star.png";
$Star4 = "star.png";
$Star5 = "star.png";
$fileExt = ".csv";
$myFileName = "data/rank";
$filename = $myFileName . $fileExt;
$file = fopen($filename, 'a+');
while (!feof($file)) {
    $rankRecords[] = fgetcsv($file);
}

if (isset($_POST["btnRank1"])) {
    $dataRecord[] = $showId;
    $dataRecord[] = 1;
    $Star1 = "yelloStar.jpg";
}
if (isset($_POST["btnRank2"])) {
    $dataRecord[] = $showId;
    $dataRecord[] = 2;
    $Star1 = "yelloStar.jpg";
    $Star2 = "yelloStar.jpg";
}
if (isset($_POST["btnRank3"])) {
    $dataRecord[] = $showId;
    $dataRecord[] = 3;
    $Star1 = "yelloStar.jpg";
    $Star2 = "yelloStar.jpg";
    $Star3 = "yelloStar.jpg";
}
if (isset($_POST["btnRank4"])) {
    $dataRecord[] = $showId;
    $dataRecord[] = 4;
    $Star1 = "yelloStar.jpg";
    $Star2 = "yelloStar.jpg";
    $Star3 = "yelloStar.jpg";
    $Star4 = "yelloStar.jpg";
}
if (isset($_POST["btnRank5"])) {
    $dataRecord[] = $showId;
    $dataRecord[] = 5;
    $Star1 = "yelloStar.jpg";
    $Star2 = "yelloStar.jpg";
    $Star3 = "yelloStar.jpg";
    $Star4 = "yelloStar.jpg";
    $Star5 = "yelloStar.jpg";
}

$j = 0;
$sum = 0;
foreach ($rankRecords as $rankRecord) {


    if ($rankRecord[0] == $showId) {
        $j = $j + 1;

        $sum = (int) $sum + (int) $rankRecord[1];
    }

    $avg = $sum / $j;
}
if ($avg >= 0.5 and $avg < 1.5) {
    $Star1 = "redStar.png";
    $Star2 = "star.png";
    $Star3 = "star.png";
    $Star4 = "star.png";
    $Star5 = "star.png";
} elseif ($avg >= 1.5 and $avg < 2.5) {
    $Star1 = "redStar.png";
    $Star2 = "redStar.png";
    $Star3 = "star.png";
    $Star4 = "star.png";
    $Star5 = "star.png";
} elseif ($avg >= 2.5 and $avg < 3.5) {
    $Star1 = "redStar.png";
    $Star2 = "redStar.png";
    $Star3 = "redStar.png";
    $Star4 = "star.png";
    $Star5 = "star.png";
} elseif ($avg >= 3.5 and $avg < 4.5) {
    $Star1 = "redStar.png";
    $Star2 = "redStar.png";
    $Star3 = "redStar.png";
    $Star4 = "redStar.png";
    $Star5 = "star.png";
} elseif ($avg >= 4.5) {
    $Star1 = "redStar.png";
    $Star2 = "redStar.png";
    $Star3 = "redStar.png";
    $Star4 = "redStar.png";
    $Star5 = "redStar.png";
}

fputcsv($file, $dataRecord);
fclose($file);
?>

<form method = "post"
      id = "frmRank">
    <label>rank the show: </label>

    <input type="image" src="img/<?php print"$Star1" ?>" id = "btnRank1" name =" btnRank1" value ="1" width="20" height="20" />
    <input type="image" src="img/<?php print"$Star2" ?>" id = "btnRank2" name =" btnRank2" value ="2" width="20" height="20" />
    <input type="image" src="img/<?php print"$Star3" ?>" id = "btnRank3" name =" btnRank3" value ="3" width="20" height="20" />
    <input type="image" src="img/<?php print"$Star4" ?>" id = "btnRank4" name =" btnRank4" value ="4" width="20" height="20" />
    <input type="image" src="img/<?php print"$Star5" ?>" id = "btnRank5" name =" btnRank5" value ="5" width="20" height="20" />
    <label><?php print "(" . $j; ?> ranks)</label>
</form>

