<?php 
    $pageTitle = "Gestion des licences | Votre CRM";

    function KeyGen(){
      $key = md5(mktime());
      $new_key = '';
      for($i=1; $i <= 25; $i ++ ){
                $new_key .= $key[$i];
                if ( $i%5==0 && $i != 25) $new_key.='-';
      }
      return strtoupper($new_key);
    }

    if(!empty($_POST)){
      $newLicence = (new Licence([
          "user_id" => $_POST['client'],
          "crm_id" => $_POST['crm'],
          "licence" => KeyGen(),
          "start_date" => $_POST['start_date'],
          "renew_date" => $_POST['renew_date'],
          "status" => "Active",
      ]))->Save();

      // création de la factures avec pro-rata

      header('location: /admin/gestion-des-licences');
      exit;
    }

    if(isset($action) && $action == "inactive" && isset($id)){
        $licence = Licence::Get($id);
        $licence->status = "Inactive";
        $licence->Save();

        header('location: /admin/gestion-des-licences');
        exit;
    }

    if(isset($action) && $action == "active" && isset($id)){
      $licence = Licence::Get($id);
      $licence->status = "Active";
      $licence->Save();

      header('location: /admin/gestion-des-licences');
      exit;
    }

    include_once 'views/v4/header.php'; ?>
    <header class="bg-indigo-900 shadow-sm">
        <div class="mx-auto max-w-7xl py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold leading-6 text-white">Gestion des licences</h1>
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
        <button id="newLicence" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-900 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Ajouter une licence</button>
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
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">CRM</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Prix</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">No de licence</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Date de début</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Date de renouvellement</th>
              <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Status</th>             
              <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 md:pr-0">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <?php
                foreach(Licence::FetchAll() as $licence){
                  $user = User::Get($licence->user_id);
                  $crm = Crm::Get($licence->crm_id); ?>
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0"><?= $licence->id ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $user->business." - ".$user->completename ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $crm->name ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $crm->price."$ par année"; ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $licence->licence ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $licence->start_date ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $licence->renew_date ?></td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $licence->status ?></td>
                       
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                            <?php
                                if($licence->status == "active"){ ?>
                                    <a href="/admin/gestion-des-licences/inactive/<?= $licence->id ?>" class="text-indigo-900">Mettre en inactive</a>
                            <?php } else { ?>
                                    <a href="/admin/gestion-des-licences/active/<?= $licence->id ?>" class="text-indigo-900">Mettre en inactive</a>      
                            <?php } ?>
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
<div id="licence" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
            <h3 class="mb-5 text-lg leading-6 font-medium text-gray-900" id="modal-title">Ajouter une licence</h3>
            <div class="mt-2">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-5">
                        <label for="client" class="block text-sm font-medium text-gray-700">Client</label>
                        <div class="mt-1">
                            <select name="client" id="client" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                <?php
                                    foreach(User::FetchAll("WHERE type = ?",["client"]) as $user){ ?>
                                        <option value="<?= $user->id ?>"><?= $user->business." - ".$user->completename ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
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
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Date de début</label>
                        <div class="mt-1">
                            <input type="date" name="start_date" id="start_date" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="renew_date" class="block text-sm font-medium text-gray-700">Date de renouvellement</label>
                        <div class="mt-1">
                            <input type="date" name="renew_date" id="renew_date" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
            <button id="cancel" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:col-start-1 sm:text-sm">Annuler</button>
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-900 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 sm:col-start-2 sm:text-sm">Activer la licence</button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    let licence = document.body.querySelector("#licence");
    let buttonNew = document.body.querySelector("#newLicence");
    let cancel = document.body.querySelector("#cancel");


    buttonNew.addEventListener('click',() => {
        licence.classList.remove('hidden');
    });

    cancel.addEventListener('click',() => {
        licence.classList.add('hidden');
    });
</script>


<?php include_once 'views/v4/footer.php'; ?>