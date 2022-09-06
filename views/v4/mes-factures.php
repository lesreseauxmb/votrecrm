<?php
    $pageTitle = __("Mes factures | Votre CRM","My invoices | Votre CRM");
    
    include_once 'views/v4/header.php'; ?>
    <header class="bg-indigo-900 shadow-sm">
        <div class="mx-auto max-w-7xl py-4 px-4 sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold leading-6 text-white"><?= __("Mes factures","My invoices") ?></h1>
        </div>
    </header>
    <main>
        <div class="mx-auto py-6 sm:px-6 lg:px-8">
            <!-- This example requires Tailwind CSS v2.0+ -->
            <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6 md:pl-0">#</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Items</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"><?= __("Sous-total","Subtotal") ?></th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">TPS</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">TVQ</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Total</th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"><?= __("Date de création","Creation date") ?></th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"><?= __("Date d'échéance","Due date") ?></th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"><?= __("Date de paiement","Payment date") ?></th>
                            <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900"><?= __("Méthode de paiement","Payment method") ?></th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 md:pr-0">
                                <span class="sr-only">Appliquer un paiement</span>
                            </th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6 md:pr-0">
                                <span class="sr-only">Consulter la facture</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                            foreach(Invoice::FetchAll("WHERE user_id = ?",[$USER->id]) as $invoice){
                                $client = User::Get($invoice->user_id); ?>
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 md:pl-0"><?= $invoice->id ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
                                        <?php foreach(json_decode($invoice->items) as $item){
                                            echo $item->title." - ";
                                        } ?>
                                    </td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->subtotal ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->tps ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->tvq ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->total ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->creation_date ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->due_date ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->payment_date ?></td>
                                    <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500"><?= $invoice->payment_method ?></td>
                                    <?php
                                        if($USER->type == "admin"){ ?>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                                                <a href="/admin/gestion-des-clients/connexion/<?= $user->id ?>" class="text-indigo-900">Appliquer un paiement</a>
                                            </td>
                                    <?php } ?>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 md:pr-0">
                                        <a href="/v4/facture/<?= $invoice->id ?>" class="text-indigo-900">Consulter la facture</a>
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



<?php include_once 'views/v4/footer.php'; ?>