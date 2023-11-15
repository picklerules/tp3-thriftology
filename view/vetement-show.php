{{ include('header.php', {title: 'Détails du vêtement sélectionné'}) }}
<body>
<h1>Détails du vêtement</h1>
    <div class="table-container">
        <table>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Vendeur</th> 
                <th>Photo</th> 
                {% if guest==false%}
                <th>Supprimer</th> 
                {% endif %}
                {% if session.privilege == 1 or session.privilege == 2  %}
                <th>Modifier</th> 
                {% endif %}
            </tr>
            <tr>
                <td>{{ vetement.Nom }}</td>
                <td>{{ vetement.Description }}</td>
                <td>{{ vetement.Prix }}</td>
                <td>{{ nom }}</td> 
                <td><img src="{{path}}uploads/{{ vetement.file }}" alt="" width=50 height=50></td>
                {% if guest==false%}
                <td>
                    <form action="{{path}}vetement/destroy" method="post">
                        <input type="hidden" name="id" value="{{vetement.ID}}">
                        <input type="submit" value="Delete" class="btn">
                    </form>
                {% endif %}
                </td>
                {% if session.privilege == 1 or session.privilege == 2  %}
                <td> 
                    <a href="{{path}}vetement/edit/{{ vetement.ID }}" class="btn">Modifier</a></td>
                </tr>
                {% endif %}
        </table>
    </div>
</body>
</html>
