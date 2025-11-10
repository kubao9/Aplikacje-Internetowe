<?php require_once dirname(__FILE__) . '/../config.php'; ?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>Kalkulator kredytowy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css">
</head>
<body>

<h2>Kalkulator kredytowy</h2>

<form action="<?php print(_APP_URL); ?>/app/calc_credit.php" method="post" class="pure-form pure-form-stacked">
    <label for="id_kwota">Kwota kredytu (PLN): </label>
    <input id="id_kwota" type="text" name="kwota" value="<?php if(isset($kwota)) print($kwota); ?>" />

    <label for="id_lata">Liczba lat: </label>
    <input id="id_lata" type="text" name="lata" value="<?php if(isset($lata)) print($lata); ?>" />

    <label for="id_oprocentowanie">Oprocentowanie roczne (%): </label>
    <input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php if(isset($oprocentowanie)) print($oprocentowanie); ?>" /> <br />

    <input type="submit" value="Oblicz ratę" class="pure-button pure-button-primary"/>
</form>

<?php
if (isset($messages) && count($messages) > 0) {
    echo '<ol style="margin: 20px; padding: 10px; background-color: #f88; width:300px;">';
    foreach ($messages as $msg) {
        echo '<li>'.$msg.'</li>';
    }
    echo '</ol>';
}
?>

<?php if (isset($result)) { ?>
<div style="margin: 20px; padding: 10px; background-color: #ff0; width:300px;">
    <?php echo 'Miesięczna rata: ' . $result . ' PLN'; ?>
</div>
<?php } ?>

</body>

<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
      <!-- Main -->
      <div id="main">
        <div class="inner">
          <!-- Header -->
          <header id="header">
            <a href="index.html" class="logo"
              ><strong>Mój najlepszy kalkulator kredytowy</strong></a
            >
          </header>

          <!-- Content -->
          <section>
            <header class="main">
              <h1>Kalkulator kretydowy</h1>
            </header>

            <!-- Form -->
            <h3>Form</h3>

            <form method="post" action="#">
              <div class="row gtr-uniform">
                <div class="col-12 col-12-xsmall">
                  <input
                    type="text"
                    id="id_kwota"
                    name="kwota"
                    value="<?php if(isset($kwota)) print($kwota); ?>"
                    placeholder="Kwota kredytu (PLN)"
                  />
                </div>
                <div class="col-12 col-12-xsmall">
                  <input
                    type="text"
                    id="id_lata"
                    name="lata"
                    value="<?php if(isset($lata)) print($lata); ?>"
                    placeholder="Liczba lat"
                  />
                </div>
                <div class="col-12 col-12-xsmall">
                  <input
                    type="text"
                    id="id_oprocentowanie"
                    name="oprocentowanie"
                    value="<?php if(isset($oprocentowanie)) print($oprocentowanie); ?>"
                    placeholder="Oprocentowanie roczne (%)"
                  />
                </div>

                <!-- Break -->
                <div class="col-12">
                  <ul class="actions">
                    <li>
                      <input
                        type="submit"
                        value="Oblicz"
                        class="primary"
                      />
                    </li>
                  </ul>
                </div>
              </div>
              <h2><br />Wynik</h2>
            </form>
          </section>
        </div>
      </div>

      <!-- Sidebar -->
      <div id="sidebar">
        <div class="inner">
          <!-- Menu -->
          <nav id="menu">
            <header class="major">
              <h2>Menu</h2>
            </header>
            <ul>
              <li><a href="index.html">Homepage</a></li>
              <li><a href="generic.html">Generic</a></li>
              <li><a href="elements.html">Elements</a></li>
              <li>
            </ul>
          </nav>
          <!-- Footer -->
          <footer id="footer">
            <p class="copyright">
              &copy; Untitled. All rights reserved. Demo Images:
              <a href="https://unsplash.com">Unsplash</a>. Design:
              <a href="https://html5up.net">HTML5 UP</a>.
            </p>
          </footer>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
