<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{block name="title"}App{/block}</title>
    <link rel="stylesheet" href="/public/css/app.css">
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/articles">Articles</a>
        <a href="/categories">Categories</a>
    </nav>

    {block name="content"}{/block}
</body>
</html>
