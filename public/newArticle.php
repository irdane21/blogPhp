<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section>
        <form action="saveArticle.php" method="POST" class="newArticleForm">
            <label for="">Author: <input type="text" name="author"></label>
            <label for="">Title: <input type="text" name="title"></label>
            <p><textarea type="text" name="content" class="contentInput" cols="40" rows="5"></textarea></p>
            <p><input type="submit" value="Publish"></p>
        </form>
    </section>
</body>
</html>