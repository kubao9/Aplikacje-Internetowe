<?php
/* Smarty version 5.4.5, created on 2025-11-24 20:31:56
  from 'file:calc_credit_view.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6924b2ac1b5418_05230156',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8a95347ad5aeaf61966b6b632ce70dc1b54a822' => 
    array (
      0 => 'calc_credit_view.tpl',
      1 => 1764012713,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6924b2ac1b5418_05230156 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\calc\\app\\views';
?><h2>Wynik kalkulacji</h2>

<?php if ($_smarty_tpl->getValue('msgs')) {?>
<ul style="color:red;">
    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs'), 'm');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('m')->value) {
$foreach0DoElse = false;
?>
        <li><?php echo $_smarty_tpl->getValue('m');?>
</li>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
</ul>
<?php }?>

<?php if ($_smarty_tpl->getValue('result')) {?>
<div style="background:#efe;padding:10px;width:300px;">
    Miesięczna rata: <strong><?php echo $_smarty_tpl->getValue('result');?>
</strong> zł
</div>
<?php }?>

<a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'credit'), $_smarty_tpl);?>
">Powrót</a>
<?php }
}
