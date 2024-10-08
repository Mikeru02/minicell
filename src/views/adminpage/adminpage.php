<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Minicell Apparel</title>
</head>
<body>
    <form action="/minicell/index.php/admin" method="POST" enctype="multipart/form-data">
        <input type="file" accept="image/*" id="img" name="img" />
        <input type="text" id="name" name="name" />
        <input type="text" id="desc" name="desc" />
        <input type="text" id="price" name="price" />
        <input type"text" id="status" name="status" />
        <button id="submit">Submit</button>
    </form>
    <form action="/minicell/index.php/logout" method="POST" style="display: inline;">
        <button type="submit">Logout</button>
    </form>
</body>
</html>