<?php
/* Smarty version 5.8.0, created on 2026-05-19 13:13:38
  from 'file:layouts/main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a0c620233e876_43491245',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7c58dd6642b61e16eadf6d9df64e1e76cf9211d' => 
    array (
      0 => 'layouts/main.tpl',
      1 => 1779195761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a0c620233e876_43491245 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/agamyrat/php_projects/interview/Views/layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18043031366a0c620233d669_59440646', "title");
?>
</title>
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

    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5321660106a0c620233e2b2_99369165', "content");
?>

</body>
</html>
<?php }
/* {block "title"} */
class Block_18043031366a0c620233d669_59440646 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/agamyrat/php_projects/interview/Views/layouts';
?>
App<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_5321660106a0c620233e2b2_99369165 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/agamyrat/php_projects/interview/Views/layouts';
}
}
/* {/block "content"} */
}
