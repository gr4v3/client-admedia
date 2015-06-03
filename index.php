<?php include_once 'resource.php'; ?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/font-awesome.min.css?v=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css?v=1.0">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css?v=1.0">
  <link rel="stylesheet" href="css/bootstrap-responsive.min.css?v=1.0">
  <link rel="stylesheet" href="css/styles.css?v=1.0">
  <link rel="stylesheet" href="css/<?php echo $page; ?>.css?v=1.0">
  <link rel="stylesheet" href="css/media.css?v=1.0">
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body class="admedia">
    
    
  <?php
    include_once 'pages/'.$page.'.php';
  ?>
    
  <script src="js/scripts.js"></script>
</body>
</html>