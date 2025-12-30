
<html>
<head>
  <meta charset="utf-8"/>
  <title>Sale (admin)</title>
  <style>
  {literal}
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
  {/literal}
  </style>
</head>
<body>
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h2>Zarządzanie salami (admin)</h2>
    <div>
      <a href="{rel_url action='rooms'}">← rezerwacje</a> |
      <a href="{rel_url action='logout'}">Wyloguj</a>
    </div>
  </div>

  {if !$msgs->isEmpty()}
    <ul class="msgs">
      {foreach $msgs->getMessages() as $msg}
        <li class="{$msg->getTypeName()}">{$msg->text}</li>
      {/foreach}
    </ul>
  {/if}

  <h3>Dodaj salę</h3>
  <form class="add" action="{rel_url action='roomAdd'}" method="post">
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
      {foreach $rooms as $r}
        <tr>
          <td>{$r.id}</td>
          <td>{$r.name}</td>
          <td>{$r.capacity}</td>
          <td><a href="{rel_url action='roomDelete' id=$r.id}">Usuń</a></td>
        </tr>
      {/foreach}
    </tbody>
  </table>
</body>
</html>
