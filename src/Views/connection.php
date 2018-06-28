<?php
function connection(){
?>
    <div class="container">
        <div class="connection">
            <h1>Connection</h1>        
            <form>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
<?php
}
?>