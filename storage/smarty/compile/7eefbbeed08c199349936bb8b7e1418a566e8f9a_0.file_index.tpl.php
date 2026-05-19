<?php
/* Smarty version 5.8.0, created on 2026-05-19 13:37:27
  from 'file:categories/index.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_6a0c6797d6a427_88225377',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7eefbbeed08c199349936bb8b7e1418a566e8f9a' => 
    array (
      0 => 'categories/index.tpl',
      1 => 1779197610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a0c6797d6a427_88225377 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/agamyrat/php_projects/interview/Views/categories';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_1820994576a0c6797d61518_77644355', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_20246771436a0c6797d63043_32934687', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "layouts/main.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_1820994576a0c6797d61518_77644355 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/agamyrat/php_projects/interview/Views/categories';
?>
Categories<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_20246771436a0c6797d63043_32934687 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Users/agamyrat/php_projects/interview/Views/categories';
?>

<h1>Categories</h1>
<?php if ($_smarty_tpl->getValue('categories')) {?>
    <ul>
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('categories'), 'cat');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('cat')->value) {
$foreach0DoElse = false;
?>
        <li style="margin-bottom:.5rem;">
            <a href="/categories/<?php echo $_smarty_tpl->getValue('cat')['id'];?>
"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('cat')['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
            <?php if ($_smarty_tpl->getValue('cat')['description']) {?>
                &mdash; <span style="color:#555;"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('cat')['description'], ENT_QUOTES, 'UTF-8', true);?>
</span>
            <?php }?>
        </li>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>
<?php } else { ?>
    <p>No categories found.</p>
<?php }
}
}
/* {/block "content"} */
}
