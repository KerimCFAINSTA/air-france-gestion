<?php
// views/pilotes/index.php
require_once 'views/layout/header.php';
?>

<div class="container">
    <h2 class="page-title">
        <i class="fas fa-user-pilot"></i>
        Gestion des Pilotes
    </h2>
    
    <?php if (!empty($message)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    
    <!-- Formulaire -->
    <div class="card">
        <h3><?= $pilote ? 'Modifier le pilote' : 'Ajouter un pilote' ?></h3>
        
        <form method="POST" class="form">
            <input type="hidden" name="action" value="<?= $pilote ? 'update' : 'create' ?>">
            <?php if ($pilote): ?>
                <input type="hidden" name="idpilote" value="<?= $pilote['idpilote'] ?>">
            <?php endif; ?>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" 
                           value="<?= $pilote['nom'] ?? '' ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" 
                           value="<?= $pilote['prenom'] ?? '' ?>" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" 
                       value="<?= $pilote['email'] ?? '' ?>" required>
            </div>
            
            <div class="form-group">
                <label for="mdp">Mot de passe <?= $pilote ? '(laisser vide pour ne pas changer)' : '' ?></label>
                <input type="password" id="mdp" name="mdp" 
                       <?= !$pilote ? 'required' : '' ?>>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="bip">Bip</label>
                    <input type="text" id="bip" name="bip" 
                           value="<?= $pilote['bip'] ?? '' ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="statut">Statut</label>
                    <select id="statut" name="statut" required>
                        <option value="">Sélectionner</option>
                        <option value="Capitaine" <?= ($pilote['statut'] ?? '') === 'Capitaine' ? 'selected' : '' ?>>Capitaine</option>
                        <option value="Copilote" <?= ($pilote['statut'] ?? '') === 'Copilote' ? 'selected' : '' ?>>Copilote</option>
                        <option value="Instructeur" <?= ($pilote['statut'] ?? '') === 'Instructeur' ? 'selected' : '' ?>>Instructeur</option>
                    </select>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="reset" class="btn btn-secondary">Annuler</button>
                <button type="submit" class="btn btn-primary">
                    <?= $pilote ? 'Modifier' : 'Ajouter' ?>
                </button>
            </div>
        </form>
    </div>
    
    <!-- Liste -->
    <div class="card">
        <h3>Liste des pilotes</h3>
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Bip</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pilotes)): ?>
                    <tr>
                        <td colspan="7" class="text-center">Aucun pilote disponible</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($pilotes as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['idpilote']) ?></td>
                            <td><?= htmlspecialchars($p['nom']) ?></td>
                            <td><?= htmlspecialchars($p['prenom']) ?></td>
                            <td><?= htmlspecialchars($p['email']) ?></td>
                            <td><?= htmlspecialchars($p['bip']) ?></td>
                            <td><?= htmlspecialchars($p['statut']) ?></td>
                            <td class="actions">
                                <a href="?page=pilotes&action=edit&id=<?= $p['idpilote'] ?>" 
                                   class="btn-icon-fa edit" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="?page=pilotes&action=delete&id=<?= $p['idpilote'] ?>" 
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