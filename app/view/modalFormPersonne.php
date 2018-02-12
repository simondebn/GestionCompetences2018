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
        <form id="formPersonne" autocomplete="off">
            <div class="modal-body" style="padding:0 10%; padding-top:20px">
                <div class="hide">
                    <input type="text" id="id" name="id" class="form-control" >
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom" name="nom" class="form-control" >
                        <label for="nom">Nom</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="prenom" name="prenom" class="form-control" >
                        <label for="prenom">Prénom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="telephone" name="telephone" class="form-control" >
                        <label for="telephone">Téléphone</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="email" id="email" name="email" class="form-control" >
                        <label for="email">E-mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom_entreprise" name="nom_entreprise" class="form-control" >
                        <label for="nom_entreprise">Entreprise | Centre de Formation</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="ville_entreprise" name="ville_entreprise" class="form-control">
                        <label for="ville_entreprise">Ville</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="password" id="password" name="password" class="form-control" >
                        <label for="password">Mot de passe</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="password" id="password_verif" name="password_verif" class="form-control" >
                        <label for="password_verif">Vérification du mot de passe</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12">
                        <input type="text" id="competences" name="competences" class="form-control" >
                        <label for="competences">Competences</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12">
                        <textarea type="text" id="description_competences" class="md-textarea"></textarea>
                        <label for="description_competences">Description des compétences</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12">
                        <textarea type="text" id="description_projets" class="md-textarea"></textarea>
                        <label for="description_projets">Description des projets</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center">
                    <input type="submit" name="envoyer" id="addPersonne" class="btn btn-success" value="Envoyer">
                </div>
            </div>
        </form>
    <?php endif; ?>
    <?php if($_POST['contexte'] == 'modification'): ?>
        <form id="formPersonne" autocomplete="off">
            <div class="modal-body" style="padding:0 10%; padding-top:20px">
                <div class="hide">
                    <input type="text" id="id" name="id" class="form-control" >
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom" name="nom" class="form-control" value="value_from_db">
                        <label for="nom" class="active">Nom</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="prenom" name="prenom" class="form-control" value="value_from_db">
                        <label for="prenom" class="active">Prénom</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="telephone" name="telephone" class="form-control" value="value_from_db">
                        <label for="telephone" class="active">Téléphone</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="email" id="email" name="email" class="form-control" value="value_from_db">
                        <label for="email" class="active">E-mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="text" id="nom_entreprise" name="nom_entreprise" class="form-control" value="value_from_db">
                        <label for="nom_entreprise" class="active">Entreprise | Centre de Formation</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="text" id="ville_entreprise" name="ville_entreprise" class="form-control" value="value_from_db">
                        <label for="ville_entreprise" class="active">Ville</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-lg-6">
                        <input type="password" id="password" name="password" class="form-control" value="value_from_db">
                        <label for="password" class="active">Mot de passe</label>
                    </div>
                    <div class="md-form col-lg-6">
                        <input type="password" id="password_verif" name="password_verif" class="form-control" value="value_from_db">
                        <label for="password_verif" class="active">Vérification du mot de passe</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12">
                        <input type="text" id="competences" name="competences" class="form-control" value="value_from_db">
                        <label for="competences" class="active">Competences</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12">
                        <textarea type="text" id="description_competences" class="md-textarea">value_from_db</textarea>
                        <label for="description_competences" class="active">Description des compétences</label>
                    </div>
                </div>
                <div class="row">
                    <div class="md-form col-12">
                        <textarea type="text" id="description_projets" class="md-textarea">value_from_db</textarea>
                        <label for="description_projets" class="active">Description des projets</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 text-center">
                    <input type="submit" name="envoyer" id="modifyPersonne" class="btn btn-success" value="Envoyer">
                </div>
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
                        <textarea type="text" id="description_competences" class="md-textarea" disabled>value_from_db</textarea>
                        <label for="description_competences" class="disabled active">Description des compétences</label>
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

