<?php

require_once __DIR__ . '/../vendor/autoload.php';

var_dump(\Amp\await([
    \Amp\async(fn () => 'toto'),
    \Amp\async(fn () => 'toto 2'),
    \Amp\async(fn () => 'toto 3'),
]));
