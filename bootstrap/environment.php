<?php

$Loader = new josegonzalez\Dotenv\Loader(__DIR__ . '/../.env');
$Loader->parse();
$Loader->toEnv();
