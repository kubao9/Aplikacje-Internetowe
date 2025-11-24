<?php
/* Smarty version 5.4.5, created on 2025-11-24 20:34:33
  from 'file:credit.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6924b3497f5709_59427071',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9f1cada003bd924722921931b0ce4cdf17d8c1ee' => 
    array (
      0 => 'credit.tpl',
      1 => 1764012831,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6924b3497f5709_59427071 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\calc\\app\\views';
?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
 <meta charset="utf-8"/>
 <title>Kalkulator kredytowy</title>
</head>

<body>

<h2>Kalkulator kredytowy</h2>

<form action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'calc'), $_smarty_tpl);?>
" method="post">

    Kwota kredytu: <br>
    <input type="text" name="kwota" value="<?php echo $_smarty_tpl->getValue('form')->kwota;?>
" /><br><br>

    Oprocentowanie roczne (%): <br>
    <input type="text" name="oprocentowanie" value="<?php echo $_smarty_tpl->getValue('form')->oprocentowanie;?>
" /><br><br>

    Okres spłaty (lata): <br>
    <input type="text" name="lata" value="<?php echo $_smarty_tpl->getValue('form')->lata;?>
" /><br><br>

    <input type="submit" value="Oblicz ratę" />
</form>

<br>

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

</body>
</html>
<?php }
}
