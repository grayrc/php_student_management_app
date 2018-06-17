<!--
	
Error page for Team New Zealand position search site

Author: Richard Gray
Date: 30/08/2017
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>
    <?php echo $error . "<br>" . $e->getMessage(); ?>
<p>
</body>
</html>