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
                        <label for="nom" class="<?php if(strlen($_POST['user_values']['nom'])) {echo 'active';} ?>">Nom</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="prenom" name="prenom" class="form-control" value="<?= $_POST['user_values']['prenom'];?>" required>
                        <label for="prenom" class="<?php if(strlen($_POST['user_values']['prenom'])) {echo 'active';} ?>">Prénom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="password" id="password" name="password" class="form-control" value="">
                        <label for="password" class="">Mot de passe</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="password" id="password_verif" name="password_verif" class="form-control" value="">
                        <label for="password_verif" class="">Vérification du mot de passe</label>
                        <div class="invalid-feedback">
                            Le mot de passe doit être identique.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="telephone" name="telephone" class="form-control" value="<?= $_POST['user_values']['telephone'];?>">
                        <label for="telephone" class="<?php if(strlen($_POST['user_values']['telephone'])) {echo 'active';} ?>">Téléphone</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="email" id="email" name="email" class="form-control" value="<?= $_POST['user_values']['email'];?>" required>
                        <label for="email" class="<?php if(strlen($_POST['user_values']['email'])) {echo 'active';} ?>">E-mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom_entreprise" name="nom_entreprise" class="form-control" value="<?= $_POST['user_values']['nom_entreprise'];?>">
                        <label for="nom_entreprise" class="<?php if(strlen($_POST['user_values']['nom_entreprise'])) {echo 'active';} ?>">Entreprise | Centre de Formation</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="ville_entreprise" name="ville_entreprise" class="form-control" value="<?= $_POST['user_values']['ville_entreprise'];?>">
                        <label for="ville_entreprise" class="<?php if(strlen($_POST['user_values']['ville_entreprise'])) {echo 'active';} ?>">Ville</label>
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
                        <label for="description_projets" class="<?php if(strlen($_POST['user_values']['description_projets'])) {echo 'active';} ?>">Description des projets</label>
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
                        <label for="nom" class="<?php if(strlen($_POST['user_values']['nom'])) {echo 'active';} ?>">Nom</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="prenom" name="prenom" class="form-control" value="<?= $_POST['user_values']['prenom'];?>" required>
                        <label for="prenom" class="<?php if(strlen($_POST['user_values']['prenom'])) {echo 'active';} ?>">Prénom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="telephone" name="telephone" class="form-control" value="<?= $_POST['user_values']['telephone'];?>">
                        <label for="telephone" class="<?php if(strlen($_POST['user_values']['telephone'])) {echo 'active';} ?>">Téléphone</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="email" id="email" name="email" class="form-control" value="<?= $_POST['user_values']['email'];?>" required>
                        <label for="email" class="<?php if(strlen($_POST['user_values']['email'])) {echo 'active';} ?>">E-mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom_entreprise" name="nom_entreprise" class="form-control" value="<?= $_POST['user_values']['nom_entreprise'];?>">
                        <label for="nom_entreprise" class="<?php if(strlen($_POST['user_values']['nom_entreprise'])) {echo 'active';} ?>">Entreprise | Centre de Formation</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="ville_entreprise" name="ville_entreprise" class="form-control" value="<?= $_POST['user_values']['ville_entreprise'];?>">
                        <label for="ville_entreprise" class="<?php if(strlen($_POST['user_values']['ville_entreprise'])) {echo 'active';} ?>">Ville</label>
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
                        <label for="description_projets" class="<?php if(strlen($_POST['user_values']['description_projets'])) {echo 'active';} ?>">Description des projets</label>
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
                        <label for="nom" class="<?php if(strlen($_POST['user_values']['nom'])) {echo 'active';} ?>">Nom</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="prenom" name="prenom" class="form-control" value="<?= $_POST['user_values']['prenom'];?>" required>
                        <label for="prenom" class="<?php if(strlen($_POST['user_values']['prenom'])) {echo 'active';} ?>">Prénom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="password" id="password" name="password" class="form-control" value="">
                        <label for="password" class="">Mot de passe</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="password" id="password_verif" name="password_verif" class="form-control" value="">
                        <label for="password_verif" class="">Vérification du mot de passe</label>
                        <div class="invalid-feedback">
                            Le mot de passe doit être identique.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="telephone" name="telephone" class="form-control" value="<?= $_POST['user_values']['telephone'];?>">
                        <label for="telephone" class="<?php if(strlen($_POST['user_values']['telephone'])) {echo 'active';} ?>">Téléphone</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="email" id="email" name="email" class="form-control" value="<?= $_POST['user_values']['email'];?>" required>
                        <label for="email" class="<?php if(strlen($_POST['user_values']['email'])) {echo 'active';} ?>">E-mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom_entreprise" name="nom_entreprise" class="form-control" value="<?= $_POST['user_values']['nom_entreprise'];?>">
                        <label for="nom_entreprise" class="<?php if(strlen($_POST['user_values']['nom_entreprise'])) {echo 'active';} ?>">Entreprise | Centre de Formation</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="ville_entreprise" name="ville_entreprise" class="form-control" value="<?= $_POST['user_values']['ville_entreprise'];?>">
                        <label for="ville_entreprise" class="<?php if(strlen($_POST['user_values']['ville_entreprise'])) {echo 'active';} ?>">Ville</label>
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
                        <label for="description_projets" class="<?php if(strlen($_POST['user_values']['description_projets'])) {echo 'active';} ?>">Description des projets</label>
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
    <?php if($_POST['contexte'] == 'consultation'): ?>
        <form id="formPersonne">
            <div class="modal-body" style="padding:0 10%; padding-top:20px">
                <div class="hide">
                    <input type="text" id="id" name="id" class="form-control" value="<?= $_POST['user_values']['id'];?>">
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom" name="nom" class="form-control" disabled value="<?= $_POST['user_values']['nom'];?>">
                        <label for="nom" class="disabled <?php if(strlen($_POST['user_values']['nom'])) {echo 'active';} ?>">Nom</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="prenom" name="prenom" class="form-control" disabled value="<?= $_POST['user_values']['prenom'];?>">
                        <label for="prenom" class="disabled <?php if(strlen($_POST['user_values']['prenom'])) {echo 'active';} ?>">Prénom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="telephone" name="telephone" class="form-control" disabled value="<?= $_POST['user_values']['telephone'];?>">
                        <label for="telephone" class="disabled <?php if(strlen($_POST['user_values']['telephone'])) {echo 'active';} ?>">Téléphone</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="email" id="email" name="email" class="form-control" disabled value="<?= $_POST['user_values']['email'];?>">
                        <label for="email" class="disabled <?php if(strlen($_POST['user_values']['email'])) {echo 'active';} ?>">E-mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom_entreprise" name="nom_entreprise" class="form-control" disabled value="<?= $_POST['user_values']['nom_entreprise'];?>">
                        <label for="nom_entreprise" class="disabled <?php if(strlen($_POST['user_values']['nom_entreprise'])) {echo 'active';} ?>">Entreprise | Centre de Formation</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="ville_entreprise" name="ville_entreprise" class="form-control" disabled value="<?= $_POST['user_values']['ville_entreprise'];?>">
                        <label for="ville_entreprise" class="disabled <?php if(strlen($_POST['user_values']['ville_entreprise'])) {echo 'active';} ?>">Ville</label>
                        <div class="invalid-feedback">
                            Erreur de saisie.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12" id="badge_competences">
                        <label class="disabled active">Competences</label>
                        <?php if(isset($_POST['user_values']['competences'])):
                            foreach ($_POST['user_values']['competences'] as $competence): ?>
                                <a href="#" class="badge badge-cefim"><?= $competence; ?></a>
                            <?php endforeach;
                        endif;?>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12">
                        <textarea type="text" id="description_projets" class="md-textarea" disabled><?= $_POST['user_values']['description_projets'];?></textarea>
                        <label for="description_projets" class="disabled <?php if(strlen($_POST['user_values']['description_projets'])) {echo 'active';} ?>">Description des projets</label>
                    </div>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>

