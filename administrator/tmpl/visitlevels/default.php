<?php

\defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Session\Session;

$app = Factory::getApplication();

$editId = $app->input->getInt('edit', 0);
$edit   = null;

foreach (($this->items ?? []) as $item) {
    if ((int) $item->id === $editId) {
        $edit = $item;
        break;
    }
}
?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="mb-1">Livelli visita</h1>
            <p class="text-muted mb-0">
                Gestisci i livelli/tipologie delle visite selezionabili nel form di prenotazione.
            </p>
        </div>

        <a class="btn btn-outline-secondary" href="<?php echo Route::_('index.php?option=com_salaov'); ?>">
            Torna alla dashboard
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <strong><?php echo $edit ? 'Modifica livello visita' : 'Aggiungi livello visita'; ?></strong>
        </div>

        <div class="card-body">
            <form method="post" action="<?php echo Route::_('index.php?option=com_salaov&task=visitlevels.save'); ?>" class="row g-3">

                <input type="hidden" name="id" value="<?php echo $edit ? (int) $edit->id : 0; ?>">

                <div class="col-md-5">
                    <label class="form-label" for="visit-level-title">Titolo</label>
                    <input
                        type="text"
                        id="visit-level-title"
                        name="title"
                        class="form-control"
                        required
                        value="<?php echo htmlspecialchars($edit->title ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                        placeholder="Es. Alta istituzione / delegazione"
                    >
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="visit-level-priority">Priorità</label>
                    <input
                        type="number"
                        id="visit-level-priority"
                        name="priority"
                        class="form-control"
                        min="0"
                        max="10"
                        value="<?php echo htmlspecialchars((string) ($edit->priority ?? 0), ENT_QUOTES, 'UTF-8'); ?>"
                    >
                </div>

                <div class="col-md-2">
                    <label class="form-label" for="visit-level-ordering">Ordinamento</label>
                    <input
                        type="number"
                        id="visit-level-ordering"
                        name="ordering"
                        class="form-control"
                        value="<?php echo htmlspecialchars((string) ($edit->ordering ?? 0), ENT_QUOTES, 'UTF-8'); ?>"
                    >
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="visit-level-published">Stato</label>
                    <select id="visit-level-published" name="published" class="form-select">
                        <option value="1" <?php echo (!$edit || (int) $edit->published === 1) ? 'selected' : ''; ?>>
                            Attivo
                        </option>
                        <option value="0" <?php echo ($edit && (int) $edit->published === 0) ? 'selected' : ''; ?>>
                            Non attivo
                        </option>
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label" for="visit-level-description">Descrizione</label>
                    <textarea
                        id="visit-level-description"
                        name="description"
                        class="form-control"
                        rows="3"
                        placeholder="Descrizione interna facoltativa"
                    ><?php echo htmlspecialchars($edit->description ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        Salva
                    </button>

                    <?php if ($edit): ?>
                        <a class="btn btn-secondary" href="<?php echo Route::_('index.php?option=com_salaov&view=visitlevels'); ?>">
                            Annulla modifica
                        </a>
                    <?php endif; ?>
                </div>

                <?php echo HTMLHelper::_('form.token'); ?>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <strong>Livelli configurati</strong>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Titolo</th>
                        <th>Descrizione</th>
                        <th>Priorità</th>
                        <th>Ordinamento</th>
                        <th>Stato</th>
                        <th class="text-end">Azioni</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($this->items)): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Nessun livello visita configurato.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($this->items as $row): ?>
                            <tr>
                                <td>
                                    <strong><?php echo htmlspecialchars($row->title, ENT_QUOTES, 'UTF-8'); ?></strong>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($row->description ?: '-', ENT_QUOTES, 'UTF-8'); ?>
                                </td>

                                <td>
                                    <?php echo (int) $row->priority; ?>
                                </td>

                                <td>
                                    <?php echo (int) $row->ordering; ?>
                                </td>

                                <td>
                                    <?php if ((int) $row->published === 1): ?>
                                        <span class="badge bg-success">Attivo</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Non attivo</span>
                                    <?php endif; ?>
                                </td>

                                <td class="text-end">
                                    <a
                                        class="btn btn-sm btn-outline-primary"
                                        href="<?php echo Route::_('index.php?option=com_salaov&view=visitlevels&edit=' . (int) $row->id); ?>"
                                    >
                                        Modifica
                                    </a>

                                    <a
                                        class="btn btn-sm btn-outline-danger"
                                        href="<?php echo Route::_('index.php?option=com_salaov&task=visitlevels.delete&id=' . (int) $row->id . '&' . Session::getFormToken() . '=1'); ?>"
                                        onclick="return confirm('Eliminare questo livello visita?');"
                                    >
                                        Elimina
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>