<?php

include __DIR__ . '/models/conx_bd.php';

include __DIR__ . '/controllers/varios.php';

include __DIR__ . '/controllers/utilsforms.php';

echo $blade->render('login');
