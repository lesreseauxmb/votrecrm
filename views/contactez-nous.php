<?php 
    $pageTitle = __("Contactez-nous | Votre CRM","Contact us | Your CRM");

    if(!empty($_POST)){
        $newContact = (new Contact([
          "crm_id" => $_POST['crm'],
          "subject" => $_POST['subject'],
          "completename" => $_POST['completename'],
          "email" => $_POST['email'],
          "phone" => $_POST['phone'],
          "message" => $_POST['message'],
          "status" => "En attente",
        ]))->Save();

        if($newContact->id){
            header('location: /contactez-nous');
            exit;
        } else {
            $error = "Une erreur est survenue";
        } 
    }
    include_once 'header.php' ?>

<section id="contactez-nous">
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
<div class="relative bg-white">
  <div class="absolute inset-0">
    <div class="absolute inset-y-0 left-0 w-1/2 bg-indigo-900"></div>
  </div>
  <div class="relative max-w-7xl mx-auto lg:grid lg:grid-cols-5">
    <div class="bg-indigo-900 py-16 px-4 sm:px-6 lg:col-span-2 lg:px-8 lg:py-24 xl:pr-12">
      <div class="max-w-lg mx-auto">
        <h2 class="text-2xl font-extrabold tracking-tight text-white sm:text-3xl"><?= __("Contactez-nous","Contact us") ?></h2>
        <p class="mt-3 text-lg leading-6 text-gray-500"></p>
        <dl class="mt-8 text-base text-gray-500">
          <!-- <div>
            <dt class="sr-only">Postal address</dt>
            <dd>
              <p>742 Evergreen Terrace</p>
              <p>Springfield, OR 12345</p>
            </dd>
          </div> -->
          <div class="mt-6 text-white">
            <dt class="sr-only"><?= __("Numéro de téléphone","Phone number") ?></dt>
            <dd class="flex">
              <!-- Heroicon name: outline/phone -->
              <svg class="flex-shrink-0 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
              <span class="ml-3">1 (855) 514-4678</span>
            </dd>
          </div>
          <div class="mt-3">
            <dt class="sr-only">E-mail</dt>
            <dd class="flex">
              <!-- Heroicon name: outline/mail -->
              <svg class="flex-shrink-0 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              <span class="ml-3 text-white"> <?= __("Utilisez le formulaire prévu sur cette page.","Use the form provided on this page.") ?><br> <?= __("Réponse rapide","Quick response"); ?>.</span>
            </dd>
          </div>
        </dl>
        <!-- Afficher des images de l'administration et du processus de demande selon le choix du CRM en haut -->
      </div>
    </div>
    <div class="bg-white py-16 px-4 sm:px-6 lg:col-span-3 lg:py-24 lg:px-8 xl:pl-12">
      <div class="max-w-lg mx-auto lg:max-w-none">
        <form action="#" method="POST" class="grid grid-cols-1 gap-y-6">
          <div>
            <label for="crm" class="block text-sm font-medium text-gray-700"><?= __("Choisissez le CRM","Choose CRM") ?></label>
            <select id="crm" name="crm" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <?php
                    foreach(Crm::FetchAll() as $crm){ ?>
                        <option value="<?= $crm->id ?>"><?= $crm->name ?></option>
                <?php } ?>
            </select>
          </div>
          <div>
            <label for="subject" class="block text-sm font-medium text-gray-700"><?= __("Choisissez le sujet","Choose the subject") ?></label>
            <select id="subject" name="subject" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
              <?php
                if($_SESSION['lang'] == "fr"){
                    $tableau = [
                      "general" => "Général",
                      "service" => "Service à la clientèle",
                      "support" => "Support technique",
                      "demonstration" => "Démonstration",
                      "proposer-un-metier" => "Proposer un métier"
                    ];
                } else {
                    $tableau = [
                        "general" => "General",
                        "service" => "Customer Service",
                        "support" => "Technical Support",
                        "demonstration" => "Demonstration",
                        "suggest-a-profession" => "Suggest a profession",
                    ];
                }
                foreach($tableau as $i => $option){ ?>
                  <option <?php if($i == @$sujet){echo 'selected';} ?> value="<?= $i ?>"><?= $option ?></option>
              <?php } ?>
            </select>
          </div>
          <label for=""><?= __("Renseignez vos informations","Fill in your information") ?></label>
          <div>
            <label for="full-name" class="sr-only"><?= __("Nom complet","Complete Name") ?></label>
            <input type="text" name="completename" id="full-name" autocomplete="name" class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-red-500 focus:border-red-500 border-gray-300 rounded-md" placeholder="<?= __("Nom complet","Complete Name") ?>">
          </div>
          <div>
            <label for="email" class="sr-only">E-mail</label>
            <input id="email" name="email" type="email" autocomplete="email" class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-red-500 focus:border-red-500 border-gray-300 rounded-md" placeholder="E-mail">
          </div>
          <div>
            <label for="phone" class="sr-only"><?= __("Téléphone","Phone") ?></label>
            <input type="text" name="phone" id="phone" autocomplete="tel" class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-red-500 focus:border-red-500 border-gray-300 rounded-md" placeholder="<?= __("Téléphone","Phone") ?>">
          </div>
          <label for=""><?= __("Avez-vous un message pour nous ?","Do you have a message for us ?") ?></label>
          <div>
            <label for="message" class="sr-only">Message</label>
            <textarea id="message" name="message" rows="4" class="block w-full shadow-sm py-3 px-4 placeholder-gray-500 focus:ring-red-500 focus:border-red-500 border border-gray-300 rounded-md" placeholder="Message"></textarea>
          </div>
          <div>
            <button type="submit" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-900 hover:bg-opacity-95 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><?= __("Envoyer ma demande","Send my request") ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</section>



<?php include_once 'footer.php' ?>
