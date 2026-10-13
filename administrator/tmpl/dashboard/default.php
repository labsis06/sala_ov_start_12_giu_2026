<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;

$user = Factory::getApplication()->getIdentity();
$isSuperUser = $user->authorise('core.admin');
?>

<h1>Sala OV - Dashboard</h1>

<div class="row">
<?php foreach ([
    'pending'   => 'In attesa',
    'approved'  => 'Approvate',
    'rejected'  => 'Rifiutate',
    'cancelled' => 'Annullate'
] as $k => $label): ?>
    <div class="card col-md-2" style="margin:8px;padding:16px">
        <h3><?php echo (int) ($this->stats[$k] ?? 0); ?></h3>
        <p><?php echo $label; ?></p>
    </div>
<?php endforeach; ?>
</div>

<p>
    <a class="btn btn-primary"
       href="index.php?option=com_salaov&view=bookings">
        Gestisci prenotazioni
    </a>

    <?php if ($isSuperUser): ?>
        <a class="btn btn-secondary"
           href="index.php?option=com_salaov&view=availability">
            Configura calendario disponibilità
        </a>

        <a class="btn btn-secondary"
           href="index.php?option=com_salaov&view=staff">
            Personale visite
        </a>

        <a class="btn btn-secondary"
           href="index.php?option=com_salaov&view=languages">
            Lingue visite
        </a>

        <a class="btn btn-secondary"
           href="index.php?option=com_salaov&view=mailrecipients">
            Destinatari email admin
        </a>

        <a class="btn btn-secondary"
           href="index.php?option=com_salaov&view=levels">
            Livelli visita
        </a>
    <?php endif; ?>
</p>
