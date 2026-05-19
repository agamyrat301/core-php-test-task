<?php
/* Smarty version 5.8.0, created on 2026-05-19 15:18:09
  from 'file:layouts/main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a0c7f311d6295_73560756',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7c58dd6642b61e16eadf6d9df64e1e76cf9211d' => 
    array (
      0 => 'layouts/main.tpl',
      1 => 1779203887,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a0c7f311d6295_73560756 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/agamyrat/php_projects/interview/Views/layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10695911526a0c7f311d3f91_99616363', "title");
?>
</title>
    <link rel="stylesheet" href="/public/css/app.css">
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/articles">Articles</a>
        <a href="/categories">Categories</a>
    </nav>

    <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_17398186306a0c7f311d5a16_30166799', "content");
?>

</body>
</html>
<?php }
/* {block "title"} */
class Block_10695911526a0c7f311d3f91_99616363 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/agamyrat/php_projects/interview/Views/layouts';
?>
App<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_17398186306a0c7f311d5a16_30166799 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/agamyrat/php_projects/interview/Views/layouts';
}
}
/* {/block "content"} */
}
