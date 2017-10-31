<?php
if (isset($_GET['url'])): ?>
<?php
  $url = $_GET['url'];
  $pattern = '/[0-9]{7,8}$/';
  $return = array();
  if (!preg_match($pattern,$url,$return)) header('Location: ?firststage');
  $url = $return[0];
?>
<html>
  <head>
    <title>Task Getter</title>
    <link rel="icon" href="https://gdmone.ru/favicon.png" type="image/x-icon">
    <meta name="author" content="http://vk.com/wannabeyourdrug" />
    <meta property="og:title" content="Task Getter"/>
    <meta property="og:url" content="http://projects.gdmone.ru/taskgetter"/>
    <meta property="og:site_name" content="Task Getter"/>
    <meta property="og:see_also" content="http://gdmone.ru"/>
    <meta property="og:description" content="Выводит ссылки на решения задач из тестов с ege.sdamgia.ru"/>
    <meta name="description" content="Выводит ссылки на решения задач из тестов с ege.sdamgia.ru"/>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <? include('../~components~/public/topAddon.php'); ?>
    <ul>
      <?php
        $pattern = '/maindiv[0-9]+/';
        $return = array();
        $source = file_get_contents('https://ege.sdamgia.ru/test?id='.$url.'&print=true');
        preg_match_all($pattern,$source,$return);
        $return = $return[0];
        foreach ($return as $key => $id) {
          echo '<li><a target="_blank" href="https://ege.sdamgia.ru/problem?id='.substr($id,7).'">Задание '.($key + 1).'</a></li>';
        }
      ?>
    </ul>
    <a href="?firststage" class="class">Решить ещё один</a>
  </body>
</html>
<?php exit(); endif; ?>
<html>
<head>
  <title>Task Getter</title>
  <link rel="icon" href="https://gdmone.ru/favicon.png" type="image/x-icon">
  <meta name="author" content="http://vk.com/wannabeyourdrug" />
  <meta property="og:title" content="Task Getter"/>
  <meta property="og:url" content="http://projects.gdmone.ru/taskgetter"/>
  <meta property="og:site_name" content="Task Getter"/>
  <meta property="og:see_also" content="http://gdmone.ru"/>
  <meta property="og:description" content="Выводит ссылки на решения задач из тестов с ege.sdamgia.ru"/>
  <meta name="description" content="Выводит ссылки на решения задач из тестов с ege.sdamgia.ru"/>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h3>Cсылка на вариант или его номер:</h3>
  <form action method="get">
    <input type="text" name="url">
    <input type="submit" class="class" value="Показать решения">
  </form>
</body>
</html>
