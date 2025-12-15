<?php
// views/vols/index.php
require_once 'views/layout/header.php';
?>

<div class="container">
    <h2 class="page-title">
        <i class="fas fa-plane-departure"></i>
        Gestion des Vols
    </h2>
    
    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    
    <!-- Formulaire -->
    <div class="card">
        <h3><?= $vol ? 'Modifier le vol' : 'Ajouter un vol' ?></h3>
        
        <form method="POST" class="form">
            <input type="hidden" name="action" value="<?= $vol ? 'update' : 'create' ?>">
            <?php if ($vol): ?>
                <input type="hidden" name="idvol" value="<?= $vol['idvol'] ?>">
            <?php endif; ?>
            
            <div class="form-group">
                <label for="designation">Désignation du vol</label>
                <input type="text" id="designation" name="designation" 
                       value="<?= $vol['designation'] ?? '' ?>" required>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="datevol">Date du vol</label>
                    <input type="date" id="datevol" name="datevol" 
                           value="<?= $vol['datevol'] ?? '' ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="heurevol">Heure du vol</label>
                    <input type="time" id="heurevol" name="heurevol" 
                           value="<?= $vol['heurevol'] ?? '' ?>" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="idpilote1">Premier Pilote (Capitaine)</label>
                    <select id="idpilote1" name="idpilote1" required>
                        <option value="">Sélectionner un pilote</option>
                        <?php foreach ($pilotes as $pilote): ?>
                            <option value="<?= $pilote['idpilote'] ?>" 
                                <?= ($vol['idpilote1'] ?? '') == $pilote['idpilote'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($pilote['nom']) ?> <?= htmlspecialchars($pilote['prenom']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="idpilote2">Deuxième Pilote (Copilote)</label>
                    <select id="idpilote2" name="idpilote2" required>
                        <option value="">Sélectionner un pilote</option>
                        <?php foreach ($pilotes as $pilote): ?>
                            <option value="<?= $pilote['idpilote'] ?>" 
                                <?= ($vol['idpilote2'] ?? '') == $pilote['idpilote'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($pilote['nom']) ?> <?= htmlspecialchars($pilote['prenom']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="idavion">Avion</label>
                <select id="idavion" name="idavion" required>
                    <option value="">Sélectionner un avion</option>
                    <?php foreach ($avions as $avion): ?>
                        <option value="<?= $avion['idavion'] ?>" 
                            <?= ($vol['idavion'] ?? '') == $avion['idavion'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($avion['designation']) ?> - <?= htmlspecialchars($avion['constructeur']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-actions">
                <button type="reset" class="btn btn-secondary">Annuler</button>
                <button type="submit" class="btn btn-primary">
                    <?= $vol ? 'Modifier' : 'Ajouter' ?>
                </button>
            </div>
        </form>
    </div>
    
    <!-- Liste -->
    <div class="card">
        <h3>Liste des vols</h3>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Capitaine</th>
                    <th>Copilote</th>
                    <th>Avion</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($vols)): ?>
                    <tr>
                        <td colspan="7" class="text-center">Aucun vol disponible</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($vols as $v): ?>
                        <tr>
                            <td><?= htmlspecialchars($v['designation']) ?></td>
                            <td><?= date('d/m/Y', strtotime($v['datevol'])) ?></td>
                            <td><?= date('H:i', strtotime($v['heurevol'])) ?></td>
                            <td><?= htmlspecialchars($v['pilote1_nom']) ?></td>
                            <td><?= htmlspecialchars($v['pilote2_nom']) ?></td>
                            <td><?= htmlspecialchars($v['avion_designation']) ?></td>
                            <td class="actions">
                                <a href="?page=vols&action=edit&id=<?= $v['idvol'] ?>" 
                                   class="btn-icon-fa edit" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="?page=vols&action=delete&id=<?= $v['idvol'] ?>" 
                                   class="btn-icon-fa delete" title="Supprimer"
                                   onclick="return confirm('Confirmer la suppression ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>