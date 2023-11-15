{{ include('header.php', {title: 'Login'}) }}
<body>
    <div class="form-container">
        <form action="{{path}}login/auth" method="post">
            <h3>Login</h3>
            <span class="text-danger">{{ errors | raw }}</span>
            <label>Utilisateur
                <input type="text" name="nom" value="{{utilisateur.Nom}}">
            </label>
            <label>Mot de passe
                <input type="password" name="motdepasse" value="">
            </label>
            <input type="submit" value="Connecter" class="btn">
        </form>
    </div>
</body>
</html>