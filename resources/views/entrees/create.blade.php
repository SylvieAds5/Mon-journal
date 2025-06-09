<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle entrée</title>
</head>
<body>
    <h1>Ajouter une entrée</h1>

    <form method="POST" action="{{ route('entries.store') }}" enctype="multipart/form-data">
        @csrf

        <label for="titre">Titre :</label><br>
        <input type="text" id="titre" name="titre" value="{{ old('titre') }}" required><br><br>

        <label for="contenu">Contenu :</label><br>
        <textarea id="contenu" name="contenu" rows="5" required>{{ old('contenu') }}</textarea><br><br>

        <label for="humeur">Humeur (facultatif) :</label><br>
        <input type="text" id="humeur" name="humeur" value="{{ old('humeur') }}"><br><br>

        <label for="est_publique">Rendre cette entrée publique ?</label>
        <input type="checkbox" id="est_publique" name="est_publique" value="1" {{ old('est_publique') ? 'checked' : '' }}><br><br>

        <label for="image">Image (facultatif) :</label><br>
        <input type="file" id="image" name="image"><br><br>

        <button type="submit">Enregistrer</button>
    </form>

    <a href="{{ route('entries.index') }}">Retour à la liste</a>
</body>
</html>
