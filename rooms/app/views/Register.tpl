
<html>
<head>
  <meta charset="utf-8"/>
  <title>Rejestracja</title>
  <style>
  {literal}
    body{font-family:sans-serif;max-width:420px;margin:4rem auto}
    form{display:flex;flex-direction:column;gap:.6rem}
    input{padding:.5rem}
    ul.msgs{padding-left:1.2rem}
    ul.msgs li{margin:.2rem 0}
    ul.msgs li.error{color:#b00}
    ul.msgs li.info{color:#070}
    ul.msgs li.warning{color:#a60}
    .top{display:flex;justify-content:space-between;align-items:center}
  {/literal}
  </style>
</head>
<body>
  <div class="top">
    <h2>Rejestracja</h2>
    <a href="{rel_url action='login'}">Logowanie</a>
  </div>

  {if !$msgs->isEmpty()}
    <ul class="msgs">
      {foreach $msgs->getMessages() as $msg}
        <li class="{$msg->getTypeName()}">{$msg->text}</li>
      {/foreach}
    </ul>
  {/if}

  <form action="{rel_url action='registerDo'}" method="post">
    <input type="text" name="login" placeholder="Login" required/>
    <input type="password" name="pass" placeholder="Hasło" required/>
    <button type="submit">Utwórz konto (user)</button>
  </form>
</body>
</html>
