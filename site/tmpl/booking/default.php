<?php
\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

HTMLHelper::_('stylesheet', 'com_salaov/css/salaov.css', ['version' => 'auto', 'relative' => true]);
require_once __DIR__ . '/../helpers/calendar.php';

$user = Factory::getApplication()->getIdentity();
$days = [1 => 'Lunedi', 2 => 'Martedi', 3 => 'Mercoledi', 4 => 'Giovedi', 5 => 'Venerdi', 6 => 'Sabato', 7 => 'Domenica'];
$returnUrl = base64_encode(Uri::getInstance()->toString());
?>
<div class="salaov">
  <header class="salaov-page-header">
    <p class="salaov-kicker">Osservatorio Vesuviano</p>
    <h1>Prenotazione visita Sala di Monitoraggio OV</h1>
    <p>Seleziona un giorno disponibile dal calendario, scegli la fascia oraria e invia la richiesta. La prenotazione resta in attesa di approvazione.</p>
  </header>

  <?php echo salaovRenderAvailabilityCalendar($this->slots ?? [], $this->availability ?? [], ['months' => 6, 'selectable' => true, 'inputSelector' => '#salaov_visit_date', 'dayRules' => $this->dayRules ?? [], 'daySlots' => $this->daySlots ?? []]); ?>

  <?php if ($user->guest): ?>
    <div class="alert alert-warning salaov-alert">Per inviare una richiesta di prenotazione devi accedere con un utente Joomla registrato.</div>
  <?php else: ?>
    <section class="salaov-form-card">
      <h2>Richiesta di prenotazione</h2>
      <form method="post" action="<?php echo Route::_('index.php?option=com_salaov&task=booking.submit'); ?>" class="needs-validation" novalidate>
        <div class="row g-4">
          <div class="col-12"><h3 class="h5 border-bottom pb-2">Dati visita</h3></div>
          <div class="col-md-6"><label for="salaov_visit_date" class="form-label">Data visita</label><input id="salaov_visit_date" class="form-control" type="date" name="visit_date" required></div>
          <div class="col-md-6"><label class="form-label">Fascia oraria</label><select id="salaov_slot_id" class="form-select" name="slot_id" required>
            <?php foreach ($this->slots as $s): ?><option value="w:<?php echo (int) $s->id; ?>" data-weekday="<?php echo (int) $s->weekday; ?>"><?php echo $days[(int) $s->weekday] . ' - ' . htmlspecialchars($s->title, ENT_QUOTES, 'UTF-8') . ' ' . substr($s->start_time, 0, 5) . '-' . substr($s->end_time, 0, 5) . ' (max ' . (int) $s->capacity . ')'; ?></option><?php endforeach; ?>
            <?php foreach (($this->daySlots ?? []) as $s): ?><option value="d:<?php echo (int) $s->id; ?>" data-date="<?php echo htmlspecialchars($s->visit_date, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($s->visit_date . ' - ' . $s->title, ENT_QUOTES, 'UTF-8') . ' ' . substr($s->start_time, 0, 5) . '-' . substr($s->end_time, 0, 5) . ' (max ' . (int) $s->capacity . ')'; ?></option><?php endforeach; ?>
          </select><div class="form-text">Le fasce vengono filtrate automaticamente dopo la scelta della data.</div></div>

          <div class="col-12 mt-4"><h3 class="h5 border-bottom pb-2">Referente</h3></div>
          <div class="col-md-6"><label class="form-label">Nome</label><input class="form-control" name="first_name" required></div>
          <div class="col-md-6"><label class="form-label">Cognome</label><input class="form-control" name="last_name" required></div>
          <div class="col-md-6"><label class="form-label">Email</label><input class="form-control" type="email" name="email" value="<?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?>" required></div>
          <div class="col-md-6"><label class="form-label">Telefono</label><input class="form-control" name="phone" required></div>

          <div class="col-12 mt-4"><h3 class="h5 border-bottom pb-2">Gruppo visita</h3></div>
          <div class="col-md-8"><label class="form-label">Ente/Scuola</label><input class="form-control" name="organization" required></div>
          <div class="col-md-4"><label class="form-label">Numero visitatori</label><input class="form-control" type="number" name="visitors" min="1" value="1" required></div>
          <div class="col-12"><label class="form-label">Note</label><textarea class="form-control" name="notes" rows="4" placeholder="Indica eventuali esigenze o informazioni utili"></textarea></div>
        </div>
        <input type="hidden" name="return" value="<?php echo htmlspecialchars($returnUrl, ENT_QUOTES, 'UTF-8'); ?>">
        <?php echo HTMLHelper::_('form.token'); ?>
        <div class="d-flex justify-content-end mt-4"><button type="submit" class="btn btn-primary btn-lg">Invia richiesta</button></div>
      </form>
    </section>
  <?php endif; ?>
</div>
<script>
(function(){
  var dateInput=document.getElementById('salaov_visit_date');
  var slotSelect=document.getElementById('salaov_slot_id');
  if(!dateInput || !slotSelect) return;
  function weekday(iso){ var d=new Date(iso+'T00:00:00'); return d.getDay()===0?7:d.getDay(); }
  function filterSlots(){
    var date=dateInput.value, wd=date?weekday(date):0, hasSpecific=false, first=null;
    Array.prototype.forEach.call(slotSelect.options,function(o){ if(o.dataset.date===date) hasSpecific=true; });
    Array.prototype.forEach.call(slotSelect.options,function(o){
      var show = hasSpecific ? (o.dataset.date===date) : (!o.dataset.date && String(o.dataset.weekday)===String(wd));
      o.hidden=!show; o.disabled=!show; if(show && !first) first=o;
    });
    if(first) slotSelect.value=first.value;
  }
  dateInput.addEventListener('change',filterSlots); filterSlots();
})();
</script>
