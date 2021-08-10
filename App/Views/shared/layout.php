<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEEK_BAKERY</title>

    <link rel="icon" href="<?= ICONS_URL ?>/favio.png "/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet"
    />

    <?php if (strpos($view, 'login') !== false || strpos($view, 'register') !== false) : ?>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-usVBAd66/NpVNfBge19gws2j6JZinnca12rAe2l+d+QkLU9fiG02O1X8Q6hepIpr/EYKZvKx/I9WsnujJuOmBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

      <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/account.css" />

      <?php else : ?>
      <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/reset.css" />
      <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/base.css" />
      <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/header.css" />
      <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/footer.css" />
      <link rel="stylesheet" href="<?= PUBLIC_URL ?>/css/home.css" />
    <?php endif; ?>
    
  </head>
  <?php if (strpos($view, 'login') !== false || strpos($view, 'register') !== false) : ?>

    <?php require_once(VIEW .  $view . ".php") ?>

  <?php else : ?>
  <body>
    <div id="toast">
        <div id="img">Icon</div>
        <div id="desc">A notification message..</div>
    </div>

    <p hidden id="documentRootId"><?= DOCUMENT_ROOT ?></p>

    <?php require_once(VIEW . '/shared/header.php') ?>

    <?php require_once(VIEW .  $view . ".php") ?>

    <?php require_once(VIEW . '/shared/footer.php') ?>
    
    <script src="<?= PUBLIC_URL ?>/js/showslide.js"></script>
    <script src="<?= PUBLIC_URL ?>/js/cart.js"></script>
  </body>
  <?php endif; ?>
</html>