<?php

require __DIR__ . '/models/conx_bd.php';

require __DIR__ . '/controllers/varios.php';

require __DIR__ . '/controllers/utilsforms.php';

echo $blade->render('login');
