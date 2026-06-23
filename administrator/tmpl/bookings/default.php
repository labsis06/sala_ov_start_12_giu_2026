<?php defined('_JEXEC') or die; use Joomla\CMS\HTML\HTMLHelper; ?>
<form action="index.php?option=com_salaov&view=bookings" method="post" name="adminForm" id="adminForm">
<h1>Prenotazioni Sala OV</h1>
<p><a class="btn btn-success" href="index.php?option=com_salaov&task=bookings.export">Export CSV</a></p>
<div class="card mb-3"><div class="card-body">
<label class="form-label"><strong>Personale che gestira la visita in caso di approvazione</strong></label>
<select name="staff_id" class="form-select" style="max-width:420px" required>
<option value="">Seleziona personale...</option>
<?php foreach(($this->staff ?? []) as $s): ?>
    <option value="<?php echo (int)$s->id; ?>">
        <?php echo htmlspecialchars($s->name, ENT_QUOTES, 'UTF-8'); ?>
    </option>
        <?php endforeach; ?>
</select>
<small class="form-text text-muted">Seleziona una o piu prenotazioni e premi Approva.</small>
</div></div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
        <th></th>
        <th>Data</th>
        <th>Fascia</th>
        <th>Richiedente</th>
        <th>Ente/Scuola</th>
        <th>Livello visita</th>
        <th>Visitatori</th>
        <th>Stato</th>
        <th>Personale</th>
        <th>Contatti</th>
        </tr>
    </thead>
    
    <tbody>
<?php foreach($this->items as $i=>$r): ?>
    <tr>
        <td>
            <input type="checkbox" name="cid[]" value="<?php echo (int)$r->id; ?>">
        </td>
        <td>
            <?php echo htmlspecialchars($r->visit_date); ?>
        </td>
            <td><?php echo htmlspecialchars($r->slot_title.' '.substr($r->start_time,0,5).'-'.substr($r->end_time,0,5)); ?>
        </td>
           <td><?php echo htmlspecialchars($r->first_name.' '.$r->last_name); ?>
        </td>
           <td><?php echo htmlspecialchars($r->organization); ?>
        </td>
           <td><?php echo htmlspecialchars($r->visit_level_label ?: '-'); ?>
        </td>
           <td><?php echo (int)$r->visitors; ?>
        </td>
           <td><span class="badge bg-<?php echo $r->status==='approved'?'success':($r->status==='pending'?'warning':'secondary'); ?>">
            <?php echo htmlspecialchars($r->status); ?></span>
        </td>
            <td><?php echo htmlspecialchars($r->staff_label ?: $r->staff_name ?: '-'); ?>
        </td>
           <td><?php echo htmlspecialchars($r->email.' - '.$r->phone); ?>
        </td>
        </tr>
        <?php endforeach; ?>
</tbody></table>
<input type="hidden" name="task" value="">
<p>
    <button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('bookings.approve');">Approva</button>
    <button type="button" class="btn btn-warning" onclick="Joomla.submitbutton('bookings.reject');">Rifiuta</button>
    <button type="button" class="btn btn-danger" onclick="Joomla.submitbutton('bookings.cancel');">Annulla</button>
</p>

<script>
Joomla.submitbutton = function(task) {
    document.adminForm.task.value = task;
    document.adminForm.submit();
};
</script>

<?php echo HTMLHelper::_('form.token'); ?>
</form>
