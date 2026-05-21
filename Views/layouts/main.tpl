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
        <div class="container">
            <a href="/">Home</a>
           
        </div>
    </nav>

    <div class="container">
        {block name="content"}{/block}
    </div>

    <footer>
        <p>&copy; {$smarty.now|date_format:"%Y"} Interview App. All rights reserved.</p>
    </footer>
</body>
</html>
