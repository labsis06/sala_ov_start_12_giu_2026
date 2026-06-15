<?php
\defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;


require_once __DIR__ . '/../helpers/calendar.php';
?>
<div class="salaov">
  <header class="salaov-page-header">
    
    <p>Consulta i giorni disponibili per la visita alla Sala di Monitoraggio. Le richieste inviate restano in attesa di approvazione.</p>
  </header>

  <?php echo salaovRenderAvailabilityCalendar($this->slots ?? [], $this->availability ?? [], ['months' => 6, 'dayRules' => $this->dayRules ?? [], 'daySlots' => $this->daySlots ?? []]); ?>

  <p class="salaov-main-cta"><a class="btn btn-primary" href="<?php echo Route::_('index.php?option=com_salaov&view=booking'); ?>">Richiedi prenotazione</a></p>
</div>
