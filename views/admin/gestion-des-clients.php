<?php 
    $pageTitle = "Gestion des clients | Votre CRM";
    if(!empty($_POST)){
        $newClient = (new User([
            "type" => 'client',
            "completename" => $_POST['completename'],
            "email" => $_POST['email'],
            "password" => sha1("les"."1234"."reseauxmb"),
            "phone" => $_POST['phone'],
            "business" => $_POST['business'],
            "address" => $_POST['address'],
            "city" => $_POST['city'],
            "postalcode" => $_POST['postalcode'],
            "state" => "Quebec",
            "country" => "Canada",
        ]))->Save();
        header('location: /admin/gestion-des-clients');
        exit;
    }
    if(isset($action) && $action == "connexion" && isset($id)){
        $_SESSION['id'] = $id;
        $_SESSION['connect_user'] = true;
        header('location: /v4/tableau-de-bord');
        exit;
    }
    include_once 'views/v4/header.php'; ?>
    <header class="bg-indigo-900 shadow-sm">
        <div class="mx-auto max-w-7xl py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold leading-6 text-white">Gestion des clients</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button id="newClient" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-900 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Ajouter un client</button>
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">#</th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Nom complet</th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">E-mail</th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Téléphone</th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Entreprise</th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Adresse</th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Ville</th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Code postal</th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Province</th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Pays</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 md:pr-0">
                            <span class="sr-only">Edit</span>
                        </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                            foreach(User::FetchAll("WHERE type = ?",["client"]) as $user){ ?>
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0"><?= $user->id ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $user->completename ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $user->email ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $user->phone ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $user->business ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $user->address ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $user->city ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $user->postalcode ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $user->state ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $user->country ?></td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                                        <a href="/admin/gestion-des-clients/connexion/<?= $user->id ?>" class="text-indigo-900">Connexion</a>
                                    </td>
                                </tr>
                        <?php } ?>

                        <!-- More people... -->
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
    </main>
</div>

<!-- This example requires Tailwind CSS v2.0+ -->
<div id="client" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity opacity-100"></div>

  <div class="fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end sm:items-center justify-center min-h-full p-4 text-center sm:p-0">
      <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
      <div class="relative bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full sm:p-6">
        <div>
          <div class="mt-3 sm:mt-5">
            <h3 class="mb-5 text-lg leading-6 font-medium text-gray-900" id="modal-title">Ajouter un client</h3>
            <div class="mt-2">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-5">
                        <label for="completename" class="block text-sm font-medium text-gray-700">Nom complet</label>
                        <div class="mt-1">
                            <input type="text" name="completename" id="completename" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                        <div class="mt-1">
                            <input type="phone" name="phone" id="phone" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="business" class="block text-sm font-medium text-gray-700">Entreprise</label>
                        <div class="mt-1">
                            <input type="text" name="business" id="business" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                        <div class="mt-1">
                            <input type="text" name="address" id="address" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
                        <div class="mt-1">
                            <input type="text" name="city" id="city" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="postalcode" class="block text-sm font-medium text-gray-700">Code postal</label>
                        <div class="mt-1">
                            <input type="text" step="0.01" name="postalcode" id="postalcode" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="state" class="block text-sm font-medium text-gray-700">Province</label>
                        <div class="mt-1">
                            <select name="state" disabled id="state" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="Quebec">Quebec</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="country" class="block text-sm font-medium text-gray-700">Pays</label>
                        <div class="mt-1">
                            <select name="country" disabled id="country" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="Canada">Canada</option>
                            </select>               
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
            <button id="cancel" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:col-start-1 sm:text-sm">Annuler</button>
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-900 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 sm:col-start-2 sm:text-sm">Ajouter le client</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    let client = document.body.querySelector("#client");
    let buttonNew = document.body.querySelector("#newClient");
    let cancel = document.body.querySelector("#cancel");


    buttonNew.addEventListener('click',() => {
        client.classList.remove('hidden');
    });

    cancel.addEventListener('click',() => {
        client.classList.add('hidden');
    });
</script>

<?php include_once 'views/v4/footer.php'; ?>