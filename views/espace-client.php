<?php
    if(isset($USER)){
        header('location: /v4/tableau-de-bord');
        exit;
    }

    if(!empty($_POST)){
        if(!empty($_POST['email'])){
            $user = User::GetBy('email',$_POST['email']);
        }
        if($user && $user->password == sha1("les".$_POST['password']."reseauxmb")){
            $_SESSION['id'] = $user->id;
            header('location: /v4/tableau-de-bord');
            exit;
        } else {
            BootstrapAlert::Error("Une erreur est survenue");
            header("location: /espace-client");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="fr" class="h-full bg-white">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<link rel="stylesheet" href="/assets/css/tailwind.css" />
		<title><?= __("Espace client | Votre CRM","Customer area | Your CRM") ?></title>
	</head>
	<body class="h-full">
		<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<div class="min-h-full flex">
  <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
    <div class="mx-auto w-full max-w-sm lg:w-96">
      <div>
        <img class="h-16 w-auto" src="/assets/images/logo-icon.png" alt="Sbdcloud">
        <h2 class="mt-6 text-3xl font-extrabold text-indigo-900"><?= __("Connexion à votre espace client","Login to your customer area") ?></h2>
        <p class="mt-2 text-sm text-gray-600">
          ou
          <a href="/" class="font-medium text-indigo-900 hover:text-indigo-900"> <?= __("retour à l'accueil","back to home") ?> </a>
        </p>
      </div>

      <div class="mt-8">

        <div class="mt-6">
          <form action="#" method="POST" class="space-y-6">
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700"> <?= __("Adresse e-mail","E-mail address") ?> </label>
              <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
            </div>

            <div class="space-y-1">
              <label for="password" class="block text-sm font-medium text-gray-700"> <?= __("Mot de passe","Password"); ?> </label>
              <div class="mt-1">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
            </div>

            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo border-gray-300 rounded">
                <label for="remember-me" class="ml-2 block text-sm text-gray-900"> <?= __("Se souvenir de moi","Remember me") ?> </label>
              </div>

              <div class="text-sm">
                <a href="#" class="font-medium text-indigo-900"> <?= __("Mot de passe oublié","Forgot your password") ?> ? </a>
              </div>
            </div>

            <div>
              <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-offset-2"><?= __("Connexion","Login") ?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="hidden lg:block relative w-0 flex-1">
    <img class="absolute inset-0 h-full w-full object-cover" src="/assets/images/home4.jpg" alt="">
  </div>
</div>

	</body>
</html>
