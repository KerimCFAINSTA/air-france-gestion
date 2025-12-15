<?php
// views/avions/index.php
require_once 'views/layout/header.php';
?>

<div class="container">
    <h2 class="page-title">
        <i class="fas fa-plane-circle-check"></i>
        Gestion des Avions
    </h2>
    
    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    
    <!-- Formulaire -->
    <div class="card">
        <h3><?= $avion ? 'Modifier l\'avion' : 'Ajouter un avion' ?></h3>
        
        <form method="POST" class="form">
            <input type="hidden" name="action" value="<?= $avion ? 'update' : 'create' ?>">
            <?php if ($avion): ?>
                <input type="hidden" name="idavion" value="<?= $avion['idavion'] ?>">
            <?php endif; ?>
            
            <div class="form-group">
                <label for="designation">Désignation</label>
                <input type="text" id="designation" name="designation" 
                       value="<?= $avion['designation'] ?? '' ?>" required>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="constructeur">Constructeur</label>
                    <input type="text" id="constructeur" name="constructeur" 
                           value="<?= $avion['constructeur'] ?? '' ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="nbplaces">Nombre de places</label>
                    <input type="number" id="nbplaces" name="nbplaces" 
                           value="<?= $avion['nbplaces'] ?? '' ?>" required>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="reset" class="btn btn-secondary">Annuler</button>
                <button type="submit" class="btn btn-primary">
                    <?= $avion ? 'Modifier' : 'Ajouter' ?>
                </button>
            </div>
        </form>
    </div>
    
    <!-- Liste -->
    <div class="card">
        <h3>Liste des avions</h3>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Désignation</th>
                    <th>Constructeur</th>
                    <th>Nb Places</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($avions)): ?>
                    <tr>
                        <td colspan="5" class="text-center">Aucun avion disponible</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($avions as $a): ?>
                        <tr>
                            <td><?= htmlspecialchars($a['idavion']) ?></td>
                            <td><?= htmlspecialchars($a['designation']) ?></td>
                            <td><?= htmlspecialchars($a['constructeur']) ?></td>
                            <td><?= htmlspecialchars($a['nbplaces']) ?></td>
                            <td class="actions">
                                <a href="?page=avions&action=edit&id=<?= $a['idavion'] ?>" 
                                   class="btn-icon-fa edit" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="?page=avions&action=delete&id=<?= $a['idavion'] ?>" 
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