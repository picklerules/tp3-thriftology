{{ include('header.php', {title: 'Ajouter un utilisateur'}) }}
<body>
    <div class="form-container">
        <form action="{{path}}utilisateur/store" method="post">
            <span class="text-danger">{{ errors | raw }}</span>
            <label>Utilisateur
                <input type="text" name="nom" value="{{Utilisateurs.nom}}">
            </label>
            <label>Mot de passe
                <input type="password" name="motdepasse" value="">
            </label>
            <label>Privilege
                <select name="privilege_id">
                    <option value="">Selectionner un privilege</option>
                   {%  for privilege in privileges %}
                   <option value="{{ privilege.id}}" {% if privilege.id == Utilisateurs.privilege_id %} selected {% endif %}>{{ privilege.privilege }}</option>
                    {% endfor %}
                </select>
            </label>
            <input type="submit" value="sauvegarder" class="btn">
        </form>
    </div>
</body>
</html>