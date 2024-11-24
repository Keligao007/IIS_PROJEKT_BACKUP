@extends('layout.user_layout')

@section('title', 'Registrovany')
@section('header', 'Registrovany')


<?php
if (isset($_SESSION['user']))
{
    //echo "Current user: <strong>" . $_SESSION['user'] . '</strong>';
    //echo '<p><a href="admin.php">Go to admin page</a>';
    //echo '<p><a href="logout.php">Logout</a>';
    ?><h1>SI TU</h1><?php
}
else
{
    ?><h1>NEPRIHLASENY</h1><?php
}
?>

@section('content')
    <!-- <h2>vitajte na nasej stranke</h2> -->
     <h1>Registrovany uzivatel</h1>

     <ul class="navigation">
      <li><a href="<?php route('navrhnut_kategoriu'); ?>"><i class="fas fa-user-plus"></i> Navrhnut kategoriu</a></li>
      <li><a href="<?php route('vlozit_nabidku'); ?>"><i class="fas fa-sign-in-alt"></i> Vlozit nabidku</a></li>
      <li><a href="<?php route('prechadzat_nabidky'); ?>"><i class="fas fa-sign-in-alt"></i> Prechadzat nabidky</a></li>
     </ul>
@endsection