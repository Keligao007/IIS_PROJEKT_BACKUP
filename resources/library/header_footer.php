<?php

use Illuminate\Support\Facades\Auth;

// general header
function make_header($title)
{
?>
<!DOCTYPE html> 
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo asset('style/style.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title><?php echo htmlspecialchars($title); ?></title>
</head>
<body>
  <header>
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <div class="nav">
      <ul class="navigation">
      <li><a href="<?php echo url('/register'); ?>"><i class="fas fa-user-plus"></i> Register</a></li>
      <li><a href="<?php echo url('/log_in'); ?>"><i class="fas fa-sign-in-alt"></i> LogIn</a></li>
      <li><a href="<?php echo url('/'); ?>"><i class="fas fa-home"></i> Home</a></li>
      <li><a href="<?php echo url('/moderator'); ?>"><i class="fas fa-user-shield"></i> Skok na moderatora</a></li>
      <li><a href="<?php echo url('/admin'); ?>"><i class="fas fa-user-cog"></i> Skok na admina</a></li>
      <li><a href="<?php echo url('/edit'); ?>"><i class="fas fa-user-edit"></i> Edit Profile</a></li>
      </ul>
      
      <div class="center-text">
          <?php
              // Check if the user is logged in using Auth::check()
              if (Auth::check()) {
                  // If the user is authenticated, display their login name
                  echo "<h3>You are logged in as user: " . htmlspecialchars(Auth::user()->login) . "</h3>";
              } else {
                  // If the user is not authenticated, display a message
                  echo "<h3>You are not logged in.</h3>";
              }
          ?>
      </div>
    </div>
  </header>
<?php
}

// header for unregistered user
function make_header_unlogin($title)
{
?>
<!DOCTYPE html> 
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo asset('style/style.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title><?php echo htmlspecialchars($title); ?></title>
</head>
<body>
  <header>
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <div class="nav">
      <ul class="navigation">
        <li><a href="<?php echo url('/'); ?>"><i class="fas fa-home"></i> Domov</a></li>  
        <li><a href="<?php echo url('/register'); ?>"><i class="fas fa-user-plus"></i> Registrácia</a></li>
        <li><a href="<?php echo url('/log_in'); ?>"><i class="fas fa-sign-in-alt"></i> LogIn</a></li>
      </ul>
      <div class="center-text">
          <?php
              echo "<h3>Nie ste prihlásený. Prosím buď sa prihláste, alebo registrujte!</h3>";
          ?>
      </div>
    </div>
  </header>
<?php
}

// header for logged in user
function make_header_login($title)
{
?>
<!DOCTYPE html> 
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo asset('style/style.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title><?php echo htmlspecialchars($title); ?></title>
</head>
<body>
  <header>
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <nav class="nav">
      <ul class="navigation">
        <li><a href="<?php echo url('/'); ?>"><i class="fas fa-home"></i> Domov</a></li>
        <li><a href="<?php echo route('editProfile'); ?>"><i class="fas fa-user-edit"></i> Edit Profilu</a></li>
        <li>
          <form action="<?php echo route('logout'); ?>" method="post" style="display: inline;">
            <?php echo csrf_field(); ?>
            <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer; font: inherit; text-decoration: none;">
              <i class="fas fa-sign-out-alt"></i> Odhlásiť sa
            </button>
          </form>
        </li>
        <?php if (Auth::check()): ?>
          <li><a href="<?php echo route('samozber.index'); ?>" class="btn btn-primary"><i class="fas fa-list"></i> Zobraziť samozbery</a></li>
          <li><a href="<?php echo route('samozber.create'); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Vytvoriť samozber</a></li>
          <li><a href="<?php echo route('navrhnut_kategoriu'); ?>"><i class="fas fa-user-plus"></i> Navrhnut kategoriu</a></li>
          <li><a href="<?php echo route('vlozit_nabidku'); ?>"><i class="fas fa-sign-in-alt"></i> Vlozit nabidku</a></li>
          <li><a href="<?php echo route('prechadzat_nabidky'); ?>"><i class="fas fa-sign-in-alt"></i> Prechadzat nabidky (vsetky)</a></li>
          <li><a href="<?php echo route('zobrazit_nabidky'); ?>"><i class="fas fa-sign-in-alt"></i> Spravovat svoje nabidky (len jeho)</a></li>
        <?php endif; ?>
      </ul>
      <div class="center-text">
          <?php
              // Display the user's login name
              echo "<h3>Ste prihlásený ako: " . htmlspecialchars(Auth::user()->login) . "</h3>";
          ?>
      </div>
    </nav>
  </header>
<?php
}

// header for moderator
function make_header_moderator($title)
{
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo asset('style/style.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title><?php echo htmlspecialchars($title); ?></title>
  <style>
    .nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .navigation {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }
    .navigation li {
      margin-left: 20px;
    }
    .user-info {
      margin-right: auto;
    }
  </style>
</head>
<body>
  <header>
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <div class="nav">
      <div class="user-info">
        <p>Ste prihlaseny ako moderator.</p>
      </div>
      <ul class="navigation">
      <li>
          <form action="<?php echo route('logout'); ?>" method="post" style="display: inline;">
            <?php echo csrf_field(); ?>
            <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer; font: inherit; text-decoration: none;">
              <i class="fas fa-sign-out-alt"></i> Odhlásiť sa
            </button>
          </form>
        </li>
        // zatial tento logout nefunguje
      </ul>
    </div>
  </header>
<?php
}

// header for admin
function make_header_admin($title)
{
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo asset('style/style.css'); ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title><?php echo htmlspecialchars($title); ?></title>
  <style>
    .nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .navigation {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }
    .navigation li {
      margin-left: 20px;
    }
    .user-info {
      margin-right: auto;
    }
  </style>
</head>
<body>
  <header>
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <div class="nav">
      <div class="user-info">
        <p>Ste prihlaseny ako admin.</p>
      </div>
      <ul class="navigation">
      <li>
          <form action="<?php echo route('logout'); ?>" method="post" style="display: inline;">
            <?php echo csrf_field(); ?>
            <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer; font: inherit; text-decoration: none;">
              <i class="fas fa-sign-out-alt"></i> Odhlásiť sa
            </button>
          </form>
        </li>
        // zatial tento logout nefunguje
      </ul>
    </div>
  </header>
<?php
}

// general footer
function make_footer()
{
?>
  <footer style="background-color: #525252; color: white; padding: 20px; font-size: 14px;">
    <div style="display: flex; justify-content: space-around; flex-wrap: wrap; text-align: center;">
        <!-- About Section -->
        <div>
            <h2 style="margin-bottom: 10px;">O SPOLOČNOSTI:</h2>
            <p>ONLINE PANEL</p>
            <p>KTO SME</p>
            <p>MOŽNOSTI PLATBY</p>
            <p>REKLAMAČNÝ PORIADOK</p>
            <p>OCHRANA OSOBNÝCH ÚDAJOV</p>
        </div>
        <!-- Help Section -->
        <div>
            <h2 style="margin-bottom: 10px;">POMÔŽEME VÁM:</h2>
            <p>KONTAKTUJTE NÁS</p>
            <p>OZNÁMENIA</p>
            <p>NEWSLETTER</p>
        </div>
        <!-- Useful Links -->
        <div>
            <h2 style="margin-bottom: 10px;">UŽITOČNÉ ODKAZY:</h2>
            <p>NÁJDITE MIESTO</p>
            <p>PRE FARMY</p>
            <p>NAŠE POUKAZY</p>
            <p>PRAVIDLÁ NAŠEJ SÚŤAŽE</p>
            <p>APLIKÁCIA</p>
        </div>
        <!-- Fun Section -->
        <div>
            <h2 style="margin-bottom: 10px;">ODKAZY NA SOCIÁLNE SIETE:</h2>
            <p><a href="https://www.youtube.com" class="social-link"><i class="fab fa-youtube"></i> NÁŠ YOUTUBE</a></p>
            <p><a href="https://www.instagram.com" class="social-link"><i class="fab fa-instagram"></i> NÁŠ INSTAGRAM</a></p>
            <p><a href="https://www.facebook.com" class="social-link"><i class="fab fa-facebook"></i> NÁŠ FACEBOOK</a></p>
            <p><a href="https://www.reddit.com" class="social-link"><i class="fab fa-reddit"></i> NÁŠ REDDIT</a></p>
            <p><a href="https://www.twitter.com" class="social-link"><i class="fab fa-twitter"></i> NÁŠ TWITTER</a></p>
        </div>
    </div>
    <div style="background-color: #8C8C8C; text-align: center; margin-top: 20px;">
        <h2>Ďakujeme Vám za návštevu našej stránky!</h2>
        <h3> Copyright <span class="large-copy">&copy;</span> Zelňak official Brno, Czech Republic 2024.</h3>    </div>
  </footer>
</body>
</html>
<?php
}
?>