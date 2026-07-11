<?php
\defined('_JEXEC') or die;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\Route;

$editId = (int) ($_GET['edit'] ?? 0);
$edit = null;
foreach ($this->items as $item) {
    if ((int) $item->id === $editId) { $edit = $item; break; }
}
?>
<h1>Personale visite</h1>

<div class="card mb-4">
    <div class="card-header">
        <strong><?php echo $edit ? 'Modifica personale' : 'Aggiungi personale'; ?></strong>
    </div>
    <div class="card-body">
        <form method="post" action="index.php?option=com_salaov&task=staff.save" class="row g-3">
            <input type="hidden" name="id" value="<?php echo $edit ? (int) $edit->id : 0; ?>">
            <div class="col-md-4">
                <label class="form-label" for="staff-name">Nome e cognome</label>
                <input id="staff-name" class="form-control" name="name" required value="<?php echo htmlspecialchars($edit->name ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="staff-email">Email</label>
                <input id="staff-email" class="form-control" type="email" name="email" required value="<?php echo htmlspecialchars($edit->email ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                <div class="form-text">Usata per inviare il riepilogo quando la persona viene assegnata a una visita.</div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="staff-phone">Telefono</label>
                <input id="staff-phone" class="form-control" name="phone" value="<?php echo htmlspecialchars($edit->phone ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label" for="staff-spoken-language">Lingua parlata</label>
               <input id="staff-spoken-language" class="form-control" name="spoken_language" placeholder="es. Italiano, Inglese" value="<?php echo htmlspecialchars($edit->spoken_language ?? '', ENT_QUOTES, 'UTF-8'); ?>">
               <div class="form-text">Indica una o più lingue parlate dal personale.</div>
            </div>
            <div class="col-md-2">
                <label class="form-label" for="staff-published">Stato</label>
                <select id="staff-published" class="form-select" name="published">
                    <option value="1" <?php echo (!$edit || (int) $edit->published === 1) ? 'selected' : ''; ?>>Attivo</option>
                    <option value="0" <?php echo ($edit && (int) $edit->published === 0) ? 'selected' : ''; ?>>Non attivo</option>
                </select>
            </div>
            <div class="col-12 d-flex gap-2">
                <button class="btn btn-primary" type="submit"><?php echo $edit ? 'Salva modifiche' : 'Aggiungi personale'; ?></button>
                <?php if ($edit): ?>
                    <a class="btn btn-secondary" href="index.php?option=com_salaov&view=staff">Annulla modifica</a>
                <?php endif; ?>
            </div>
            <?php echo HTMLHelper::_('form.token'); ?>
        </form>
    </div>
</div>

<table class="table table-striped table-hover align-middle">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Lingua parlata</th>
            <th>Stato</th>
            <th class="text-end">Azioni</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($this->items as $r): ?>
        <tr>
            <td><?php echo htmlspecialchars($r->name, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($r->email, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($r->phone, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($r->spoken_language ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
            <td><span class="badge bg-<?php echo $r->published ? 'success' : 'secondary'; ?>"><?php echo $r->published ? 'Attivo' : 'Non attivo'; ?></span></td>
            <td class="text-end">
                <a class="btn btn-sm btn-outline-primary" href="index.php?option=com_salaov&view=staff&edit=<?php echo (int) $r->id; ?>">Modifica</a>
                <a class="btn btn-sm btn-outline-danger" href="index.php?option=com_salaov&task=staff.delete&id=<?php echo (int) $r->id; ?>" onclick="return confirm('Eliminare questo membro del personale?');">Elimina</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
