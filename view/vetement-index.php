{{ include('header.php', {title: 'Liste des vêtements'}) }}
<body>
    <h1>Vêtements</h1>
    <div class="table-container">
        <table>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Vendeur</th> 
                <th>Photo</th> 
                {% if guest==false%}
                    <th>Delete</th>
                {% endif %}
            </tr>
            {% for vetement in vetements %}
                <tr>
                    <td><a href="{{path}}vetement/show/{{ vetement.ID }}">{{ vetement.Nom }}</a></td>
                    <td>{{ vetement.Description }}</td>
                    <td>{{ vetement.Prix }}</td>
                    <td>{{ vetement.NomVendeur }}</td>
                    <td><img src="{{path}}uploads/{{ vetement.file }}" alt="" width=50 height=50></td> 
                    {% if guest==false%}
                        <td>
                            <form action="{{path}}vetement/destroy" method="post">
                                <input type="hidden" name="id" value="{{vetement.ID}}">
                                <input type="submit" value="Delete" class="btn">
                            </form>
                        </td>
                    {% endif %}
                </tr>
            {% endfor %}
        </table>
    </div>
    {% if session.privilege == 1 or session.privilege == 2  %}
    <a href="{{path}}vetement/create" class="btn-add">Ajouter un vêtement</a>
    {% endif %}
</body>
</html>
