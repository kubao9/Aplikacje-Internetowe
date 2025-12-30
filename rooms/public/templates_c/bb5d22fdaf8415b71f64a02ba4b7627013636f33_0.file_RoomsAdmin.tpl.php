<?php
/* Smarty version 5.4.5, created on 2025-12-28 18:08:11
  from 'file:RoomsAdmin.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_695163fb483876_25874537',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb5d22fdaf8415b71f64a02ba4b7627013636f33' => 
    array (
      0 => 'RoomsAdmin.tpl',
      1 => 1766939763,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695163fb483876_25874537 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\rooms\\app\\views';
?>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Sale (admin)</title>
  <style>
  
    body{font-family:sans-serif;max-width:900px;margin:2rem auto}
    table{width:100%;border-collapse:collapse;margin-top:1rem}
    th,td{border:1px solid #ddd;padding:.4rem}
    form.add{display:flex;gap:.6rem;flex-wrap:wrap;align-items:flex-end}
    input{padding:.4rem}
    ul.msgs{padding-left:1.2rem}
    ul.msgs li{margin:.2rem 0}
    ul.msgs li.error{color:#b00}
    ul.msgs li.info{color:#070}
    ul.msgs li.warning{color:#a60}
  
  </style>
</head>
<body>
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h2>Zarządzanie salami (admin)</h2>
    <div>
      <a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('rel_url')->handle(array('action'=>'rooms'), $_smarty_tpl);?>
">← rezerwacje</a> |
      <a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('rel_url')->handle(array('action'=>'logout'), $_smarty_tpl);?>
">Wyloguj</a>
    </div>
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

  <h3>Dodaj salę</h3>
  <form class="add" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('rel_url')->handle(array('action'=>'roomAdd'), $_smarty_tpl);?>
" method="post">
    <div>
      <label>Nazwa</label><br/>
      <input type="text" name="name" required/>
    </div>
    <div>
      <label>Pojemność</label><br/>
      <input type="number" name="capacity" min="1" value="10" required/>
    </div>
    <button type="submit">Dodaj</button>
  </form>

  <h3>Lista sal</h3>
  <table>
    <thead>
      <tr><th>ID</th><th>Nazwa</th><th>Pojemność</th><th>Akcja</th></tr>
    </thead>
    <tbody>
      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('rooms'), 'r');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach1DoElse = false;
?>
        <tr>
          <td><?php echo $_smarty_tpl->getValue('r')['id'];?>
</td>
          <td><?php echo $_smarty_tpl->getValue('r')['name'];?>
</td>
          <td><?php echo $_smarty_tpl->getValue('r')['capacity'];?>
</td>
          <td><a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('rel_url')->handle(array('action'=>'roomDelete','id'=>$_smarty_tpl->getValue('r')['id']), $_smarty_tpl);?>
">Usuń</a></td>
        </tr>
      <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
    </tbody>
  </table>
</body>
</html>
<?php }
}
