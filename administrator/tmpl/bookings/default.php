<?php

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;

$app = Factory::getApplication();

$editId = $app->input->getInt('edit', 0);
$edit   = null;

foreach (($this->items ?? []) as $item) {
    if ((int) $item->id === $editId) {
        $edit = $item;
        break;
    }
}

$days = [
    1 => 'Lunedì',
    2 => 'Martedì',
    3 => 'Mercoledì',
    4 => 'Giovedì',
    5 => 'Venerdì',
    6 => 'Sabato',
    7 => 'Domenica',
];
?>

<form action="<?php echo Route::_('index.php?option=com_salaov&view=bookings'); ?>" method="post" name="adminForm" id="adminForm">
    <h1>Prenotazioni Sala OV</h1>

    <p>
        <a class="btn btn-success" href="<?php echo Route::_('index.php?option=com_salaov&task=bookings.export'); ?>">
            Export CSV
        </a>
    </p>

    <?php if ($edit): ?>
        <div class="card border-primary mb-4">
            <div class="card-header bg-primary text-white">
                <strong>Modifica prenotazione #<?php echo (int) $edit->id; ?></strong>
            </div>

            <div class="card-body">
                <form method="post" action="<?php echo Route::_('index.php?option=com_salaov&task=bookings.saveEdit'); ?>" class="row g-3">
                    <input type="hidden" name="id" value="<?php echo (int) $edit->id; ?>">

                    <div class="col-md-3">
                        <label class="form-label">Data visita</label>
                        <input type="date" name="visit_date" class="form-control" required value="<?php echo htmlspecialchars($edit->visit_date, ENT_QUOTES, 'UTF-8'); ?>">
                    </div>

                    <div class="col-md-5">
                        <label class="form-label">Fascia oraria</label>
                        <select name="slot_id_edit" class="form-select">
                            <option value="0">Nessuna fascia</option>
                            <?php foreach (($this->slots ?? []) as $slot): ?>
                                <option value="<?php echo (int) $slot->id; ?>" <?php echo ((int) $edit->slot_id === (int) $slot->id) ? 'selected' : ''; ?>>
                                    <?php
                                    echo htmlspecialchars(
                                        ($days[(int) $slot->weekday] ?? 'Giorno') . ' - ' .
                                        $slot->title . ' ' .
                                        substr((string) $slot->start_time, 0, 5) . '-' .
                                        substr((string) $slot->end_time, 0, 5) .
                                        ' (max ' . (int) $slot->capacity . ')',
                                        ENT_QUOTES,
                                        'UTF-8'
                                    );
                                    ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="form-text">
                            Per le fasce specifiche del singolo giorno, al momento viene salvata una fascia settimanale.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Stato</label>
                        <select name="status" class="form-select">
                            <option value="pending" <?php echo $edit->status === 'pending' ? 'selected' : ''; ?>>In attesa</option>
                            <option value="approved" <?php echo $edit->status === 'approved' ? 'selected' : ''; ?>>Approvata</option>
                            <option value="rejected" <?php echo $edit->status === 'rejected' ? 'selected' : ''; ?>>Rifiutata</option>
                            <option value="cancelled" <?php echo $edit->status === 'cancelled' ? 'selected' : ''; ?>>Annullata</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Nome</label>
                        <input name="first_name" class="form-control" required value="<?php echo htmlspecialchars($edit->first_name, ENT_QUOTES, 'UTF-8'); ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Cognome</label>
                        <input name="last_name" class="form-control" required value="<?php echo htmlspecialchars($edit->last_name, ENT_QUOTES, 'UTF-8'); ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required value="<?php echo htmlspecialchars($edit->email, ENT_QUOTES, 'UTF-8'); ?>">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Telefono</label>
                        <input name="phone" class="form-control" value="<?php echo htmlspecialchars($edit->phone, ENT_QUOTES, 'UTF-8'); ?>">
                    </div>

                    <div class="col-md-8">
                        <label class="form-label">Ente/Scuola</label>
                        <input name="organization" class="form-control" value="<?php echo htmlspecialchars($edit->organization, ENT_QUOTES, 'UTF-8'); ?>">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Visitatori</label>
                        <input type="number" name="visitors" min="1" class="form-control" required value="<?php echo (int) $edit->visitors; ?>">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Lingua visita</label>
                        <select name="language_id" class="form-select">
                            <option value="0">Non specificata</option>
                            <?php foreach (($this->languages ?? []) as $language): ?>
                                <option value="<?php echo (int) $language->id; ?>" <?php echo ((int) $edit->language_id === (int) $language->id) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($language->title, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Livello visita</label>
                        <select name="visit_level_id" class="form-select">
                            <option value="0">Non specificato</option>
                            <?php foreach (($this->visitLevels ?? []) as $level): ?>
                                <option value="<?php echo (int) $level->id; ?>" <?php echo ((int) $edit->visit_level_id === (int) $level->id) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($level->title, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Personale assegnato</label>
                        <select name="staff_id_edit" class="form-select">
                            <option value="0">Nessun personale</option>
                            <?php foreach (($this->staff ?? []) as $s): ?>
                                <option value="<?php echo (int) $s->id; ?>" <?php echo ((int) $edit->staff_id === (int) $s->id) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($s->name, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Note</label>
                        <textarea name="notes" class="form-control" rows="4"><?php echo htmlspecialchars($edit->notes, ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">
                            Salva modifiche
                        </button>

                        <a class="btn btn-secondary" href="<?php echo Route::_('index.php?option=com_salaov&view=bookings'); ?>">
                            Annulla
                        </a>
                    </div>

                    <?php echo HTMLHelper::_('form.token'); ?>
                </form>
            </div>
        </div>
    <?php endif; ?>

    <div class="card mb-3">
        <div class="card-body">
            <label class="form-label">
                <strong>Personale che gestirà la visita in caso di approvazione</strong>
            </label>

            <select name="staff_id" class="form-select" style="max-width:420px" required>
                <option value="">Seleziona personale...</option>
                <?php foreach (($this->staff ?? []) as $s): ?>
                    <option value="<?php echo (int) $s->id; ?>">
                        <?php echo htmlspecialchars($s->name, ENT_QUOTES, 'UTF-8'); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <small class="form-text text-muted">
                Seleziona una o più prenotazioni e premi Approva.
            </small>
        </div>
    </div>

    <table class="table table-striped table-hover align-middle">
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
                <th class="text-end">Azioni</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach (($this->items ?? []) as $i => $r): ?>
                <tr>
                    <td>
                        <input type="checkbox" name="cid[]" value="<?php echo (int) $r->id; ?>">
                    </td>

                    <td>
                        <?php echo htmlspecialchars($r->visit_date, ENT_QUOTES, 'UTF-8'); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars(($r->slot_title ?: '-') . ' ' . substr((string) $r->start_time, 0, 5) . '-' . substr((string) $r->end_time, 0, 5), ENT_QUOTES, 'UTF-8'); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($r->first_name . ' ' . $r->last_name, ENT_QUOTES, 'UTF-8'); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($r->organization, ENT_QUOTES, 'UTF-8'); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($r->visit_level_label ?: '-', ENT_QUOTES, 'UTF-8'); ?>
                    </td>

                    <td>
                        <?php echo (int) $r->visitors; ?>
                    </td>

                    <td>
                        <span class="badge bg-<?php echo $r->status === 'approved' ? 'success' : ($r->status === 'pending' ? 'warning' : 'secondary'); ?>">
                            <?php echo htmlspecialchars($r->status, ENT_QUOTES, 'UTF-8'); ?>
                        </span>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($r->staff_label ?: $r->staff_name ?: '-', ENT_QUOTES, 'UTF-8'); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($r->email . ' - ' . $r->phone, ENT_QUOTES, 'UTF-8'); ?>
                    </td>

                    <td class="text-end">
                        <a
                            class="btn btn-sm btn-outline-primary"
                            href="<?php echo Route::_('index.php?option=com_salaov&view=bookings&edit=' . (int) $r->id); ?>"
                        >
                            Modifica
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <input type="hidden" name="task" value="">

    <p>
        <button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('bookings.approve');">
            Approva
        </button>

        <button type="button" class="btn btn-warning" onclick="Joomla.submitbutton('bookings.reject');">
            Rifiuta
        </button>

        <button type="button" class="btn btn-danger" onclick="Joomla.submitbutton('bookings.cancel');">
            Annulla
        </button>
    </p>

    <script>
    Joomla.submitbutton = function(task) {
        document.adminForm.task.value = task;
        document.adminForm.submit();
    };
    </script>

    <?php echo HTMLHelper::_('form.token'); ?>
</form>