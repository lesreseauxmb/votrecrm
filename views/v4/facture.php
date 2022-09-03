<?php

include_once LIBS_PATH.'/fpdf182/fpdf.php';
include_once LIBS_PATH.'/konekt/pdf-invoice/src/InvoicePrinter.php';
use Konekt\PdfInvoice\InvoicePrinter;

$invoice = Invoice::Get($id);
if($invoice == NULL){
    header('location: /v4/mes-factures');
    exit;
}

if($id && $invoice->user_id == $USER->id || $USER->email == "admin@votrecrm.com"){
    $user = User::Get($invoice->user_id);
 
    $invoiceGenerated = new InvoicePrinter('Letter', '$', 'fr');
    /* Header Settings */
    $invoiceGenerated->setLogo('assets/images/logo-icon.png',75,100);
    $invoiceGenerated->setColor('#312E81;');
    $invoiceGenerated->setType('Facture');
    $invoiceGenerated->setReference("CRM-$invoice->id");
    $invoiceGenerated->setDate($invoice->creation_date);
    $invoiceGenerated->setDue($invoice->due_date);
    
    $invoiceGenerated->setFrom([utf8_decode('Les Réseaux MB'), 'Les Réseaux MB', '925 Boul Cure Poirier E', 'Longueuil, Quebec,', 'J4J 2J8, Canada']);
    $invoiceGenerated->setTo([$user->business, $user->completename." ".$user->address, "$user->city, $user->state,", "$user->postalcode, $user->country"]);
    /* Adding Items in table */
    foreach(json_decode($invoice->items) as $item){
        $invoiceGenerated->addItem("$item->title",'',$item->qty,false,$item->price,false,$item->qty*$item->price);
    }
    

    /* Add totals */
    $invoiceGenerated->addTotal('Sous-total', $invoice->subtotal);
    $invoiceGenerated->addTotal('TPS 5%', $invoice->tps);
    $invoiceGenerated->addTotal('TVQ 9.975%', $invoice->tvq);
    $invoiceGenerated->addTotal('Total', $invoice->total, true);
    /* Set badge */
    $invoiceGenerated->addBadge('Paiement reçu');
    /* Add title */
    $invoiceGenerated->addTitle('Information importante');
    /* Add Paragraph */
    $invoiceGenerated->addParagraph('Merci pour votre commande. À bientôt!');
    /* Set footer note */
    $invoiceGenerated->setFooternote(utf8_decode('Votre CRM'));
    /* Render */
    $invoiceGenerated->render('invoice.pdf', 'I'); /* I => Display on browser, D => Force Download, F => local path save, S => return document path */
} else {
    header('location: /v4/mes-factures');
    exit;
}
  