<!DOCTYPE html>
<html>
<head>
    <title>Modifier une entrée</title>
</head>
<body>
    <h1>Modifier l'entrée</h1>

    <form method="POST" action="{{ route('entries.update', $entry->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="titre">Titre :</label><br>
        <input type="text" id="titre" name="titre" value="{{ old('titre', $entry->titre) }}" required><br><br>

        <label for="contenu">Contenu :</label><br>
        <textarea id="contenu" name="contenu" rows="5" required>{{ old('contenu', $entry->contenu) }}</textarea><br><br>

        <label for="humeur">Humeur (facultatif) :</label><br>
        <input type="text" id="humeur" name="humeur"
