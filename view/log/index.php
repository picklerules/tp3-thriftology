{{ include('header.php', {title: 'Log'}) }}
<body>
    <h1>Journal de bord</h1>
    <div class="table-container">
        <table>
            <tr>
                <th>Adresse IP</th>
                <th>Date</th>
                <th>Utilisateur</th>
                <th>Page visitée</th>
            </tr>
            {% for log in logs %}
            <tr>
                <td>{{ log.adresseIP }}</td>
                <td>{{ log.date }}</td>
                <td>{{ log.utilisateur }}</td>
                <td>{{ log.pageVisitee }}</td>
            </tr>
            {% endfor %}
        </table>
    </div>
</body>
</html>
