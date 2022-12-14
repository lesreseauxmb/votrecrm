<?php 
    $pageTitle = "Gestion des prospects | Votre CRM";

    if(!isset($action) && !isset($id)){
        if(!empty($_POST)){
          $newProspect = (new Prospect([
            "crm_id" => $_POST['crm'],
            "business" => $_POST['business'],
            "contact" => $_POST['contact'],
            "email" => $_POST['email'],
            "phone" => $_POST['phone'],
            "address" => $_POST['address'],
            "city" => $_POST['city'],
            "postalcode" => $_POST['postalcode'],
            "state" => "Quebec",
            "country" => "Canada",
            "step" => 0,
          ]))->Save();
          
          header('location: /admin/gestion-des-prospects');
          exit;
        }
    }

    if(isset($action) && $action == "modifier" && isset($id)){
        $prospect = Prospect::Get($id);
        if(!empty($_POST)){
            $prospect->crm_id = $_POST['crm_id'];
            $prospect->business = $_POST['business'];
            $prospect->contact = $_POST['contact'];
            $prospect->email = $_POST['email'];
            $prospect->phone = $_POST['phone'];
            $prospect->address = $_POST['address'];
            $prospect->city = $_POST['city'];
            $prospect->postalcode = $_POST['postalcode'];
            $prospect->status = $_POST['status'];
            $prospect->step = $_POST['step'];
            $prospect->Save();
            header('location: /admin/gestion-des-prospects');
            exit;
        }
    }

    if(isset($action) && $action == "supprimer" && isset($id)){
        $prospect = Prospect::Delete($id);
        header('location: /admin/gestion-des-prospects');
        exit;
    }

    include_once 'views/v4/header.php'; ?>
    <header class="bg-indigo-900 shadow-sm">
        <div class="mx-auto max-w-7xl py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold leading-6 text-white">Gestion des prospects</h1>
        </div>
    </header>
    <main>
    <?php
        if(isset($action) && $action == "modifier" && isset($id)){ ?>
            <div class="mx-auto py-6 max-w-7xl sm:px-6 lg:px-8">
                <h2 class="text-1xl text-indigo-900 font-bold">Modifier le prospect</h2>
                <form action="" method="post" class="mt-3">
                    <div class="mb-5">
                        <label for="crm_id" class="block text-sm font-medium text-gray-700">Pour quel CRM</label>
                        <select name="crm_id" id="crm_id" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <?php
                                foreach(Crm::FetchAll() as $crm){ ?>
                                    <option <?php if($prospect->crm_id == $crm->id){echo 'selected';} ?> value="<?= $crm->id ?>"><?= $crm->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="business" class="block text-sm font-medium text-gray-700">Entreprise</label>
                        <div class="mt-1">
                            <input type="text" name="business" id="business" value="<?= $prospect->business ?>" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="contact" class="block text-sm font-medium text-gray-700">Nom complet</label>
                        <div class="mt-1">
                            <input type="text" name="contact" id="contact" value="<?= $prospect->contact ?>" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email" value="<?= $prospect->email ?>" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="phone" class="block text-sm font-medium text-gray-700">T??l??phone</label>
                        <div class="mt-1">
                            <input type="phone" name="phone" id="phone" value="<?= $prospect->phone ?>" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                        <div class="mt-1">
                            <input type="text" name="address" id="address" value="<?= $prospect->address ?>" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
                        <div class="mt-1">
                            <input type="text" name="city" id="city" value="<?= $prospect->city ?>" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="postalcode" class="block text-sm font-medium text-gray-700">Code postal</label>
                        <div class="mt-1">
                            <input type="text" name="postalcode" value="<?= $prospect->postalcode ?>" id="postalcode" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
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
                    <div class="mb-5">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="mt-1">
                            <select name="status" id="status" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <option></option>
                                <?php
                                    foreach([
                                      "Contact initial",
                                      "Pas int??ress??",
                                      "Int??ress??",
                                      "D??monstration compl??te",
                                    ] as $option){ ?>
                                    <option <?php if($prospect->status == $option){echo 'selected';} ?> value="<?= $option ?>"><?= $option ?></option>
                                <?php } ?>
                            </select>               
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="step" class="block text-sm font-medium text-gray-700">??tape</label>
                        <div class="mt-1">
                            <select name="step" id="step" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <?php
                                    foreach([
                                      "0" => "Aucune action pour l'instant",
                                      "1" => "Contact initial: T??l??phone - Validation des informations",
                                      "2" => "Contact secondaire: E-mail - Sondage pour comptable",
                                      "3" => "Contact final: Envoi par la poste - Lettre pour convaincre de voir une d??mo",
                                    ] as $i => $option){ ?>
                                    <option <?php if($prospect->step == $i){echo 'selected';} ?> value="<?= $i ?>"><?= $option ?></option>
                                <?php } ?>
                            </select>               
                        </div>
                    </div>
                    <button type="submit" class="mt-2 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-900 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 sm:col-start-2 sm:text-sm">Sauvegarder la modification</button>
                </form>
            </div>
    <?php } ?>
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
<div class="px-4 sm:px-6 lg:px-8">
  <div class="sm:flex sm:items-center">
    <div class="sm:flex-auto">
    </div>
    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
        <button id="newProspect" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-900 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Ajouter un prospect</button>
    </div>
  </div>
  <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <table class="min-w-full divide-y divide-gray-300">
          <thead>
            <tr>
              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">#</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">CRM</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Entreprise</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Contact</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">T??l??phone</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">E-mail</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Adresse</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Ville</th>             
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Code postal</th>             
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Province</th>             
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Pays</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Status</th>              
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">??tape</th>             
              <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 md:pr-0">
                <span class="sr-only">Modifier</span>
              </th>
              <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 md:pr-0">
                <span class="sr-only">Supprimer</span>
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <?php
                foreach(Prospect::FetchAll() as $prospect){
                  $crm = Crm::Get($prospect->crm_id); ?>
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0"><?= $prospect->id ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $crm->name ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $prospect->business ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $prospect->contact ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $prospect->phone ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $prospect->email ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $prospect->address ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $prospect->city ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $prospect->postalcode ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $prospect->state ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $prospect->country ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $prospect->status ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $prospect->step ?></td>
                       
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                            <a href="/admin/gestion-des-prospects/modifier/<?= $prospect->id ?>" class="text-indigo-900">Modifier</a>                            
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                            <a href="/admin/gestion-des-prospects/supprimer/<?= $prospect->id ?>" class="text-indigo-900">Supprimer</a>                            
                        </td>
                    </tr>
            <?php } ?>
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
<div id="prospect" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
            <h3 class="mb-5 text-lg leading-6 font-medium text-gray-900" id="modal-title">Ajouter un prospect</h3>
            <div class="mt-2">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-5">
                        <label for="crm" class="block text-sm font-medium text-gray-700">Pour quel CRM</label>
                        <select name="crm" id="crm" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <?php
                                foreach(Crm::FetchAll() as $crm){ ?>
                                    <option value="<?= $crm->id ?>"><?= $crm->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="business" class="block text-sm font-medium text-gray-700">Entreprise</label>
                        <div class="mt-1">
                            <input type="text" name="business" id="business" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="contact" class="block text-sm font-medium text-gray-700">Nom complet</label>
                        <div class="mt-1">
                            <input type="text" name="contact" id="contact" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="phone" class="block text-sm font-medium text-gray-700">T??l??phone</label>
                        <div class="mt-1">
                            <input type="phone" name="phone" id="phone" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
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
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-900 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 sm:col-start-2 sm:text-sm">Ajouter le prospect</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    let prospect = document.body.querySelector("#prospect");
    let buttonNew = document.body.querySelector("#newProspect");
    let cancel = document.body.querySelector("#cancel");


    buttonNew.addEventListener('click',() => {
        prospect.classList.remove('hidden');
    });

    cancel.addEventListener('click',() => {
        prospect.classList.add('hidden');
    });
</script>


<?php include_once 'views/v4/footer.php'; ?>