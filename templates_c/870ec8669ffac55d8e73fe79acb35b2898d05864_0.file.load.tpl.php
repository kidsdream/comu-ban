<?php
/* Smarty version 3.1.34-dev-7, created on 2020-02-02 22:43:56
  from 'C:\MAMP\htdocs\php-board\src\View\load.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e36d21cd823b3_57456182',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '870ec8669ffac55d8e73fe79acb35b2898d05864' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\php-board\\src\\View\\load.tpl',
      1 => 1580651035,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e36d21cd823b3_57456182 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="l-flex u-mt30 addContent">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contents']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
    <article class="p-contents">
      <div class="p-info">
        <h2 class="p-info__name"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h2>
        <time class="p-info__time"><?php echo date('Y年m月d日 H:i',strtotime($_smarty_tpl->tpl_vars['item']->value['created_at']));?>
</time>
      </div>
      <p class="p-message"><?php echo $_smarty_tpl->tpl_vars['item']->value['message'];?>
</p>
      <p class="p-category"><?php echo $_smarty_tpl->tpl_vars['item']->value['category'];?>
</p>
    </article>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php }
}
