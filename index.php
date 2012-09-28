<?php

 function findexts ($filename) 
	{ 
	$filename = strtolower($filename) ; 
	$exts = split("[/\\.]", $filename) ; 
	$n = count($exts)-1; 
	$exts = $exts[$n]; 
	return $exts; 
	} 


// Grab all files from the desired folder
$files = glob( '*.*' );

// Sort files by modified time, latest to earliest
// Use SORT_ASC in place of SORT_DESC for earliest to latest
array_multisort(
array_map( 'filemtime', $files ),
SORT_NUMERIC,
SORT_DESC,
$files
);

// do whatever you want with $files
//print_r( $files );

foreach ($files as $file)
      {
	if ($file != "." && $file != ".." && $file != "index.php" && $file != "rpm.jpg" && $file != "deb.jpg" && $file != "tgz.jpg")
	  {
          	$thelist .= '<tr><td><a href="'.$file.'">'.$file.'</a></td>';
		if (findexts($file) == 'deb') {$thelist .= '<td><img src=deb.jpg alt=DEB  height=30></td><td>DEB package, ';}
		if (findexts($file) == 'rpm' ){$thelist .= '<td><img src=rpm.jpg alt= RPM height=30></td><td>RPM package, ';}
		if (findexts($file) == 'tgz') {$thelist .= '<td><img src=tgz.jpg alt=TGZ height=30></td><td>TGZ package, ';}
		if (strstr($file,'amd64') or strstr($file,'x86_64')) {$thelist .= 'AMD64 package</td>';}
		if (strstr($file,'i386') ) {$thelist .= ' 32 bit package</td>';}
		$thelist .= '<td>Date:'.date ("d F Y H:i:s.", filemtime($file)).'</td></tr>';
          }
	}
  
 
?>
<h1>Rebol Linux packages</h1>
These are the Linux package for Rebol, the first 5 items are the last build.
<P>List of files:</p>
<table><?=$thelist?></table>
