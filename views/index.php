
<?php 
    $pageTitle = __("Votre CRM: Développement de logiciel CRM spécialisé pour votre profession","Your CRM: Development of specialized CRM software for your profession");
    include_once 'views/header.php'; ?>
	
<main class="lg:relative">
    <div class="mx-auto max-w-7xl w-full pt-16 pb-20 text-center lg:py-48 lg:text-left">
      <div class="px-4 lg:w-1/2 sm:px-8 xl:pr-16">
        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
          <span class="block xl:inline"><?= __("Nous concevons des outils pour","We design tools for") ?> </span>
          <span class="block text-indigo-900 xl:inline"><?= __("votre profession","your profession") ?></span>
        </h1>
        <p class="mt-3 max-w-md mx-auto text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl"><?= __("Notre mission est d'offrir des applications web performante conçue pour des professions précises et qui permettent à nos clients d'être efficace.","Our mission is to offer high-performance web applications designed for specific professions and which allow our customers to be efficient.") ?></p>
        <div class="mt-10 sm:flex sm:justify-center lg:justify-start">
          <div class="rounded-md shadow">
            <a href="/#nos-crm" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-900 hover:bg-indigo-800 md:py-4 md:text-lg md:px-10"> <?= __("Voir nos CRM","See our CRMs") ?></a>
          </div>
          <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
            <a href="<?= __("/contactez-nous/proposer-un-metier","/contact-us/suggest-a-profession") ?>" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-900 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10"> <?= __("Proposer un métier","Suggest a profession"); ?></a>
          </div>
        </div>
      </div>
    </div>
    <div class="relative w-full h-64 sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:h-full">
      <img class="absolute inset-0 w-full h-full object-cover rounded-l-3xl" src="/assets/images/home5.jpg" alt="">
    </div>
  </main>
</div>

<!-- This example requires Tailwind CSS v2.0+ -->
<div id="nos-crm" class="relative bg-white pt-16 pb-32 overflow-hidden">
  <div class="relative">
    <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
      <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-16 lg:max-w-none lg:mx-0 lg:px-0">
        <div>
          <div>
            <span class="h-12 w-12 rounded-md flex items-center justify-center bg-denturo">
              
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zm-7.518-.267A8.25 8.25 0 1120.25 10.5M8.288 14.212A5.25 5.25 0 1117.25 10.5" />
</svg>

            </span>
          </div>
          <div class="mt-6">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900"><?= __("CRM pour entreprise","CRM for business") ?></h2>
            <p class="mt-4 text-lg text-gray-500"><?= __("Notre logiciel CRM, simple d'utilisation est disponible pour les entreprises qui souhaitent simplifier la gestion de la relation avec leurs clients. Si votre entreprise nécessite votre propre système, nous offrons le développement de CRM pour votre profession avec des fonctionnalités qui lui sont destinées.","Our easy-to-use CRM software is available for businesses that want to simplify relationship management with their customers. If your business requires your own system, we offer CRM development for your profession with features aimed at it.") ?></p>
            <div class="mt-6">
              <a href="#" class="inline-flex px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-denturo"> <?= __("En développement","Coming soon"); ?> </a>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-12 sm:mt-16 lg:mt-0">
        <div class="pl-4 -mr-48 sm:pl-6 md:-mr-16 lg:px-0 lg:m-0 lg:relative lg:h-full">
          <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none" src="https://tailwindui.com/img/component-images/inbox-app-screenshot-1.jpg" alt="Inbox user interface">
        </div>
      </div>
    </div>
  </div>
  <div class="mt-24">
    <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
      <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-32 lg:max-w-none lg:mx-0 lg:px-0 lg:col-start-2">
        <div>
          <div>
            <span class="h-12 w-12 rounded-md flex items-center justify-center bg-impot">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
              </svg>
            </span>
          </div>
          <div class="mt-6">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900"><?= __("Votre préparateur d'impôt","Your tax preparer") ?></h2>
            <p class="mt-4 text-lg text-gray-500"><?= __("Notre application en ligne permet aux comptables et préparateur d'impôt d'offrir leur service efficacement à distance avec des outils technologiques intelligents. Gérez vos demandes de services facilement et offrez à vos clients un suivi efficace. Gagnez du temps sur plusieurs tâches répétitives..","Our online application allows accountants and tax preparers to offer their service efficiently remotely with smart technological tools. Manage your service requests easily and offer your customers an efficient follow-up. Save time on multiple repetitive tasks.") ?></p>
            <div class="mt-6">
              <a href="#" class="inline-flex px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-impot"> <?= __("En savoir plus","Learn more") ?></a>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-12 sm:mt-16 lg:mt-0 lg:col-start-1">
        <div class="pr-4 -ml-48 sm:pr-6 md:-ml-16 lg:px-0 lg:m-0 lg:relative lg:h-full">
          <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-auto lg:max-w-none" src="https://tailwindui.com/img/component-images/inbox-app-screenshot-2.jpg" alt="Customer profile user interface">
        </div>
      </div>
    </div>
  </div>
</div>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="bg-gray-50">
  <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-24 lg:px-8 lg:flex lg:items-center lg:justify-between">
    <h2 class="text-2xl font-extrabold tracking-600 text-gray-900 md:text-3xl w-4/5">
      <span class="block text-indigo-900"><?= __("Votre profession aurait besoin d'une application en ligne ?","Does your profession need an online application?"); ?> </span>
      <p class="text-xl font-normal mt-3"><?= __("Si vous pensez qu'il n'existe pas d'application ciblée et utile pour votre métier et ses particularités, prenez-le temps de nous le proposer. On ne sait jamais, vous pourriez être notre prochaine mission !","If you think that there is no targeted and useful application for your job and its particularities, take the time to suggest it to us. You never know, you could be our next mission!"); ?></p>
    </h2>
    <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
      <div class="inline-flex rounded-md shadow">
        <a href="<?= __("/contactez-nous/proposer-un-metier","/contact-us/suggest-a-profession"); ?>" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-900 hover:bg-indigo-900"> <?= __("Proposer un métier","Suggest a profession"); ?> </a>
      </div>
    </div>
  </div>
</div>


<?php include_once 'views/footer.php'; ?>
