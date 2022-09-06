<?php 
    $pageTitle = __("Votre profil | Votre CRM","Your profile | Votre CRM");
    
    if(isset($_POST['editprofil'])){
        $USER->email = $_POST['email'];
        if(!empty($_POST['password'])){
            $USER->password = sha1("les".$_POST['password']."reseauxmb");
            $USER->Save();
            session_unset();
            session_destroy();
            header('location: /espace-client');
            exit;
        }
        $USER->completename = $_POST['completename'];
        $USER->phone = $_POST['phone'];
        $USER->business = $_POST['business'];
        
        $_SESSION['lang'] = $_POST['language'];

        if(isset($_FILES['photo'])){
            uploadImage::Upload(0,'profil',$USER->id,'photo');
            $USER->photo = $_FILES['photo']['name'];
        }

        $USER->Save();

        //BootstrapAlert::Success(__("Votre profil a été modifié avec succès","Your profile has been successfully modified"));
        header('location: /v4/votre-profil');
        exit;
    }

    include_once 'views/v4/header.php'; ?>
    <header class="bg-indigo-900 shadow-sm">
        <div class="mx-auto max-w-7xl py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold leading-6 text-white"><?= __("Gestion de votre profil","Managing your profile") ?></h1>
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
                  <input type="email" name="email" id="email" autocomplete="email" value="<?= $USER->email ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>
                <div class="col-span-12 sm:col-span-6">
                  <label for="password" class="block text-sm font-medium text-gray-700"><?= __("Mot de passe","Password") ?></label>
                  <input type="password" name="password" id="password" autocomplete="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>
                <div class="col-span-12 sm:col-span-6">
                  <label for="password" class="block text-sm font-medium text-gray-700"><?= __("Langue","Language") ?></label>
                  <select name="language" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                        <?php foreach([
                            "fr" => "Français",
                            "en" => "English",
                        ] as $i => $langue){ ?>
                            <option <?php if($_SESSION['lang'] == $i){echo 'selected';} ?> value="<?= $i ?>"><?= $langue ?></option>
                        <?php } ?>
                  </select>
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
                            <span><?= __("Modifier","Edit") ?></span>
                            <span class="sr-only"> user photo</span>
                          </label>
                          <input id="mobile-user-photo" name="photo" type="file" class="absolute w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="hidden relative rounded-full overflow-hidden lg:block">
                    <?php
                        if($USER->photo != NULL){ ?>
                        <img class="relative rounded-full w-40 h-40" src="/uploads/profil/<?= $USER->id ?>/<?= $USER->photo ?>" alt="">
                    <?php } else { ?>
                        <img class="relative rounded-full w-40 h-40" src="/assets/images/avatar.png" alt="">
                    <?php } ?>
                      
                    <label for="desktop-user-photo" class="absolute inset-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
                      <span><?= __("Modifier","Edit") ?></span>
                      <input type="file" id="desktop-user-photo" name="photo" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                    </label>
                  </div>
                </div>
              </div>

              <div class="mt-6 grid grid-cols-12 gap-6">
                <div class="col-span-12 sm:col-span-6">
                  <label for="completename" class="block text-sm font-medium text-gray-700"><?= __("Nom complet","Complete Name") ?></label>
                  <input type="text" name="completename" id="completename" value="<?= $USER->completename ?>" autocomplete="completename" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="phone" class="block text-sm font-medium text-gray-700"><?= __("Téléphone","Phone") ?></label>
                  <input type="text" name="phone" id="phone" value="<?= $USER->phone ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="business" class="block text-sm font-medium text-gray-700"><?= __("Entreprise","Business") ?></label>
                  <input type="text" name="business" id="business" value="<?= $USER->business ?>" autocomplete="business" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>
                
              </div>

              <div class="mt-12 grid grid-cols-12 gap-6">
                <div class="col-span-12">
                  <label for="address" class="block text-sm font-medium text-gray-700"><?= __("Adresse","Address") ?></label>
                  <input type="text" name="address" id="address" value="<?= $USER->address ?>" autocomplete="address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="city" class="block text-sm font-medium text-gray-700"><?= __("Ville","City") ?></label>
                  <input type="text" name="city" id="city" value="<?= $USER->city ?>" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="postalcode" class="block text-sm font-medium text-gray-700"><?= __("Code postal","Postal code") ?></label>
                  <input type="text" name="postalcode" id="postalcode" value="<?= $USER->postalcode ?>" autocomplete="postalcode" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="city" class="block text-sm font-medium text-gray-700"><?= __("Province","State") ?></label>
                  <select name="state" disabled id="state" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                    <option value="Quebec">Quebec</option>
                  </select>
                </div>

                <div class="col-span-12 sm:col-span-6">
                  <label for="postalcode" class="block text-sm font-medium text-gray-700"><?= __("Pays","Country") ?></label>
                  <select name="country" disabled id="country" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-sky-500 focus:border-sky-500 sm:text-sm">
                    <option value="Canada">Canada</option>
                  </select>
                </div>
                
              </div>
            </div>

            <!-- Privacy section -->
            <div class="pt-6 divide-y divide-gray-200">
              
              <div class="mt-4 py-4 px-4 flex justify-end sm:px-6">
                  <button type="submit" name="editprofil" class="ml-5 bg-indigo-900 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"><?= __("Sauvegarder les modifications","Save changes") ?></button>
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