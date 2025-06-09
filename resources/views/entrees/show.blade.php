<!DOCTYPE html>
<html>
<head>
    <title>{{ $entry->titre }}</title>
</head>
<body>
    <h1>{{ $entry->titre }}</h1>

    <p><em>Publié le {{ $entry->created_at->format('d/m/Y') }}</em></p>

    <p>{{ $entry->contenu }}</p>

    @if($entry->humeur)
        <p><strong>Humeur :</strong> {{ $entry->humeur }}</p>
    @endif

    @if($entry->image)
        <img src="{{ asset('storage/' . $entry->image) }}" alt="Image de l'entrée" style="max-width:300px;">
    @endif

    <p><a href="{{ route('entries.index') }}">Retour à la liste</a></p>
</body>
</html>
