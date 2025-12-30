<?php
require_once 'init.php';

require_once 'routing.php';

\core\SessionUtils::loadMessages();

// uruchom routing
\core\App::getRouter()->go();
