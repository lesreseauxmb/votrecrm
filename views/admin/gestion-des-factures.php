<?php
    // un cron job pour date de début jusqu'à date de fin
    // un cron job qui renouvelle les date de fin pour une année avec création de facture date + un mois pour échéance.
    $pageTitle = "Gestion des factures | Votre CRM";

    if(isset($action) && $action == "paiement" && isset($id)){
        if(!empty($_POST)){
            $invoice = Invoice::Get($id);
            $invoice->payment_method = $_POST['payment_method'];
            $invoice->payment_date = $_POST['payment_date'];
            $invoice->Save();

            // envoi API vers Les Reseaux MB réception d'un paiement ajout dans les revenus
            header('location: /admin/gestion-des-factures');
            exit;
        }
    }
    
    include_once 'views/v4/header.php'; ?>
    <header class="bg-indigo-900 shadow-sm">
        <div class="mx-auto max-w-7xl py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold leading-6 text-white">Gestion des factures</h1>
        </div>
    </header>
    <main>
        <?php
            if(isset($action) && $action == "paiement" && isset($id)){ ?>
                <div class="mx-auto py-6 max-w-7xl sm:px-6 lg:px-8">
                    <h2 class="text-1xl text-indigo-900 font-bold">Ajouter un paiement</h2>
                    <form action="" method="post" class="mt-3">
                        <label for="payment_method" class="block text-sm font-medium text-gray-700">Méthode de paiement</label>
                        <div class="mt-2">
                            <select name="payment_method" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option value="Carte de crédit">Carte de crédit</option>
                                <option value="Virement interac">Virement interac</option>
                                <option value="Chèque">Chèque</option>
                                <option value="Virement bancaire">Virement bancaire</option>
                            </select>
                        </div>
                        <div class="mt-2">
                        <label for="payment_date" class="block text-sm font-medium text-gray-700">Date du paiement</label>
                            <input type="date" name="payment_date" id="payment_date" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                        <button type="submit" class="mt-2 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-900 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 sm:col-start-2 sm:text-sm">Sauvegarder le paiement</button>
                    </form>
                </div>
        <?php } ?>
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">#</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Nom du client</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Entreprise</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Items</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Sous-total</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">TPS</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">TVQ</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Total</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Date de création</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Date d'échéance</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Date de paiement</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Méthode de paiement</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 md:pr-0">
                                <span class="sr-only">Appliquer un paiement</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                            foreach(Invoice::FetchAll() as $invoice){
                                $client = User::Get($invoice->user_id); ?>
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0"><?= $invoice->id ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $client->completename ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $client->business ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
                                        <?php foreach(json_decode($invoice->items) as $item){
                                            echo $item->title." - ";
                                        } ?>
                                    </td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->subtotal ?>$</td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->tps ?>$</td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->tvq ?>$</td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->total ?>$</td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->creation_date ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->due_date ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->payment_date ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->payment_method ?></td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                                        <a href="/v4/facture/<?= $invoice->id ?>" class="text-indigo-900">Voir la facture</a>
                                    </td>
                                    
                                    <?php
                                        if($invoice->payment_date == NULL){ ?>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                                                <a href="/admin/gestion-des-factures/paiement/<?= $invoice->id ?>" class="text-indigo-900">Appliquer un paiement</a>
                                            </td>
                                    <?php } ?>
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