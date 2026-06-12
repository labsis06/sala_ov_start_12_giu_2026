<?php
\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;

HTMLHelper::_('stylesheet', 'com_salaov/css/salaov.css', ['version' => 'auto', 'relative' => true]);
require_once __DIR__ . '/../helpers/calendar.php';
?>
<div class="salaov">
  <header class="salaov-page-header">
    <p class="salaov-kicker">Osservatorio Vesuviano</p>
    <h1>Disponibilita Sala OV</h1>
    <p>Consulta i giorni disponibili per la visita alla Sala di Monitoraggio. Le richieste inviate restano in attesa di approvazione.</p>
  </header>

  <?php echo salaovRenderAvailabilityCalendar($this->slots ?? [], $this->availability ?? [], ['months' => 6, 'dayRules' => $this->dayRules ?? []]); ?>

  <p class="salaov-main-cta"><a class="btn btn-primary" href="<?php echo Route::_('index.php?option=com_salaov&view=booking'); ?>">Richiedi prenotazione</a></p>
</div>
