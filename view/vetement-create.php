{{ include('header.php', {title: 'Ajouter un vêtement'}) }}
<body>
    <div class="form-container">
        <form action="{{path}}vetement/store" method="post" enctype="multipart/form-data">
        <span class="text-danger">{{ errors | raw }}</span>
            <label>Nom
                <input type="text" name="nom">
            </label>
            <label>Description
                <input type="text" name="description">
            </label>
            <label>Prix
                <input type="text" name="prix">
            </label>
            <label>Vendeur
                <select name="id_vendeur">
                {% for vendeur in vendeurs %}
                    <option value="{{ vendeur['ID'] }}">{{ vendeur['Nom'] }}</option>
                {% endfor %}
                </select>
            </label>
            <label>Image du vêtement
                <input type="file" name="fileToUpload" id="fileToUpload">
            </label>
            <input type="submit" value="Save" class="btn">
        </form>
        
    </div>
</body>
</html>
