<?php
/* Smarty version 5.4.5, created on 2025-12-28 18:07:14
  from 'file:BookingList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_695163c23f7d73_86968255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81fab1974ee93893568a490ab07dc8c51feec3a3' => 
    array (
      0 => 'BookingList.tpl',
      1 => 1766939752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_695163c23f7d73_86968255 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\rooms\\app\\views';
?>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Rezerwacje sal</title>
  <style>
  
    body{font-family:sans-serif;max-width:980px;margin:2rem auto}
    table{width:100%;border-collapse:collapse;margin-top:1rem}
    th,td{border:1px solid #ddd;padding:.4rem}
    .bar{display:flex;justify-content:space-between;align-items:center}
    ul.msgs{padding-left:1.2rem}
    ul.msgs li{margin:.2rem 0}
    ul.msgs li.error{color:#b00}
    ul.msgs li.info{color:#070}
    ul.msgs li.warning{color:#a60}
    form.res{display:flex;gap:.6rem;flex-wrap:wrap;align-items:flex-end}
    input,select{padding:.4rem}
  
  </style>
</head>
<body>
  <div class="bar">
    <h2>Rezerwacja sal</h2>
    <div>
      Zalogowano: <b><?php echo $_smarty_tpl->getValue('me')['username'];?>
</b> (<?php echo $_smarty_tpl->getValue('me')['role'];?>
)
      <?php if ($_smarty_tpl->getValue('me')['role'] == 'admin') {?>
        | <a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('rel_url')->handle(array('action'=>'roomsAdmin'), $_smarty_tpl);?>
">Panel sal (admin)</a>
      <?php }?>
      | <a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('rel_url')->handle(array('action'=>'logout'), $_smarty_tpl);?>
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

  <h3>Nowa rezerwacja</h3>
  <form class="res" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('rel_url')->handle(array('action'=>'reserve'), $_smarty_tpl);?>
" method="post">
    <div>
      <label>Sala</label><br/>
      <select name="room_id" required>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('rooms'), 'r');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach1DoElse = false;
?>
          <option value="<?php echo $_smarty_tpl->getValue('r')['id'];?>
"><?php echo $_smarty_tpl->getValue('r')['name'];?>
 (max <?php echo $_smarty_tpl->getValue('r')['capacity'];?>
)</option>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
      </select>
    </div>

    <div>
      <label>Początek</label><br/>
      <input type="datetime-local" name="start" required/>
    </div>

    <div>
      <label>Koniec</label><br/>
      <input type="datetime-local" name="end" required/>
    </div>

    <button type="submit">Rezerwuj</button>
  </form>

  <h3>Rezerwacje</h3>
  <table>
    <thead>
      <tr>
        <th>ID</th><th>Sala</th><th>Od</th><th>Do</th><th>Użytkownik</th><th>Akcja</th>
      </tr>
    </thead>
    <tbody>
      <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('reservations'), 'r');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('r')->value) {
$foreach2DoElse = false;
?>
        <tr>
          <td><?php echo $_smarty_tpl->getValue('r')['id'];?>
</td>
          <td><?php echo $_smarty_tpl->getValue('r')['room_name'];?>
</td>
          <td><?php echo $_smarty_tpl->getValue('r')['start'];?>
</td>
          <td><?php echo $_smarty_tpl->getValue('r')['end'];?>
</td>
          <td><?php echo $_smarty_tpl->getValue('r')['username'];?>
</td>
          <td>
            <?php if ($_smarty_tpl->getValue('me')['role'] == 'admin' || $_smarty_tpl->getValue('me')['id'] == $_smarty_tpl->getValue('r')['user_id']) {?>
              <a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('rel_url')->handle(array('action'=>'cancel','id'=>$_smarty_tpl->getValue('r')['id']), $_smarty_tpl);?>
">Anuluj</a>
            <?php }?>
          </td>
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
