<?php defined('_JEXEC') or die; ?>
<h1>Sala OV - Dashboard</h1><div class="row">
<?php foreach(['pending'=>'In attesa','approved'=>'Approvate','rejected'=>'Rifiutate','cancelled'=>'Annullate'] as $k=>$label): ?>
<div class="card col-md-2" style="margin:8px;padding:16px"><h3><?php echo (int)($this->stats[$k] ?? 0); ?></h3><p><?php echo $label; ?></p></div>
<?php endforeach; ?></div>
<p><a class="btn btn-primary" href="index.php?option=com_salaov&view=bookings">Gestisci prenotazioni</a> <a class="btn btn-secondary" href="index.php?option=com_salaov&view=availability">Configura calendario disponibilita</a></p>
