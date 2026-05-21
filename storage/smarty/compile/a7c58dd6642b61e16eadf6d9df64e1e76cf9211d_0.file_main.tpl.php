<?php
/* Smarty version 5.8.0, created on 2026-05-21 05:54:29
  from 'file:layouts/main.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a0e9e15a53d11_21135453',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7c58dd6642b61e16eadf6d9df64e1e76cf9211d' => 
    array (
      0 => 'layouts/main.tpl',
      1 => 1779342386,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a0e9e15a53d11_21135453 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/agamyrat/php_projects/interview/Views/layouts';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_16040001506a0e9e15a4fc42_91328511', "title");
?>
</title>
    <link rel="stylesheet" href="/public/css/app.css">
</head>
<body>
    <nav>
        <div class="container">
            <a href="/">Home</a>
            <a href="/articles">Articles</a>
            <a href="/categories">Categories</a>
        </div>
    </nav>

    <div class="container">
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20119590076a0e9e15a51268_45639879', "content");
?>

    </div>

    <footer>
        <p>&copy; <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('date_format')(time(),"%Y");?>
 Interview App. All rights reserved.</p>
    </footer>
</body>
</html>
<?php }
/* {block "title"} */
class Block_16040001506a0e9e15a4fc42_91328511 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/agamyrat/php_projects/interview/Views/layouts';
?>
App<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_20119590076a0e9e15a51268_45639879 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/agamyrat/php_projects/interview/Views/layouts';
}
}
/* {/block "content"} */
}
