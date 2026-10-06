<?php

$pdo = new PDO(
    "pgsql:host=localhost;port=5432;dbname=manutencao",
    "postgres",
    "1234"
);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo "Banco conectado!";