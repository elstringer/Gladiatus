<?php

?>

<html>

<head>
<title>File Uploader</title>
</head>
<body>
<form method="POST" action="history.php" enctype="multipart/form-data">
<input type="text" name="domain" size="20">
<p>file:<br>
<input type="file" name="file" size="30">
<p><button name="submit" type="submit">
Upload
</button>
</form>
</body>
</html>