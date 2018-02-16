<div class="row justify-content-center">
    <div style="padding-top:50px" class="col-md-6">
        <div class="flex-center flex-column">
            <h2 class="animated bounceInUp mb-4">Réinitialisation du mot de passe Utilisateur</h2>
        </div>
    </div>
</div>
<div class="row justify-content-center" style="margin-top:50px">
    <div class="col-md-4 ml-3 mx-3 mb-perso">
        <!-- Form login -->
        <form class="animated bounceInUp" id="formResetPassword">

            <div class="md-form">
                <i class="fa fa-envelope prefix grey-text"></i>
                <input type="email" id="email_page_reset" name="email_page_reset" class="form-control" value="<?php echo $personne["personne_email"]; ?>" disabled>
                <label for="email_page_reset">e-mail</label>
            </div>

            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" id="password_page_reset" name="password_page_reset" class="form-control" value="">
                <label for="password_page_reset">nouveau mot de passe</label>
            </div>

            <div class="md-form">
                <i class="fa fa-lock prefix grey-text"></i>
                <input type="password" id="password_page_reset2" name="password_page_reset2" class="form-control" value="">
                <label for="password_page_reset2">votre mot de passe <i>(vérification)</i></label>
                <div class="invalid-feedback">
                    Le mot de passe doit être identique.
                </div>
            </div>

            <div class="text-center">
                <button class="btn btn-elegant" id="envoyer_page_reset">Modifier votre mot de passe</button>
            </div>
        </form>
        <!-- Form login -->
    </div>
</div>


