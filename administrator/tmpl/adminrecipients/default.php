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
            <h1 class="mb-1">Destinatari email amministrative</h1>
            <p class="text-muted mb-0">
                Gestisci il personale amministrativo che riceve le email quando viene inviata una nuova richiesta di prenotazione.
            </p>
        </div>

        <a class="btn btn-outline-secondary" href="<?php echo Route::_('index.php?option=com_salaov'); ?>">
            Torna alla dashboard
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <strong><?php echo $edit ? 'Modifica destinatario' : 'Aggiungi destinatario'; ?></strong>
        </div>

        <div class="card-body">
            <form method="post" action="<?php echo Route::_('index.php?option=com_salaov&task=adminrecipients.save'); ?>" class="row g-3">

                <input type="hidden" name="id" value="<?php echo $edit ? (int) $edit->id : 0; ?>">

                <div class="col-md-4">
                    <label class="form-label" for="adminrecipient-name">Nome</label>
                    <input
                        type="text"
                        id="adminrecipient-name"
                        name="name"
                        class="form-control"
                        required
                        value="<?php echo htmlspecialchars($edit->name ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                    >
                </div>

                <div class="col-md-5">
                    <label class="form-label" for="adminrecipient-email">Email</label>
                    <input
                        type="email"
                        id="adminrecipient-email"
                        name="email"
                        class="form-control"
                        required
                        value="<?php echo htmlspecialchars($edit->email ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                    >
                </div>

                <div class="col-md-3">
                    <label class="form-label" for="adminrecipient-published">Stato</label>
                    <select id="adminrecipient-published" name="published" class="form-select">
                        <option value="1" <?php echo (!$edit || (int) $edit->published === 1) ? 'selected' : ''; ?>>
                            Attivo
                        </option>
                        <option value="0" <?php echo ($edit && (int) $edit->published === 0) ? 'selected' : ''; ?>>
                            Non attivo
                        </option>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        Salva
                    </button>

                    <?php if ($edit): ?>
                        <a class="btn btn-secondary" href="<?php echo Route::_('index.php?option=com_salaov&view=adminrecipients'); ?>">
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
            <strong>Destinatari configurati</strong>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Stato</th>
                        <th class="text-end">Azioni</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($this->items)): ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Nessun destinatario configurato.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($this->items as $row): ?>
                            <tr>
                                <td>
                                    <?php echo htmlspecialchars($row->name, ENT_QUOTES, 'UTF-8'); ?>
                                </td>

                                <td>
                                    <a href="mailto:<?php echo htmlspecialchars($row->email, ENT_QUOTES, 'UTF-8'); ?>">
                                        <?php echo htmlspecialchars($row->email, ENT_QUOTES, 'UTF-8'); ?>
                                    </a>
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
                                        href="<?php echo Route::_('index.php?option=com_salaov&view=adminrecipients&edit=' . (int) $row->id); ?>"
                                    >
                                        Modifica
                                    </a>

                                    <a
                                        class="btn btn-sm btn-outline-danger"
                                        href="<?php echo Route::_('index.php?option=com_salaov&task=adminrecipients.delete&id=' . (int) $row->id . '&' . Session::getFormToken() . '=1'); ?>"
                                        onclick="return confirm('Eliminare questo destinatario email?');"
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