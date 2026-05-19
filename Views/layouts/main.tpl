<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{block name="title"}App{/block}</title>
    <style>
        body { font-family: sans-serif; max-width: 960px; margin: 2rem auto; padding: 0 1rem; color: #222; }
        nav { margin-bottom: 2rem; }
        nav a { margin-right: 1.5rem; text-decoration: none; color: #0066cc; }
        nav a:hover { text-decoration: underline; }
        h1 { border-bottom: 1px solid #ddd; padding-bottom: .4rem; }
        a { color: #0066cc; }
        img { max-width: 100%; border-radius: 6px; }
    </style>
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
