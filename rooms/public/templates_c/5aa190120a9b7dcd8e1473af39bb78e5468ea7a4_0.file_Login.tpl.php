<?php
/* Smarty version 5.4.5, created on 2025-12-28 17:36:07
  from 'file:Login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_69515c7765da37_81640839',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5aa190120a9b7dcd8e1473af39bb78e5468ea7a4' => 
    array (
      0 => 'Login.tpl',
      1 => 1766939707,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69515c7765da37_81640839 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\rooms\\app\\views';
?>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Logowanie</title>
  <style>
  
    body{font-family:sans-serif;max-width:420px;margin:4rem auto}
    form{display:flex;flex-direction:column;gap:.6rem}
    input{padding:.5rem}
    ul.msgs{padding-left:1.2rem}
    ul.msgs li{margin:.2rem 0}
    ul.msgs li.error{color:#b00}
    ul.msgs li.info{color:#070}
    ul.msgs li.warning{color:#a60}
    .top{display:flex;justify-content:space-between;align-items:center}
  
  </style>
</head>
<body>
  <div class="top">
    <h2>Logowanie</h2>
    <a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('rel_url')->handle(array('action'=>'register'), $_smarty_tpl);?>
">Rejestracja</a>
  </div>

  <?php if (!$_smarty_tpl->getValue('msgs')->isEmpty()) {?>
    <ul class="msgs">
      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('msgs')->getMessages(), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
        <li class="<?php echo $_smarty_tpl->getValue('msg')->getTypeName();?>
"><?php echo $_smarty_tpl->getValue('msg')->text;?>
</li>
      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </ul>
  <?php }?>

  <form action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('rel_url')->handle(array('action'=>'loginDo'), $_smarty_tpl);?>
" method="post">
    <input type="text" name="login" placeholder="Login" required/>
    <input type="password" name="pass" placeholder="Hasło" required/>
    <button type="submit">Zaloguj</button>
  </form>

  <p style="color:#666;margin-top:1rem">
    Konto admina dodaj ręcznie w DB (rola = 'admin').
  </p>
</body>
</html>
<?php }
}
