<?php 
    $pageTitle = __("Boîte à suggestion | Votre CRM","Suggestion box | Votre CRM"); 
    if(!empty($_POST)){
        $newSuggestion = (new Suggestion([
            "user_id" => $USER->id,
            "crm_id" => $_POST['crm'],
            "suggestion" => $_POST['suggestion'],
            "status" => "En attente",
        ]))->Save();
        header('location: /v4/boite-a-suggestion');
        exit;
    }
    include_once 'views/v4/header.php'; ?>
    <header class="bg-indigo-900 shadow-sm">
        <div class="mx-auto max-w-7xl py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold leading-6 text-white"><?= __("Boîte à suggestion","Suggestion box") ?></h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
             <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button id="newSuggestion" type="button" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-900 px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"><?= __("Ajouter une suggestion","Add a suggestion") ?></button>
                </div>
            </div>
            <!-- This example requires Tailwind CSS v2.0+ -->
            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php
                    foreach(Suggestion::FetchAll("WHERE user_id = ?",[$USER->id]) as $suggestion){
                        $crm = Crm::Get($suggestion->crm_id); ?>
                        <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                            <div class="flex w-full items-center justify-between space-x-6 p-6">
                            <div class="flex-1">
                                <div class="flex items-center space-x-3">
                                <h3 class="truncate text-sm font-medium text-gray-900"><?= $crm->name ?></h3>
                                <span class="inline-block flex-shrink-0 rounded-full <?php if($suggestion->status == "En attente") echo 'bg-red-100 text-red-800'; elseif($suggestion->status == "Répondu") echo 'bg-orange-100 text-orange-800'; else echo "bg-green-100 text-green-800"; ?> px-2 py-0.5 text-xs font-medium"><?= $suggestion->status ?></span>
                                </div>
                                <p class="mt-1 text-sm text-gray-500"><?= $suggestion->suggestion ?></p>
                            </div>
                            <?php
                                if($USER->photo != NULL){ ?>
                                    <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300" src="/uploads/profil/<?= $USER->id ?>/<?= $USER->photo ?>" alt="">
                            <?php } else { ?>
                                    <img class="h-10 w-10 flex-shrink-0 rounded-full bg-gray-300" src="/assets/images/avatar.png" alt="">
                            <?php } ?>
                            </div>
                            <div>
                            
                                
                            <?php if($suggestion->response != NULL){ ?>
                                <div class="-mt-px flex divide-x divide-gray-200">
                                    <p class="text-sm p-7 text-gray-500"><span class="font-bold">Réponse reçu: </span><?= $suggestion->response ?></p>
                                </div>
                            <?php } ?>
                            </div>
                        </li>
                <?php } ?>
            </ul>

        </div>
            
                

    </main>
        </div>
</div>

<!-- This example requires Tailwind CSS v2.0+ -->
<div id="suggestion" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
            <h3 class="mb-5 text-lg leading-6 font-medium text-gray-900" id="modal-title"><?= __("Ajouter une suggestion","Add a suggestion") ?></h3>
            <div class="mt-2">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-5">
                        <label for="crm" class="block text-sm font-medium text-gray-700"><?= __("Pour quel CRM","For which CRM") ?></label>
                        <select name="crm" id="crm" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            <?php
                                foreach(Crm::FetchAll() as $crm){ ?>
                                    <option value="<?= $crm->id ?>"><?= $crm->name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-5">
                        <label for="suggestion" class="block text-sm font-medium text-gray-700">Suggestion</label>
                        <div class="mt-1">
                            <input type="text" name="suggestion" id="suggestion" class="p-2 shadow-sm focus:ring-red-500 focus:border-red-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
            <button id="cancel" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:mt-0 sm:col-start-1 sm:text-sm"><?= __("Annuler","Cancel") ?></button>
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-900 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 sm:col-start-2 sm:text-sm"><?= __("Ajouter la suggestion","Add suggestion") ?></button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- This example requires Tailwind CSS v2.0+ -->
<!-- Global notification live region, render this permanently at the end of the document -->
<div aria-live="assertive" class="pointer-events-none fixed bottom-0 right-5 w-full flex items-end px-4 py-6 sm:items-start sm:p-6">
  <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
    <!--
      Notification panel, dynamically insert this into the live region when it needs to be displayed

      Entering: "transform ease-out duration-300 transition"
        From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        To: "translate-y-0 opacity-100 sm:translate-x-0"
      Leaving: "transition ease-in duration-100"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
      <div class="p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <!-- Heroicon name: outline/check-circle -->
            <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-3 w-0 flex-1 pt-0.5">
            <p class="text-sm font-medium text-gray-900">Successfully saved!</p>
            <p class="mt-1 text-sm text-gray-500">Anyone with a link can now view this file.</p>
          </div>
          <div class="ml-4 flex flex-shrink-0">
            <button type="button" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
              <span class="sr-only">Close</span>
              <!-- Heroicon name: mini/x-mark -->
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
    let suggestion = document.body.querySelector("#suggestion");
    let buttonNew = document.body.querySelector("#newSuggestion");
    let cancel = document.body.querySelector("#cancel");


    buttonNew.addEventListener('click',() => {
        suggestion.classList.remove('hidden');
    });

    cancel.addEventListener('click',() => {
        suggestion.classList.add('hidden');
    });
</script>

<?php include_once 'views/v4/footer.php'; ?>