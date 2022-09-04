<?php 
    $pageTitle = "Mes licences | Votre CRM"; 
    include_once 'views/v4/header.php'; ?>
    <header class="bg-indigo-900 shadow-sm">
        <div class="mx-auto max-w-7xl py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold leading-6 text-white">Mes licences</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
<div class="overflow-hidden bg-white shadow sm:rounded-md">
  <ul role="list" class="divide-y divide-gray-200">
    <?php
        foreach(Licence::FetchAll("WHERE user_id = ?",[$USER->id]) as $licence){
          $user = User::Get($licence->user_id);
          $crm = Crm::Get($licence->crm_id); ?>
            <li>
              <a href="#" class="block hover:bg-gray-50">
                <div class="px-4 py-4 sm:px-6">
                  <div class="flex items-center justify-between">
                    <p class="truncate text-sm font-medium text-indigo-900"><?= $crm->name ?> - Utilisé par: <?= $user->business." - ".$user->completename; ?></p>
                    <div class="ml-2 flex flex-shrink-0">
                      <p class="inline-flex rounded-full <?php if($licence->status == "Active"){echo 'bg-green-100 text-green-800';} elseif($licence->status == "Inactive") {echo 'bg-red-100 text-red-800';} else {echo 'bg-gray-100 text-gray-800';} ?>  px-2 text-xs font-semibold leading-5"><?= $licence->status ?></p>
                    </div>
                  </div>
                  <div class="mt-2 sm:flex sm:justify-between">
                    <div class="sm:flex">
                      <p class="flex items-center text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-1.5 h-5 w-5 flex-shrink-0 text-indigo-900">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>

                        Date de début: <?= $licence->start_date ?>
                      </p>
                      <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                        <!-- Heroicon name: mini/map-pin -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-1.5 h-5 w-5 flex-shrink-0 text-indigo-900">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                        Date du prochain renouvellement: <?= $licence->renew_date ?>
                      </p>
                    </div>
                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-1.5 h-5 w-5 flex-shrink-0 text-indigo-900">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                      </svg>
                      <p><?= $licence->licence ?></p>
                    </div>
                  </div>
                </div>
              </a>
            </li>
    <?php } ?>
  </ul>
</div>

        </div>
    </main>
</div>

<?php include_once 'views/v4/footer.php'; ?>