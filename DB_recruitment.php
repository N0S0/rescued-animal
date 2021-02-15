<?php
require_once('./DBInfo.php');

function getPets()
{
  $pdo = getPdo();

  $sql = 'SELECT * FROM pets';
  $statement = $pdo->query($sql);
  $data = $statement->fetchAll();
  return $data;
}


function getDogs()
{
  $pdo = getPdo();

  $sql = 'SELECT * FROM pets WHERE pets="dog"';
  $statement = $pdo->query($sql);
  $data = $statement->fetchAll();
  return $data;
}

function getCats()
{
  $pdo = getPdo();

  $sql = 'SELECT * FROM pets WHERE pets="cat"';
  $statement = $pdo->query($sql);
  $data = $statement->fetchAll();
  return $data;
}