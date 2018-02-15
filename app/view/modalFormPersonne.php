<?php
/**
 * Created by PhpStorm.
 * User: cdi
 * Date: 12/02/2018
 * Time: 14:12
 */
?>
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title"><?= $_POST['modal_title']; ?></h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                    class="sr-only">Close</span></button>
    </div>

    <?php if($_POST['contexte'] == 'creation'): ?>
        <form id="formAddPersonne" autocomplete="off">
            <div class="modal-body" style="padding:0 10%; padding-top:20px">
                <div class="row">
                    <div class="md-form col-lg-3 col-md-2 col-sm-1"></div>
                    <div class="md-form col-lg-6 col-md-8 col-sm-10">
                        <input type="text" id="nom" name="nom" class="form-control" required>
                        <label for="nom">Nom</label>
                    </div>
                    <div class="md-form col-lg-3 col-md-2 col-sm-1"></div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-3 col-md-2 col-sm-1"></div>
                    <div class="md-form col-lg-6 col-md-8 col-sm-10">
                        <input type="text" id="prenom" name="prenom" class="form-control" required>
                        <label for="prenom">Prénom</label>
                    </div>
                    <div class="md-form col-3 col-md-2 col-sm-1"></div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-3 col-md-2 col-sm-1"></div>
                    <div class="md-form col-lg-6 col-md-8 col-sm-10">
                        <input type="email" id="email" name="email" class="form-control" required>
                        <label for="email">E-mail</label>
                    </div>
                    <div class="md-form col-lg-3 col-md-2 col-sm-1"></div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center">
                    <input type="submit" name="envoyer" id="submitAddPersonne" class="btn btn-success" value="Envoyer">
                </div>
            </div>
        </form>
    <?php endif; ?>
    <?php if($_POST['contexte'] == 'modification'): ?>
        <form id="formModifyPersonne" autocomplete="off">
            <div class="modal-body" style="padding:0 10%; padding-top:20px">
                <div class="hide">
                    <input type="text" id="id" name="id" class="form-control" value="<?= $_POST['user_values']['id'];?>">
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom" name="nom" class="form-control" value="<?= $_POST['user_values']['nom'];?>" required>
                        <label for="nom" class="active">Nom</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="prenom" name="prenom" class="form-control" value="<?= $_POST['user_values']['prenom'];?>" required>
                        <label for="prenom" class="active">Prénom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="password" id="password" name="password" class="form-control" value="">
                        <label for="password" class="active">Mot de passe</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="password" id="password_verif" name="password_verif" class="form-control" value="">
                        <label for="password_verif" class="active">Vérification du mot de passe</label>
                        <div class="invalid-feedback">
                            Le mot de passe doit être identique.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="telephone" name="telephone" class="form-control" value="<?= $_POST['user_values']['telephone'];?>">
                        <label for="telephone" class="active">Téléphone</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="email" id="email" name="email" class="form-control" value="<?= $_POST['user_values']['email'];?>" required>
                        <label for="email" class="active">E-mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom_entreprise" name="nom_entreprise" class="form-control" value="<?= $_POST['user_values']['nom_entreprise'];?>">
                        <label for="nom_entreprise" class="active">Entreprise | Centre de Formation</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="ville_entreprise" name="ville_entreprise" class="form-control" value="<?= $_POST['user_values']['ville_entreprise'];?>">
                        <label for="ville_entreprise" class="active">Ville</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-8">
                        <input type="text" id="competences" name="competences" class="form-control" value="">
                        <label for="competences" class="active">Competences</label>
                    </div>
                    <div class="md-form col-4">
                        <input type="button" id="addCompetenceForm" class="btn btn-success" value="Ajouter">
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12" id="badge_competences">
                        <?php if(isset($_POST['user_values']['competences'])):
                            foreach ($_POST['user_values']['competences'] as $competence): ?>
                                <a href="#" class="badge badge-cefim"><?= $competence; ?><span class="remove_badge">X</span></a>
                            <?php endforeach;
                        endif;?>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12">
                        <textarea type="text" id="description_projets" class="md-textarea"><?= $_POST['user_values']['description_projets'];?></textarea>
                        <label for="description_projets" class="active">Description des projets</label>
                    </div>
                </div>
            </div>


            <div class="modal-footer d-flex justify-content-center">
                <?php if ( ! $_POST['prevent_delete']): ?>
                    <input type="button" id="deletePersonne" class="btn btn-danger" data-id="<?= $_POST['user_values']['id'];?>" value="Supprimer le profil">
                <?php endif; ?>
                <input type="submit" name="envoyer" id="submitModifyPersonne" class="btn btn-success" value="Modifier le profil">
            </div>
        </form>
    <?php endif; ?>
    <?php if($_POST['contexte'] == 'modification_sans_mdp'): ?>
        <form id="formModifyPersonne" autocomplete="off">
            <div class="modal-body" style="padding:0 10%; padding-top:20px">
                <div class="hide">
                    <input type="text" id="id" name="id" class="form-control" value="<?= $_POST['user_values']['id'];?>">
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom" name="nom" class="form-control" value="<?= $_POST['user_values']['nom'];?>" required>
                        <label for="nom" class="active">Nom</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="prenom" name="prenom" class="form-control" value="<?= $_POST['user_values']['prenom'];?>" required>
                        <label for="prenom" class="active">Prénom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="telephone" name="telephone" class="form-control" value="<?= $_POST['user_values']['telephone'];?>">
                        <label for="telephone" class="active">Téléphone</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="email" id="email" name="email" class="form-control" value="<?= $_POST['user_values']['email'];?>" required>
                        <label for="email" class="active">E-mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom_entreprise" name="nom_entreprise" class="form-control" value="<?= $_POST['user_values']['nom_entreprise'];?>">
                        <label for="nom_entreprise" class="active">Entreprise | Centre de Formation</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="ville_entreprise" name="ville_entreprise" class="form-control" value="<?= $_POST['user_values']['ville_entreprise'];?>">
                        <label for="ville_entreprise" class="active">Ville</label>
                        <div class="invalid-feedback">
                            Erreur de saisie.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-8">
                        <input type="text" id="competences" name="competences" class="form-control" value="">
                        <label for="competences" class="active">Competences</label>
                    </div>
                    <div class="md-form col-4">
                        <input type="button" id="addCompetenceForm" class="btn btn-success" value="Ajouter">
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12" id="badge_competences">
                        <?php if(isset($_POST['user_values']['competences'])):
                            foreach ($_POST['user_values']['competences'] as $competence): ?>
                                <a href="#" class="badge badge-cefim"><?= $competence; ?><span class="remove_badge">X</span></a>
                            <?php endforeach;
                        endif;?>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12">
                        <textarea type="text" id="description_projets" class="md-textarea"><?= $_POST['user_values']['description_projets'];?></textarea>
                        <label for="description_projets" class="active">Description des projets</label>
                    </div>
                </div>
            </div>


            <div class="modal-footer d-flex justify-content-center">
                <?php if ( ! $_POST['prevent_delete']): ?>
                    <input type="button" id="deletePersonne" class="btn btn-danger" data-id="<?= $_POST['user_values']['id'];?>" value="Supprimer le profil">
                <?php endif; ?>
                <input type="button" id="newPasswordPersonne" class="btn btn-warning" data-id="<?= $_POST['user_values']['id'];?>" value="Envoyer un nouveau mot de passe">
                <input type="submit" name="envoyer" id="submitModifyPersonne" class="btn btn-success" value="Modifier le profil">
            </div>
        </form>
    <?php endif; ?>
    <?php if($_POST['contexte'] == 'first_connexion'): ?>
        <form id="formModifyPersonne" autocomplete="off">
            <div class="modal-body" style="padding:0 10%; padding-top:20px">
                <div class="hide">
                    <input type="text" id="id" name="id" class="form-control" value="<?= $_POST['user_values']['id'];?>">
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom" name="nom" class="form-control" value="<?= $_POST['user_values']['nom'];?>" required>
                        <label for="nom" class="active">Nom</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="prenom" name="prenom" class="form-control" value="<?= $_POST['user_values']['prenom'];?>" required>
                        <label for="prenom" class="active">Prénom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="password" id="password" name="password" class="form-control" value="" required>
                        <label for="password" class="active">Mot de passe</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="password" id="password_verif" name="password_verif" class="form-control" value="" required>
                        <label for="password_verif" class="active">Vérification du mot de passe</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="telephone" name="telephone" class="form-control" value="<?= $_POST['user_values']['telephone'];?>">
                        <label for="telephone" class="active">Téléphone</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="email" id="email" name="email" class="form-control" value="<?= $_POST['user_values']['email'];?>" required>
                        <label for="email" class="active">E-mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom_entreprise" name="nom_entreprise" class="form-control" value="<?= $_POST['user_values']['nom_entreprise'];?>">
                        <label for="nom_entreprise" class="active">Entreprise | Centre de Formation</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="ville_entreprise" name="ville_entreprise" class="form-control" value="<?= $_POST['user_values']['ville_entreprise'];?>">
                        <label for="ville_entreprise" class="active">Ville</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-8">
                        <input type="text" id="competences" name="competences" class="form-control" value="">
                        <label for="competences" class="active">Competences</label>
                    </div>
                    <div class="md-form col-4">
                        <input type="button" id="addCompetenceForm" class="btn btn-success" value="Ajouter">
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12" id="badge_competences">
                        <?php if(isset($_POST['user_values']['competences'])):
                            foreach ($_POST['user_values']['competences'] as $competence): ?>
                                <a href="#" class="badge badge-cefim"><?= $competence; ?><span class="remove_badge">X</span></a>
                            <?php endforeach;
                        endif;?>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12">
                        <textarea type="text" id="description_projets" class="md-textarea"><?= $_POST['user_values']['description_projets'];?></textarea>
                        <label for="description_projets" class="active">Description des projets</label>
                    </div>
                </div>
            </div>


            <div class="modal-footer d-flex justify-content-center">
                <?php if ( ! $_POST['prevent_delete']): ?>
                    <input type="button" id="deletePersonne" class="btn btn-danger" data-id="<?= $_POST['user_values']['id'];?>" value="Supprimer le profil">
                <?php endif; ?>
                <input type="button" id="newPasswordPersonne" class="btn btn-warning" data-id="<?= $_POST['user_values']['id'];?>" value="Envoyer un nouveau mot de passe">
                <input type="submit" name="envoyer" id="submitModifyPersonne" class="btn btn-success" value="Modifier le profil">
            </div>
        </form>
    <?php endif; ?>
    <?php if($_POST['contexte'] == 'consultation'): ?>
        <form id="formPersonne">
            <div class="modal-body" style="padding:0 10%; padding-top:20px">
                <div class="hide">
                    <input type="text" id="id" name="id" class="form-control" >
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom" name="nom" class="form-control" disabled value="value_from_db">
                        <label for="nom" class="disabled active">Nom</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="prenom" name="prenom" class="form-control" disabled value="value_from_db">
                        <label for="prenom" class="disabled active">Prénom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="telephone" name="telephone" class="form-control" disabled value="value_from_db">
                        <label for="telephone" class="disabled active">Téléphone</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="email" id="email" name="email" class="form-control" disabled value="value_from_db">
                        <label for="email" class="disabled active">E-mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom_entreprise" name="nom_entreprise" class="form-control" disabled value="value_from_db">
                        <label for="nom_entreprise" class="disabled active">Entreprise | Centre de Formation</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="ville_entreprise" name="ville_entreprise" class="form-control" disabled value="value_from_db">
                        <label for="ville_entreprise" class="disabled active">Ville</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12">
                        <input type="text" id="competences" name="competences" class="form-control" disabled value="value_from_db">
                        <label for="competences" class="disabled active">Competences</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12">
                        <textarea type="text" id="description_projets" class="md-textarea" disabled>value_from_db</textarea>
                        <label for="description_projets" class="disabled active">Description des projets</label>
                    </div>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>

