<?php 
    $pageTitle = "Tableau de bord | Votre CRM"; 
    include_once 'views/v4/header.php'; ?>
    <header class="bg-indigo-900 shadow-sm">
        <div class="mx-auto max-w-7xl py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold leading-6 text-white">Tableau de bord</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <?php
                if($USER->type == "admin"){ ?>
                    <div class="mt-4">
                    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
                            <dt>
                                <div class="absolute rounded-md bg-indigo-900 p-3">
                                <!-- Heroicon name: outline/users -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>
                                </div>
                                <p class="ml-16 truncate text-sm font-medium text-gray-500">Nombre de clients</p>
                            </dt>
                            <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                <p class="text-2xl font-semibold text-gray-900"><?= count(User::FetchAll("WHERE type = ?",["client"])) ?></p>
                                
                                <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="/admin/gestion-des-clients" class="font-medium text-indigo-900"> Gestion des clients</a>
                                </div>
                                </div>
                            </dd>
                        </div>

                        <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
                            <dt>
                                <div class="absolute rounded-md bg-indigo-900 p-3">
                                <!-- Heroicon name: outline/users -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                                </svg>
                                </div>
                                <p class="ml-16 truncate text-sm font-medium text-gray-500">Licence valide</p>
                            </dt>
                            <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                <p class="text-2xl font-semibold text-gray-900"><?= count(Licence::FetchAll("WHERE status = ?",["active"])) ?></p>
                                
                                <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="/admin/gestion-des-licences" class="font-medium text-indigo-900"> Gestion des licences</a>
                                </div>
                                </div>
                            </dd>
                        </div>

                        <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
                            <dt>
                                <div class="absolute rounded-md bg-indigo-900 p-3">
                                <!-- Heroicon name: outline/users -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                                </svg>

                                </div>
                                <p class="ml-16 truncate text-sm font-medium text-gray-500">Licence inactive</p>
                            </dt>
                            <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                <p class="text-2xl font-semibold text-gray-900"><?= count(Licence::FetchAll("WHERE status = ?",["inactive"])) ?></p>
                                
                                <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="/admin/gestion-des-licences" class="font-medium text-indigo-900"> Gestion des licences</a>
                                </div>
                                </div>
                            </dd>
                        </div>

                        <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
                            <dt>
                                <div class="absolute rounded-md bg-indigo-900 p-3">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                </div>
                                <p class="ml-16 truncate text-sm font-medium text-gray-500">Revenu annuel</p>
                            </dt>
                            <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                <p class="text-2xl font-semibold text-gray-900"><?= count(Invoice::FetchAll("WHERE status = ?",["payé"])) ?></p>
                                
                                <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="/admin/gestion-des-factures" class="font-medium text-indigo-900"> Gestion des factures</a>
                                </div>
                                </div>
                            </dd>
                        </div>

                        <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
                            <dt>
                                <div class="absolute rounded-md bg-indigo-900 p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                </svg>

                                </div>
                                <p class="ml-16 truncate text-sm font-medium text-gray-500">Suggestion non répondu</p>
                            </dt>
                            <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                <p class="text-2xl font-semibold text-gray-900"><?= count(Suggestion::FetchAll("WHERE status = ?",["En attente"])) ?></p>
                                
                                <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="/admin/gestion-des-suggestions" class="font-medium text-indigo-900"> Gestion des suggestions</a>
                                </div>
                                </div>
                            </dd>
                        </div>

                        <div class="relative overflow-hidden rounded-lg bg-white px-4 pt-5 pb-12 shadow sm:px-6 sm:pt-6">
                            <dt>
                                <div class="absolute rounded-md bg-indigo-900 p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
                                </svg>

                                </div>
                                <p class="ml-16 truncate text-sm font-medium text-gray-500">Liste des prospects</p>
                            </dt>
                            <dd class="ml-16 flex items-baseline pb-6 sm:pb-7">
                                <p class="text-2xl font-semibold text-gray-900"><?= count(Suggestion::FetchAll("WHERE status = ?",["En attente"])) ?></p>
                                
                                <div class="absolute inset-x-0 bottom-0 bg-gray-50 px-4 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="/admin/gestion-des-prospects" class="font-medium text-indigo-900"> Gestion des prospects</a>
                                </div>
                                </div>
                            </dd>
                        </div>

                        
                    </dl>
                    </div>

            <?php } ?>

        </div>
    </main>
</div>

<?php include_once 'views/v4/footer.php'; ?>