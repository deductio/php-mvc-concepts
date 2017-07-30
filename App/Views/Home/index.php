<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h1>Welcome</h1>
    <p>Hello from the view!</p>

    <ul>
        <? foreach ($colors as $key=>$value):?>
        <li><?php echo $value; ?></li>
        <? endforeach; ?>
    </ul>
</body>
</html>
