<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Bienvenue -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-800">Bonjour, {{ Auth::user()->name }} 👋</h1>
                <p class="text-gray-600 mt-1">Bienvenue sur ton espace personnel.</p>
            </div>

            <!-- Statistique + Action rapide -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Total des entrées -->
                <div class="bg-blue-100 text-blue-900 p-6 rounded-xl shadow">
                    <h3 class="text-lg font-semibold">Total des entrées</h3>
                    <p class="text-2xl font-bold mt-2">
                        {{ Auth::user()->journalEntries->count() ?? 0 }}
                    </p>
                </div>

                <!-- Dernière entrée -->
                <div class="bg-yellow-100 text-yellow-900 p-6 rounded-xl shadow">
                    <h3 class="text-lg font-semibold">Dernière entrée</h3>
                    <p class="mt-2 text-sm">
                        {{ optional(Auth::user()->journalEntries->last())->created_at?->format('d/m/Y H:i') ?? 'Aucune entrée' }}
                    </p>
                </div>

                <!-- Bouton d’ajout -->
                <div class="bg-green-100 text-green-900 p-6 rounded-xl shadow flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold">Nouvelle entrée</h3>
                        <p class="text-sm">Crée une nouvelle note</p>
                    </div>
                    <a href="{{ route('journal.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        ➕
                    </a>
                </div>
            </div>

            <!-- Liste des dernières entrées -->
            <div class="bg-white p-6 rounded-xl shadow">
                <h2 class="text-xl font-bold mb-4">Dernières entrées</h2>
                <ul class="space-y-2">
                    @forelse (Auth::user()->journalEntries->sortByDesc('created_at')->take(5) as $entry)
                        <li class="border-b pb-2">
                            <a href="{{ route('journal.show', $entry->id) }}" class="text-blue-600 hover:underline">
                                {{ $entry->title }}
                            </a>
                            <span class="text-sm text-gray-500">
                                ({{ $entry->created_at->format('d/m/Y') }})
                            </span>
                        </li>
                    @empty
                        <p class="text-gray-600">Aucune entrée pour le moment.</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>

