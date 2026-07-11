<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;

$editId = (int) ($_GET['edit'] ?? 0);
$edit = null;

foreach ($this->items as $item) {
    if ((int) $item->id === $editId) {
        $edit = $item;
        break;
    }
}
?>

<h1>Lingue visite</h1>
<div class="d-flex justify-content-end mb-3">
    <a class="btn btn-outline-secondary"
       href="<?php echo Route::_('index.php?option=com_salaov'); ?>">
        Torna alla dashboard
    </a>
 
    </div>    <div class="card mb-4">
    <div class="card-header">
        <strong><?php echo $edit ? 'Modifica lingua' : 'Aggiungi lingua'; ?></strong>
    </div>
    <div class="card-body">
        <form method="post" action="index.php?option=com_salaov&task=languages.save" class="row g-3">
            <input type="hidden" name="id" value="<?php echo $edit ? (int) $edit->id : 0; ?>">

            <div class="col-md-6">
                <label class="form-label">Lingua</label>
                <input class="form-control" name="title" required value="<?php echo htmlspecialchars($edit->title ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Stato</label>
                <select class="form-select" name="published">
                    <option value="1" <?php echo (!$edit || (int) $edit->published === 1) ? 'selected' : ''; ?>>Attiva</option>
                    <option value="0" <?php echo ($edit && (int) $edit->published === 0) ? 'selected' : ''; ?>>Non attiva</option>
                </select>
            </div>

            <div class="col-12">
                <button class="btn btn-primary" type="submit">Salva</button>
                <?php if ($edit): ?>
                    <a class="btn btn-secondary" href="index.php?option=com_salaov&view=languages">Annulla</a>
                <?php endif; ?>
            </div>

            <?php echo HTMLHelper::_('form.token'); ?>
        </form>
    </div>
</div>

<table class="table table-striped align-middle">
    <thead>
        <tr>
            <th>Lingua</th>
            <th>Stato</th>
            <th class="text-end">Azioni</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($this->items as $r): ?>
            <tr>
                <td><?php echo htmlspecialchars($r->title, ENT_QUOTES, 'UTF-8'); ?></td>
                <td>
                    <span class="badge bg-<?php echo $r->published ? 'success' : 'secondary'; ?>">
                        <?php echo $r->published ? 'Attiva' : 'Non attiva'; ?>
                    </span>
                </td>
                <td class="text-end">
                    <a class="btn btn-sm btn-outline-primary" href="index.php?option=com_salaov&view=languages&edit=<?php echo (int) $r->id; ?>">Modifica</a>
                    <a class="btn btn-sm btn-outline-danger" href="index.php?option=com_salaov&task=languages.delete&id=<?php echo (int) $r->id; ?>" onclick="return confirm('Eliminare questa lingua?');">Elimina</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>