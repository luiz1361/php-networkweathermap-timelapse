<html>

<?php 

$files = glob("mp4/*.*");
for ($i=0; $i<count($files); $i++)
{ 
	$num = $files[$i]; 
	$var1 = $_GET["files"]["name"];
	print ''.$num.'<br />';
	echo '<video width=480 height=360 controls loop>
	<source src='.$num.' type=video/mp4 width="480" height="360" alt="random image">
	</video>'."<br /><br />"; 
} 
?>

<p></p>
You can also access the following link <a href="avi/">AVI_VIDEO</a>

</html>
