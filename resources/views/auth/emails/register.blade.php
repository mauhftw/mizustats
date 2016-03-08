<body>
  <h3>Gracias por registrarse en mizustats</h3>

  <p> Sus datos de incio de sesion son los siguientes: </p>
      <b>Email:</b>{{{$data['email']}}}
      <b>Password:</b>{{{$data['password']}}}

<p> Por favor, haga click en el link para completar su registro:</p> <a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>

<p>Nunca revele su usuario o password a nadie!</p>
</body>
