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
        <li><a href="<?php echo url('/'); ?>"><i class="fas fa-home"></i> Home</a></li>  
        <li><a href="<?php echo url('/register'); ?>"><i class="fas fa-user-plus"></i> Register</a></li>
        <li><a href="<?php echo url('/log_in'); ?>"><i class="fas fa-sign-in-alt"></i> LogIn</a></li>
      </ul>
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
    <div class="nav">
      <ul class="navigation">
        <li><a href="<?php echo url('/'); ?>"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="<?php echo url('/edit'); ?>"><i class="fas fa-user-edit"></i> Edit Profile</a></li>
        <li><a href="<?php echo url('/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>

        <!-- <li>
          <form action="{{ route('/logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" style="border: none; background: none; color: inherit; cursor: pointer;">
              <i class="fas fa-sign-out-alt"></> Logout
            </button>
          </form>
        </li> -->
      </ul>

      <!-- <form action="{{ route('logout') }}" method="post">
        @csrf
        <input type="submit" value="Logout">
      </form> -->

      <!-- @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
      @endif -->

      <div class="center-text">
          <?php
              // Display the user's login name
              echo "<h2>You are logged in as user: " . htmlspecialchars(Auth::user()->login) . "</h2>";
          ?>
      </div>

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
            <h2 style="margin-bottom: 10px;">KAMO IDK ČO PÍSAŤ UŽ:</h2>
            <p>IIS PROJEKT JE FAKT SUPER</p>
            <p>KIKO GRECNAR</p>
            <p>RUDO BAUGI</p>
            <p>JURO GERGY</p>
            <p>IIS PROJEKT JE FAKT SUPER</p>
        </div>
    </div>
    <div style="background-color: #8C8C8C; text-align: center; margin-top: 20px;">
        <h2>Ďakujeme Vám za návštevu našej stránky!</h2>
        <h3> COPYRIGHT &copy; KELIGAO, RODO, GOERGY 2024 Czech Republic.</h3>
    </div>
  </footer>
</body>
</html>
<?php
}
?>