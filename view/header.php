<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>{{ title }}</title>
                <link rel="stylesheet" href="{{path}}assets/css/style.css">
            </head>
            <body>
                <header>
                    <img src="{{path}}assets/img/banner.png" alt="Thriftology banner" class="banner">
                    <nav>
                        <ul>
                            <li><a href="{{path}}">Accueil</a></li>
                            <li><a href="{{path}}vetement/index">Vêtements</a></li>
                            <li><a href="#">À propos</a></li>
                            {% if guest %}
                            <li><a href="{{path}}login">Login</a></li>
                            {% else %}
                            <li><a href="{{path}}vetement/create">Ajouter vêtements</a></li>
                            {% if session.privilege == 1 %}
                            <li><a href="{{path}}utilisateur">Utilisateurs</a></li>
                            <li><a href="{{path}}log">Journal de bord</a></li>
                            {% endif %}
                            <li><a href="{{path}}login/logout">Logout</a></li>
                            {% endif %}

                        </ul>
                     </nav>
                     {% if session.privilege == 1 or session.privilege == 2 %}
                     <p class="session-nom">Bonjour {{ session.nom }} !</p>
                     {% endif %}
                </header>