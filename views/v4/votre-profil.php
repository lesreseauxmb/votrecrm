<?php 
    $pageTitle = "Votre profil | Votre CRM"; 
    include_once 'views/v4/header.php'; ?>
    <header class="bg-indigo-900 shadow-sm">
        <div class="mx-auto max-w-7xl py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold leading-6 text-white">Gestion de votre profil</h1>
        </div>
    </header>
    <main class="flex-1">
        <div class="py-6">
          
          <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 mt-5">
          <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="divide-y divide-gray-200 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x">
          

          <form class="divide-y divide-gray-200 lg:col-span-12" action="#" method="POST" enctype="multipart/form-data">
            <!-- Profile section -->
            <div class="py-6 px-4 sm:p-6 lg:pb-8">
              <div class="mt-6 flex flex-col lg:flex-row">
                <div class="flex-grow space-y-6">
                <div class="col-span-12 sm:col-span-6">
                  <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                  <input type="email" name="email" id="email" autocomplete="given-name" value="<?= $USER->email ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>
                <div class="col-span-12 sm:col-span-6">
                  <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                  <input type="password" name="password" id="password" autocomplete="family-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>
                </div>

                <div class="mt-6 flex-grow lg:mt-0 lg:ml-6 lg:flex-grow-0 lg:flex-shrink-0">
                  <p class="text-sm font-medium text-gray-700" aria-hidden="true">Photo</p>
                  <div class="mt-1 lg:hidden">
                    <div class="flex items-center">
                      <div class="flex-shrink-0 inline-block rounded-full overflow-hidden h-12 w-12" aria-hidden="true">
                        <?php
                          if($USER->photo != NULL){ ?>
                            <img class="rounded-full h-full w-full" src="/uploads/profil/<?= $USER->id ?>/<?= $USER->photo ?>" alt="">
                        <?php } else { ?>
                            <img class="rounded-full h-full w-full" src="/assets/images/avatar.png" alt="">
                        <?php } ?>
                      </div>
                      <div class="ml-5 rounded-md shadow-sm">
                        <div class="group relative border border-gray-300 rounded-md py-2 px-3 flex items-center justify-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-sky-500">
                          <label for="mobile-user-photo" class="relative text-sm leading-4 font-medium text-gray-700 pointer-events-none">
                            <span>Modifier</span>
                            <span class="sr-only"> user photo</span>
                          </label>
                          <input id="mobile-user-photo" name="photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="hidden relative rounded-full overflow-hidden lg:block">
                    <img class="relative rounded-full w-40 h-40" src="/assets/images/avatar.png" alt="">
                      
                    <label for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                      <span>Modifier</span>
                      <input type="file" id="desktop-user-photo" name="photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                    </label>
                  </div>
                </div>
              </div>

              <div class="mt-6 grid grid-cols-12 gap-6">
                <div class="col-span-12 sm:col-span-6">
                  <label for="completename" class="block text-sm font-medium text-gray-700">Nom complet</label>
                  <input type="text" name="completename" id="completename" value="<?= $USER->completename ?>" autocomplete="given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
                  <input type="text" name="phone" id="phone" value="<?= $USER->phone ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="business" class="block text-sm font-medium text-gray-700">Entreprise</label>
                  <input type="text" name="business" id="business" value="<?= $USER->business ?>" autocomplete="organization" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>
                
              </div>

              <div class="mt-12 grid grid-cols-12 gap-6">
                <div class="col-span-12">
                  <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
                  <input type="text" name="address" id="address" value="<?= $USER->address ?>" autocomplete="given-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="city" class="block text-sm font-medium text-gray-700">Ville</label>
                  <input type="text" name="city" id="city" value="<?= $USER->city ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="postalcode" class="block text-sm font-medium text-gray-700">Code postal</label>
                  <input type="text" name="postalcode" id="postalcode" value="<?= $USER->postalcode ?>" autocomplete="organization" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="city" class="block text-sm font-medium text-gray-700">Province</label>
                  <select name="state" disabled id="state" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                    <option value="Quebec">Quebec</option>
                  </select>
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="postalcode" class="block text-sm font-medium text-gray-700">Pays</label>
                  <select name="country" disabled id="country" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                    <option value="Canada">Canada</option>
                  </select>
                </div>
                
              </div>
            </div>

            <!-- Privacy section -->
            <div class="pt-6 divide-y divide-gray-200">
              
              <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
                  <button type="submit" name="editprofil" class="ml-5 bg-indigo-900 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Sauvegarder les modifications</button>
              </div>
            </div>
          </form>
        </div>
      </div>
          </div>
        </div>
      </main>
</div>
                    </div>

<?php include_once 'views/v4/footer.php'; ?>