{{ include('header.php', {title: 'Modifier le vêtement'}) }}
<body>
    <div class="form-container">
        <form action="{{path}}vetement/update" method="post" enctype="multipart/form-data">
        <span class="text-danger">{{ errors | raw }}</span>
            <input type="hidden" name="id" value="{{ vetement.ID }}">
            <label>Nom
                <input type="text" name="nom" value="{{ vetement.Nom }}">
            </label>
            <label>Description
                <input type="text" name="description" value="{{ vetement.Description }}">
            </label>
            <label>Prix
                <input type="text" name="prix" value="{{ vetement.Prix }}">
            </label>
            <label>Vendeur
                <select name="id_vendeur">
                    {% for vendeur in vendeurs %}
                        <option value="{{ vendeur['ID'] }}" {% if vendeur['ID'] == vetement.ID_Vendeur %} selected {% endif %}>{{ vendeur['Nom'] }}</option>
                    {% endfor %}
                </select>
            </label>
            <label>Image du vêtement
                <input type="file" name="fileToUpload" id="fileToUpload" >
            </label>
            <input type="submit" value="Save" class="btn">
        </form>
    </div>
</body>
</html>
