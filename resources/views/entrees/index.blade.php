<!DOCTYPE html>
<html>
<head>
    <title>Mon Journal - Accueil</title>
</head>
<body>
    <h1>Mes Entrées</h1>

    <a href="{{ route('entries.create') }}">+ Ajouter une entrée</a>

    @if(count($entries) > 0)
        <ul>
            @foreach ($entries as $entry)
                <li>
                    <a href="{{ route('entries.show', $entry->id) }}">{{ $entry->titre }}</a>
                    - {{ $entry->created_at->format('d/m/Y') }}
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune entrée pour le moment.</p>
    @endif
</body>
</html>
