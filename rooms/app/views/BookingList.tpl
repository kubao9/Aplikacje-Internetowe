
<html>
<head>
  <meta charset="utf-8"/>
  <title>Rezerwacje sal</title>
  <style>
  {literal}
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
  {/literal}
  </style>
</head>
<body>
  <div class="bar">
    <h2>Rezerwacja sal</h2>
    <div>
      Zalogowano: <b>{$me.username}</b> ({$me.role})
      {if $me.role == 'admin'}
        | <a href="{rel_url action='roomsAdmin'}">Panel sal (admin)</a>
      {/if}
      | <a href="{rel_url action='logout'}">Wyloguj</a>
    </div>
  </div>

  {if !$msgs->isEmpty()}
    <ul class="msgs">
      {foreach $msgs->getMessages() as $msg}
        <li class="{$msg->getTypeName()}">{$msg->text}</li>
      {/foreach}
    </ul>
  {/if}

  <h3>Nowa rezerwacja</h3>
  <form class="res" action="{rel_url action='reserve'}" method="post">
    <div>
      <label>Sala</label><br/>
      <select name="room_id" required>
        {foreach $rooms as $r}
          <option value="{$r.id}">{$r.name} (max {$r.capacity})</option>
        {/foreach}
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
      {foreach $reservations as $r}
        <tr>
          <td>{$r.id}</td>
          <td>{$r.room_name}</td>
          <td>{$r.start}</td>
          <td>{$r.end}</td>
          <td>{$r.username}</td>
          <td>
            {if $me.role == 'admin' || $me.id == $r.user_id}
              <a href="{rel_url action='cancel' id=$r.id}">Anuluj</a>
            {/if}
          </td>
        </tr>
      {/foreach}
    </tbody>
  </table>
</body>
</html>
