<div>
    <ul>
        @foreach ($titresFonciers as $titreFoncier)
            <li>{{ $titreFoncier->numero_titre_foncier }}</li> {{-- Assurez-vous d'ajuster le nom du champ en fonction de votre modèle TitreFoncier --}}
        @endforeach
    </ul>
</div>