<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
 <meta charset="utf-8"/>
 <title>Kalkulator kredytowy</title>
</head>

<body>

<h2>Kalkulator kredytowy</h2>

<form action="{url action='calc'}" method="post">

    Kwota kredytu: <br>
    <input type="text" name="kwota" value="{$form->kwota}" /><br><br>

    Oprocentowanie roczne (%): <br>
    <input type="text" name="oprocentowanie" value="{$form->oprocentowanie}" /><br><br>

    Okres spłaty (lata): <br>
    <input type="text" name="lata" value="{$form->lata}" /><br><br>

    <input type="submit" value="Oblicz ratę" />
</form>

<br>

{if $msgs}
<ul style="color:red;">
    {foreach $msgs as $m}
        <li>{$m}</li>
    {/foreach}
</ul>
{/if}

{if $result}
<div style="background:#efe;padding:10px;width:300px;">
    Miesięczna rata: <strong>{$result}</strong> zł
</div>
{/if}

</body>
</html>
