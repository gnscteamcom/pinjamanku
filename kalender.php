<div class="sidebar-judul">Kalender</div>
 <div class="sidebar-konten">

<?php
$now = getdate(time());
$time = mktime(0,0,0, $now['mon'], 1, $now['year']);
$date = getdate($time);
$dayTotal = cal_days_in_month(0, $date['mon'], $date['year']);
//Print the calendar header with the month name.
print '<center><strong>' . $date['month'] . '</strong></center>';
print '<div class=blokbaris>';
$hari=array('Minggu','Senin','Selasa','Rabu','Kamis','Jumat','Sabtu');
for ($i = 0; $i < 7; $i++) {
print "<div class='hari'>$hari[$i]</div>";
}
print '<div class=float_habis>&nbsp;</div></div>';

for ($i = 0; $i < 6; $i++) {
print '<div class=blokbaris>';
for ($j = 1; $j <= 7; $j++) {
$dayNum = $j + $i*7 - $date['wday'];
//Print a cell with the day number in it.  If it is today, highlight it.
print '<div';
if ($dayNum > 0 && $dayNum <= $dayTotal) {
print ($dayNum == $now['mday']) ? ' class=tgl_skrng>' : ' class=tgl>';
print "$dayNum";
}
else {
//Print a blank cell if no date falls on that day, but the row is unfinished.
print ' class=tgl_blank> - ';
}
print '</div>';
}
print '<div class=float_habis>&nbsp;</div></div>';
if ($dayNum >= $dayTotal && $i != 6)
break;
}
?>
</div>

<style type="text/css">
  div{
  -moz-border-radius-topleft: 2px; -webkit-border-top-left-radius: 2px; -khtml-border-top-left-radius: 2px; border-top-left-radius: 2px;
  -moz-border-radius-topright: 2px; -webkit-border-top-right-radius: 2px; -khtml-border-top-right-radius: 2px; border-top-right-radius: 2px;
  -moz-border-radius-bottomleft: 2px; -webkit-border-bottom-left-radius: 2px; -khtml-border-bottom-left-radius: 2px; border-bottom-left-radius: 2px;
  -moz-border-radius-bottomright: 2px; -webkit-border-bottom-right-radius: 2px; -khtml-border-bottom-right-radius: 2px; border-bottom-right-radius: 2px;
  }

  .hari{
  line-height: 15px;
  font-size: 7px;
  float: left;
  padding: 0.8px;
  width: 25px;
  height: 15px;
  text-align: center;
  margin: 0.8px;
  background-color: #000F70;
  color: #FFF;
}
  .tgl{
  line-height: 15px;
  float: left;
  padding: 0.8px;
  font-size: 7px;
  width: 25px;
  height: 15px;
  text-align: center;
  margin: 0.8px;
  background: #CCC;
  }

  .tgl:hover{
  background-image: -khtml-gradient(linear, left top, left bottom, from(#049cdb), to(#0064cd));
  background-image: -moz-linear-gradient(top, #049cdb, #0064cd);
  background-image: -ms-linear-gradient(top, #049cdb, #0064cd);
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #049cdb), color-stop(100%, #0064cd));
  background-image: -webkit-linear-gradient(top, #049cdb, #0064cd);
  background-image: -o-linear-gradient(top, #049cdb, #0064cd);
  background-image: linear-gradient(top, #049cdb, #0064cd);
  color: #FFF;
  }

  .float_habis{
  padding: 0.8px;
  text-align: center;
  }

  .tgl_blank{
  float: left;
  padding: 0.8px;
  width: 25px;
  text-align: inheritcenter;
  margin: 0.8px;
  background: #F8F8F8;
  color: #CCC;
  }

  .tgl_skrng{
  float: left;
  padding: 0.8px;
  width: 25px;
  text-align: center;
  margin: 0.8px;
  background: #FC0;
  }

  .blokbaris{
  padding: 0.8px;
  text-align:center;
  margin: 0.8px;
  }
</style>
