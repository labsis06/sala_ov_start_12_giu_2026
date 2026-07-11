<?php

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;$staff = $this->staff ?? [];

$slotsByDate = [];

foreach (($this->daySlots ?? []) as $s) {
    $slotsByDate[$s->visit_date][] = $s;
}

$staffByDate = [];

foreach (($this->dayStaff ?? []) as $s) {
    $staffByDate[$s->visit_date][] = $s;
}

$weekdayLabels = [
    1 => 'Lunedì',
    2 => 'Martedì',
    3 => 'Mercoledì',
    4 => 'Giovedì',
    5 => 'Venerdì',
    6 => 'Sabato',
    7 => 'Domenica',
];
?>


<h1>Gestione calendario disponibilita Sala OV</h1>

<div class="d-flex justify-content-end mb-3">
    <a class="btn btn-outline-secondary"
       href="<?php echo Route::_('index.php?option=com_salaov'); ?>">
        Torna alla dashboard
    </a>
 
    </div>        
<div class="alert alert-info">Da questa sezione puoi applicare disponibilita, fasce orarie e personale a un intervallo di date oppure personalizzare un singolo giorno cliccandolo nel calendario.</div>

<div class="row g-4">
 <div class="col-lg-7">
  <form method="post" action="index.php?option=com_salaov&task=availability.saveRange" class="card card-body mb-4">
   <h2 class="h4">Applicazione massiva</h2>
   <div class="row g-3">
    <div class="col-md-4"><label class="form-label">Dal</label><input class="form-control" type="date" name="date_from" id="salaov_from" required></div>
    <div class="col-md-4"><label class="form-label">Al</label><input class="form-control" type="date" name="date_to" id="salaov_to" required></div>
    <div class="col-md-2"><label class="form-label">Disponibile</label><select class="form-select" name="available"><option value="1">Si</option><option value="0">No</option></select></div>
    <div class="col-md-2"><label class="form-label">Capienza giorno</label><input class="form-control" type="number" name="capacity" min="0" value="20"></div>
    <div class="col-12"><label class="form-label d-block">Giorni della settimana</label><?php foreach($weekdayLabels as $n=>$l): ?><label class="form-check form-check-inline"><input class="form-check-input" type="checkbox" name="weekdays[]" value="<?php echo $n; ?>" <?php echo $n<=5?'checked':''; ?>> <?php echo $l; ?></label><?php endforeach; ?></div>
    <div class="col-12"><label class="form-label">Fasce orarie da applicare</label><textarea class="form-control" name="slots_text" rows="4">Mattina|09:30|11:00|20
Pomeriggio|14:30|16:00|20</textarea><div class="form-text">Una fascia per riga: Nome|HH:MM|HH:MM|Capienza</div><label class="form-check mt-2"><input class="form-check-input" type="checkbox" name="replace_slots" value="1" checked> Sostituisci le fasce dei giorni selezionati</label></div>
    <div class="col-12"><label class="form-label">Personale da assegnare</label><select class="form-select" name="staff_ids[]" multiple size="5"><?php foreach($staff as $p): ?><option value="<?php echo (int)$p->id; ?>"><?php echo htmlspecialchars($p->name.(!empty($p->spoken_language)?' - '.$p->spoken_language:'').($p->email?' - '.$p->email:''),ENT_QUOTES,'UTF-8'); ?></option><?php endforeach; ?></select><label class="form-check mt-2"><input class="form-check-input" type="checkbox" name="replace_staff" value="1" checked> Sostituisci il personale dei giorni selezionati</label></div>
    <div class="col-12"><label class="form-label">Nota</label><input class="form-control" name="note" placeholder="es. apertura straordinaria, chiusura, evento interno"></div>
    <div class="col-12"><button class="btn btn-primary">Applica ai giorni selezionati</button></div>
   </div><?php echo HTMLHelper::_('form.token'); ?>
  </form>
 </div>
 <div class="col-lg-5">
  <div class="card card-body mb-4"><h2 class="h4">Calendario di selezione</h2><div class="d-flex justify-content-between align-items-center mb-2"><button type="button" class="btn btn-sm btn-outline-secondary" id="salaov_prev">&lsaquo;</button><strong id="salaov_month_title"></strong><button type="button" class="btn btn-sm btn-outline-secondary" id="salaov_next">&rsaquo;</button></div><div id="salaov_admin_cal" class="salaov-admin-cal"></div><div class="form-text mt-2">Clicca un giorno per compilare la personalizzazione singola. Maiusc + clic imposta anche Dal/Al dell'applicazione massiva.</div></div>
 </div>
</div>

<form method="post" action="index.php?option=com_salaov&task=availability.saveDay" class="card card-body mb-4" id="salaov_single_form">
 <h2 class="h4">Personalizza singolo giorno</h2>
 <div class="row g-3">
  <div class="col-md-3"><label class="form-label">Data</label><input class="form-control" type="date" name="single_date" id="single_date" required></div>
  <div class="col-md-2"><label class="form-label">Disponibile</label><select class="form-select" name="single_available"><option value="1">Si</option><option value="0">No</option></select></div>
  <div class="col-md-2"><label class="form-label">Capienza giorno</label><input class="form-control" type="number" name="single_capacity" min="0" value="20"></div>
  <div class="col-md-5"><label class="form-label">Nota</label><input class="form-control" name="single_note"></div>
  <div class="col-md-6"><label class="form-label">Fasce orarie specifiche</label><textarea class="form-control" name="single_slots_text" rows="4">Mattina|09:30|11:00|20</textarea><div class="form-text">Lascia vuoto per nessuna fascia specifica.</div></div>
  <div class="col-md-6"><label class="form-label">Personale specifico</label><select class="form-select" name="single_staff_ids[]" multiple size="6"><?php foreach($staff as $p): ?><option value="<?php echo (int)$p->id; ?>"><?php echo htmlspecialchars($p->name.(!empty($p->spoken_language)?' - '.$p->spoken_language:'').($p->email?' - '.$p->email:''),ENT_QUOTES,'UTF-8'); ?></option><?php endforeach; ?></select></div>
  <div class="col-12"><button class="btn btn-success">Salva personalizzazione giorno</button></div>
 </div><?php echo HTMLHelper::_('form.token'); ?>
</form>

<table class="table table-striped"><thead><tr><th>Data</th><th>Disponibile</th><th>Capienza</th><th>Fasce specifiche</th><th>Personale</th><th>Nota</th><th></th></tr></thead><tbody><?php foreach($this->items as $r): ?><tr><td><?php echo htmlspecialchars($r->visit_date); ?></td><td><?php echo $r->available?'Si':'No'; ?></td><td><?php echo (int)$r->capacity; ?></td><td><?php if(!empty($slotsByDate[$r->visit_date])) foreach($slotsByDate[$r->visit_date] as $s) echo htmlspecialchars($s->title.' '.substr($s->start_time,0,5).'-'.substr($s->end_time,0,5).' ('.$s->capacity.')',ENT_QUOTES,'UTF-8').'<br>'; ?></td><td><?php if(!empty($staffByDate[$r->visit_date])) foreach($staffByDate[$r->visit_date] as $p) echo htmlspecialchars($p->name.(!empty($p->spoken_language)?' - '.$p->spoken_language:''),ENT_QUOTES,'UTF-8').'<br>'; ?></td><td><?php echo htmlspecialchars($r->note); ?></td><td><a class="btn btn-sm btn-danger" href="index.php?option=com_salaov&task=availability.delete&id=<?php echo (int)$r->id; ?>">Elimina</a></td></tr><?php endforeach; ?></tbody></table>
<style>.salaov-admin-cal{display:grid;grid-template-columns:repeat(7,1fr);gap:5px}.salaov-admin-cal span,.salaov-admin-cal button{text-align:center;padding:8px 2px;border-radius:6px}.salaov-admin-cal span{font-weight:700}.salaov-admin-cal button{border:1px solid #ccd;background:#fff}.salaov-admin-cal button:hover{background:#eef}.salaov-admin-cal .is-today{border-color:#0d6efd;font-weight:700}</style>
<script>(function(){var cal=document.getElementById('salaov_admin_cal'),title=document.getElementById('salaov_month_title'),cur=new Date();cur.setDate(1);var mnames=['Gennaio','Febbraio','Marzo','Aprile','Maggio','Giugno','Luglio','Agosto','Settembre','Ottobre','Novembre','Dicembre'];function iso(d){return d.getFullYear()+'-'+String(d.getMonth()+1).padStart(2,'0')+'-'+String(d.getDate()).padStart(2,'0')}function draw(){cal.innerHTML='';['Lun','Mar','Mer','Gio','Ven','Sab','Dom'].forEach(function(w){var s=document.createElement('span');s.textContent=w;cal.appendChild(s)});title.textContent=mnames[cur.getMonth()]+' '+cur.getFullYear();var first=new Date(cur),off=(first.getDay()+6)%7,last=new Date(cur.getFullYear(),cur.getMonth()+1,0).getDate();for(var i=0;i<off;i++){cal.appendChild(document.createElement('i'))}for(var d=1;d<=last;d++){var dt=new Date(cur.getFullYear(),cur.getMonth(),d),b=document.createElement('button');b.type='button';b.textContent=d;b.dataset.date=iso(dt);if(iso(dt)===iso(new Date())) b.className='is-today';b.onclick=function(e){document.getElementById('single_date').value=this.dataset.date;if(e.shiftKey){document.getElementById('salaov_from').value=this.dataset.date;document.getElementById('salaov_to').value=this.dataset.date;}document.getElementById('salaov_single_form').scrollIntoView({behavior:'smooth',block:'start'});};cal.appendChild(b)}}document.getElementById('salaov_prev').onclick=function(){cur.setMonth(cur.getMonth()-1);draw()};document.getElementById('salaov_next').onclick=function(){cur.setMonth(cur.getMonth()+1);draw()};draw();})();</script>
