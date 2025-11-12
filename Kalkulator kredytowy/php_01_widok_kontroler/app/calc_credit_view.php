<?php require_once dirname(__FILE__) . '/../config.php'; ?>
<!DOCTYPE html>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html lang="pl">
  <head>
    <title>Kalkulator kredytowy</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php print(_APP_URL); ?>/assets/css/main.css" />
  </head>
  <body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
      <!-- Main -->
      <div id="main">
        <div class="inner">
          <!-- Header -->
          <header id="header">
            <a href="<?php print(_APP_URL); ?>/index.php" class="logo">
              <strong>Mój najlepszy kalkulator kredytowy</strong>
            </a>
          </header>

          <!-- Content -->
          <section>
            <header class="main">
              <h1>Kalkulator kredytowy</h1>
            </header>

            <!-- Form -->
            <form action="<?php print(_APP_URL); ?>/app/calc_credit.php" method="post">
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

                <!-- Przyciski -->
                <div class="col-12">
                  <ul class="actions">
                    <li>
                      <input type="submit" value="Oblicz ratę" class="primary" />
                    </li>
                  </ul>
                </div>
              </div>
            </form>

            <!-- Wyniki / Komunikaty -->
            <?php
            if (isset($messages) && count($messages) > 0) {
                echo '<div style="margin-top: 20px; background-color: #f88; padding: 15px; border-radius: 10px;">';
                echo '<h3>Błędy:</h3><ul>';
                foreach ($messages as $msg) {
                    echo '<li>'.$msg.'</li>';
                }
                echo '</ul></div>';
            }
            ?>

            <?php if (isset($result)) { ?>
            <div style="margin-top: 20px; background-color: #ff0; padding: 15px; border-radius: 10px;">
              <h3>Wynik</h3>
              <p><strong>Miesięczna rata:</strong> <?php echo $result; ?> PLN</p>
            </div>
            <?php } ?>
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
              <li><a href="<?php print(_APP_URL); ?>/index.php">Strona główna</a></li>
              <li><a href="<?php print(_APP_URL); ?>/app/calc_view.php">Kalkulator</a></li>
            </ul>
          </nav>

          <!-- Footer -->
          <footer id="footer">
            <p class="copyright">
              &copy; Twoja aplikacja. Design:
              <a href="https://html5up.net">HTML5 UP</a>.
            </p>
          </footer>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="<?php print(_APP_URL); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php print(_APP_URL); ?>/assets/js/browser.min.js"></script>
    <script src="<?php print(_APP_URL); ?>/assets/js/breakpoints.min.js"></script>
    <script src="<?php print(_APP_URL); ?>/assets/js/util.js"></script>
    <script src="<?php print(_APP_URL); ?>/assets/js/main.js"></script>
  </body>
</html>
