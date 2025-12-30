<?php
/* Smarty version 5.4.5, created on 2025-12-30 13:28:38
  from 'file:AccessDenied.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6953c576c83e73_51521725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e4767012a38ea0e507b00ac3090e43288d68bd0c' => 
    array (
      0 => 'AccessDenied.tpl',
      1 => 1766939739,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6953c576c83e73_51521725 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\rooms\\app\\views';
?>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Brak uprawnień</title>
  <style>
  
    body{font-family:sans-serif;max-width:520px;margin:4rem auto}
  
  </style>
</head>
<body>
  <h2>Brak uprawnień</h2>
  <p>Nie masz dostępu do tej akcji. Zaloguj się odpowiednim kontem.</p>
  <p><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('rel_url')->handle(array('action'=>'login'), $_smarty_tpl);?>
">Przejdź do logowania</a></p>
</body>
</html>
<?php }
}
