<!DOCTYPE html>
<?php include_once "include/_settings.php"; ?>
<?php include_once 'include/_csvconvert.php'; ?>
<?php include_once "include/_markdown.php"; ?>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $site_name ?></title>
	<meta name="description" content="<?php echo $site_description ?>">
	<meta name="author" content="<?php echo $site_author ?>">
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
	    <div class="container">
          <a class="brand" href="/"><?php echo $site_name ?></a>
          <ul class="nav">
            <li><a href="#">Rss</a></li>
          </ul>
        </div>
	  </div>
    </div>
	<div class="container" style="margin-top:60px;">
	  <div class="row">
	  <div class="span12">
		<h4>Files in <code>post/</code> directory:</h4>
		<?php
		 if ($handle = opendir('posts/')) {
		  while (false !== ($entry = readdir($handle))) {
		      if ($entry != "." && $entry != "..") {
		          echo $entry."<br>";
		      }
		  }
		
		  closedir($handle);
		 } ?>

<hr>

<h4>Debug:</h4>

<?php
   // create a handler to the directory
    $dirhandler = opendir('posts/');
 
    // read all the files from directory
    $nofiles=0;
    while ($file = readdir($dirhandler)) {
 
        // if $file isn't this directory or its parent 
        //add to the $files array
        if ($file != '.' && $file != '..')
        {
			$nofiles++;
			$files[$nofiles]=$file;                
        }   
    }
 
    //close the handler
    closedir($dirhandler);  ?>

<pre><?php print_r($files); ?></pre>
	  </div>
	  </div>
	</div>
  </body>
</html>