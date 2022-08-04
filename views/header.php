<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Document</title>
		<link rel="stylesheet" href="/assets/css/tailwind.css" />
        <link rel="shortcut icon" href="/assets/images/logo-icon.png" type="image/x-icon">
	</head>
	<body>
<!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative bg-white">
  <div class="absolute inset-0 shadow z-30 pointer-events-none" aria-hidden="true"></div>
  <div class="relative z-20">
    <div class="max-w-7xl mx-auto flex justify-between items-center px-4 py-5 sm:px-6 sm:py-4 lg:px-8 md:justify-start md:space-x-10">
      <div>
        <a href="#" class="flex">
          <span class="sr-only">Votre CRM</span>
          <img class="h-8 w-auto sm:h-10" src="/assets/images/logo-icon.png" alt="">
        </a>
      </div>
      <div class="-mr-2 -my-2 md:hidden">
        <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo" aria-expanded="false">
          <span class="sr-only">Open menu</span>
          <!-- Heroicon name: outline/menu -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      <div class="hidden md:flex-1 md:flex md:items-center md:justify-between">
        <nav class="flex space-x-10">
          <a href="/" class="text-base font-medium text-gray-800 hover:text-gray-600"> Accueil </a>
          <a href="/#nos-crm" class="text-base font-medium text-gray-800 hover:text-gray-600"> Nos CRM </a>
          <!--<div>
             Item active: "text-gray-900", Item inactive: "text-gray-500"
            <button type="button" class="text-gray-800 hover:text-gray-600 group bg-white rounded-md inline-flex items-center text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo" aria-expanded="false">
              <span>Nos CRM</span>
              <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </button>
            -->

            <!--
              'Solutions' flyout menu, show/hide based on flyout menu state.

              Entering: "transition ease-out duration-200"
                From: "opacity-0 -translate-y-1"
                To: "opacity-100 translate-y-0"
              Leaving: "transition ease-in duration-150"
                From: "opacity-100 translate-y-0"
                To: "opacity-0 -translate-y-1"
            -->
           <!-- <div class="z-50 hidden md:block absolute top-full inset-x-0 transform shadow-lg bg-white">
              <div class="max-w-7xl mx-auto grid gap-y-6 px-4 py-6 sm:grid-cols-2 sm:gap-8 sm:px-6 sm:py-8 lg:grid-cols-4 lg:px-8 lg:py-12 xl:py-16">
                <a href="#" class="-m-3 p-3 flex flex-col justify-between rounded-lg hover:bg-gray-50">
                  <div class="flex md:h-full lg:flex-col">
                    <div class="flex-shrink-0">
                      <span class="inline-flex items-center justify-center h-10 w-10 rounded-md bg-indigo-800 text-white sm:h-12 sm:w-12">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                      </span>
                    </div>
                    <div class="ml-4 md:flex-1 md:flex md:flex-col md:justify-between lg:ml-0 lg:mt-4">
                      <div>
                        <p class="text-base font-medium text-gray-900">Préparateur d'impôt</p>
                        <p class="mt-1 text-sm text-gray-500">Gérez vos demandes de services efficacement et offrez à vos clients un suivi efficace. Gagnez du temps sur plusieurs tâches répétitives.</p>
                      </div>
                      <p class="mt-2 text-sm font-medium text-indigo-800 lg:mt-4">En savoir plus <span aria-hidden="true">&rarr;</span></p>
                    </div>
                  </div>
                </a>

                <a href="#" class="-m-3 p-3 flex flex-col justify-between rounded-lg hover:bg-gray-50">
                  <div class="flex md:h-full lg:flex-col">
                    <div class="flex-shrink-0">
                      <span class="inline-flex items-center justify-center h-10 w-10 rounded-md bg-indigo-800 text-white sm:h-12 sm:w-12">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                        </svg>
                      </span>
                    </div>
                    <div class="ml-4 md:flex-1 md:flex md:flex-col md:justify-between lg:ml-0 lg:mt-4">
                      <div>
                        <p class="text-base font-medium text-gray-900">Denturologiste</p>
                        <p class="mt-1 text-sm text-gray-500">Offrez-vous un outil de gestion de clientèle simple et efficace ainsi qu'un outil de travail fabriqué spécialement pour votre profession.</p>
                      </div>
                      <p class="mt-2 text-sm font-medium text-indigo-800 lg:mt-4">En savoir plus <span aria-hidden="true">&rarr;</span></p>
                    </div>
                  </div>
                </a>
              </div>
              <div class="bg-gray-50">
                <div class="max-w-7xl mx-auto space-y-6 px-4 py-5 sm:flex sm:space-y-0 sm:space-x-10 sm:px-6 lg:px-8">
                  <div class="flow-root">
                    <a href="#" class="-m-3 p-3 flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-100">
                      <svg class="flex-shrink-0 h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                      </svg>
                      <span class="ml-3">Communiquer avec un représentant</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <a href="/contactez-nous/demonstration" class="text-base font-medium text-gray-800 hover:text-gray-600"> Démonstration </a>
          <a href="/contactez-nous/proposer-un-metier" class="text-base font-medium text-gray-800 hover:text-gray-600"> Proposer un métier </a>
          <a href="/contactez-nous" class="text-base font-medium text-gray-800 hover:text-gray-600"> Contactez-nous </a>
          
        </nav>
        <div class="flex items-center md:ml-12">
          <a href="#" class="text-base font-medium text-gray-800 hover:text-gray-600"> English </a>
          <a href="/espace-client" class="ml-8 inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-800"> Espace client </a>
        </div>
      </div>
    </div>
  </div>

  <!--
    Mobile menu, show/hide based on mobile menu state.

    Entering: "duration-200 ease-out"
      From: "opacity-0 scale-95"
      To: "opacity-100 scale-100"
    Leaving: "duration-100 ease-in"
      From: "opacity-100 scale-100"
      To: "opacity-0 scale-95"
  -->
  <div class="absolute z-30 top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
    <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
      <div class="pt-5 pb-6 px-5 sm:pb-8">
        <div class="flex items-center justify-between">
          <div>
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-primary.svg" alt="Workflow">
          </div>
          <div class="-mr-2">
            <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo">
              <span class="sr-only">Close menu</span>
              <!-- Heroicon name: outline/x -->
              <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
        <div class="mt-6 sm:mt-8">
          <nav>
            <div class="grid gap-7 sm:grid-cols-2 sm:gap-y-8 sm:gap-x-4">
              <a href="#" class="-m-3 flex items-center p-3 rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-primary text-white sm:h-12 sm:w-12">
                  <!-- Heroicon name: outline/chart-bar -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                  </svg>
                </div>
                <div class="ml-4 text-base font-medium text-gray-900">Analytics</div>
              </a>

              <a href="#" class="-m-3 flex items-center p-3 rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-primary text-white sm:h-12 sm:w-12">
                  <!-- Heroicon name: outline/cursor-click -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                  </svg>
                </div>
                <div class="ml-4 text-base font-medium text-gray-900">Engagement</div>
              </a>

              <a href="#" class="-m-3 flex items-center p-3 rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-primary text-white sm:h-12 sm:w-12">
                  <!-- Heroicon name: outline/shield-check -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                  </svg>
                </div>
                <div class="ml-4 text-base font-medium text-gray-900">Security</div>
              </a>

              <a href="#" class="-m-3 flex items-center p-3 rounded-lg hover:bg-gray-50">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-primary text-white sm:h-12 sm:w-12">
                  <!-- Heroicon name: outline/view-grid -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                  </svg>
                </div>
                <div class="ml-4 text-base font-medium text-gray-900">Integrations</div>
              </a>
            </div>
            <div class="mt-8 text-base">
              <a href="#" class="font-medium text-primary hover:text-primary"> View all products <span aria-hidden="true">&rarr;</span></a>
            </div>
          </nav>
        </div>
      </div>
      <div class="py-6 px-5">
        <div class="grid grid-cols-2 gap-4">
          <a href="#" class="rounded-md text-base font-medium text-gray-900 hover:text-gray-700"> Pricing </a>

          <a href="#" class="rounded-md text-base font-medium text-gray-900 hover:text-gray-700"> Docs </a>

          <a href="#" class="rounded-md text-base font-medium text-gray-900 hover:text-gray-700"> Company </a>

          <a href="#" class="rounded-md text-base font-medium text-gray-900 hover:text-gray-700"> Resources </a>

          <a href="#" class="rounded-md text-base font-medium text-gray-900 hover:text-gray-700"> Blog </a>

          <a href="#" class="rounded-md text-base font-medium text-gray-900 hover:text-gray-700"> Contact Sales </a>
        </div>
        <div class="mt-6">
          <a href="#" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-primary hover:bg-indigo-700"> Sign up </a>
          <p class="mt-6 text-center text-base font-medium text-gray-500">
            Existing customer?
            <a href="#" class="text-primary hover:text-primary"> Sign in </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
