<?php
\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

HTMLHelper::_('stylesheet', 'com_salaov/css/salaov.css', ['version' => 'auto', 'relative' => true]);
require_once __DIR__ . '/../helpers/calendar.php';

$user = Factory::getApplication()->getIdentity();
$canApproveDirectly = $user && !$user->guest && (
    $user->authorise('core.admin') ||
    $user->authorise('core.manage', 'com_salaov')
);
$days = [1 => 'Lunedi', 2 => 'Martedi', 3 => 'Mercoledi', 4 => 'Giovedi', 5 => 'Venerdi', 6 => 'Sabato', 7 => 'Domenica'];
$returnUrl = base64_encode(Uri::getInstance()->toString());
?>
<div class="salaov">
  <header class="salaov-page-header">
    <h1>Prenotazione visita Sala di Monitoraggio OV</h1>
    <p>Seleziona un giorno disponibile dal calendario, scegli la fascia oraria e invia la richiesta. La prenotazione resta in attesa di approvazione.</p>
  </header>

  <?php if ($user->guest): ?>
    <div class="alert alert-warning salaov-alert mb-4">Per inviare una richiesta di prenotazione devi accedere con un utente Joomla registrato.</div>
  <?php endif; ?>

  <?php echo salaovRenderAvailabilityCalendar($this->slots ?? [], $this->availability ?? [], ['months' => 6, 'selectable' => true, 'inputSelector' => '#salaov_visit_date', 'dayRules' => $this->dayRules ?? [], 'daySlots' => $this->daySlots ?? []]); ?>

  <?php if (!$user->guest): ?>
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
          <div class="col-md-4">
            <label class="form-label">Lingua visita</label>
            <select class="form-select" name="language_id" required>
            <option value="">Seleziona lingua</option>
               <?php foreach (($this->languages ?? []) as $language): ?>
                   <option value="<?php echo (int) $language->id; ?>">
              <?php echo htmlspecialchars($language->title, ENT_QUOTES, 'UTF-8'); ?>
                   </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="col-md-8">
    <label class="form-label">Livello visita</label>
    <select class="form-select" name="visit_level_id" required>
      <div class="salaov-level-preview mt-3">
    <?php foreach (($this->visitLevels ?? []) as $level): ?>
        <?php
        $icon = $level->icon ?: 'tier_other_neutral.svg';
        ?>
        <div class="salaov-level-preview-item">
            <img
                src="<?php echo Uri::root(true); ?>/media/com_salaov/icons/visit-levels/<?php echo htmlspecialchars($icon, ENT_QUOTES, 'UTF-8'); ?>"
                alt=""
                class="salaov-level-preview-icon"
            >
            <span><?php echo htmlspecialchars($level->title, ENT_QUOTES, 'UTF-8'); ?></span>
        </div>
    <?php endforeach; ?>
</div>
        <option value="">Seleziona livello visita</option>
        <?php foreach (($this->visitLevels ?? []) as $level): ?>
            <option value="<?php echo (int) $level->id; ?>">
                <?php echo htmlspecialchars($level->title, ENT_QUOTES, 'UTF-8'); ?>
            </option>
        <?php endforeach; ?>
    </select>
    <div class="form-text">
        Indica il livello della visita per aiutare l'organizzazione e l'assegnazione del personale.
    </div>
</div>
          </div>
          <div class="col-12"><label class="form-label">Note</label><textarea class="form-control" name="notes" rows="4" placeholder="Indica eventuali esigenze o informazioni utili"></textarea></div>
        </div>
        <?php if ($canApproveDirectly): ?>
    <div class="col-12">
        <div class="alert alert-info mb-0">
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="salaov_approve_now"
                    name="approve_now"
                    value="1"
                >
                <label class="form-check-label fw-bold" for="salaov_approve_now">
                    Approva direttamente questa richiesta
                </label>
            </div>
            <div class="small mt-1">
                Opzione visibile solo agli utenti con permessi amministrativi. Se selezionata, la prenotazione verrà salvata direttamente come approvata.
            </div>
        </div>
    </div>
<?php endif; ?>
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
