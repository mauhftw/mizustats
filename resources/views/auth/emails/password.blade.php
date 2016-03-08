<body>
  <h3>Bienvenido a mizustats</h3>
  <p> Por favor, haga click en el link para resetear su password:</p> <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
  <p> Por favor, nunca revele su usuario o password a nadie</p>
</body>
