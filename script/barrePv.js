var pvD1max = '<?php echo  $donneeD1['pv_max']; ?>';
var pvD2max = '<?php echo  $donneeD2['pv_max']; ?>';
var pvD1 = '<?php echo  $donneeD1['pv']; ?>';
var pvD2 = '<?php echo  $donneeD2['pv']; ?>';
console.log(pvD1max);
console.log(pvD1);

document.getElementById("vie_d1").max = pvD1max;
document.getElementById("vie_d2").max = pvD2max;
document.getElementById("vie_d1").value = pvD1;
document.getElementById("vie_d2").value = pvD2;
