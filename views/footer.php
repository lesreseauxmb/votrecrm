<section id="footer">
    <!-- This example requires Tailwind CSS v2.0+ -->
<footer class="bg-white">
  <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
    <nav class="-mx-5 -my-2 flex flex-wrap justify-center" aria-label="Footer">
      <div class="px-5 py-2">
        <a href="/" class="text-base text-gray-500 hover:text-gray-900"> <?= __("Accueil","Home") ?> </a>
      </div>

      <div class="px-5 py-2">
        <a href="<?= __("/contactez-nous/demonstration","/contact-us/demonstration") ?>" class="text-base text-gray-500 hover:text-gray-900"> <?= __("Démonstration","Demonstration"); ?> </a>
      </div>

      <div class="px-5 py-2">
        <a href="<?= __("/contactez-nous/proposer-un-metier","/contact-us/suggest-a-profession") ?>" class="text-base text-gray-500 hover:text-gray-900"> <?= __("Proposer un métier","Suggest a profession") ?> </a>
      </div>

      <div class="px-5 py-2">
        <a href="<?= __("/contactez-nous","/contact-us") ?>" class="text-base text-gray-500 hover:text-gray-900"> <?= __("Contactez-nous","Contact us") ?> </a>
      </div>
    </nav>
    <p class="mt-8 text-center text-base text-gray-400">Copyright &copy; <?= date('Y') ?> · Votre CRM - <?= __("Tous droits réservés","All rights reserved") ?>.</p>
  </div>
</footer>

</section>
</body>
</html>