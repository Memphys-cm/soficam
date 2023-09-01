@can('imma_directe.avis', $imma_directe)
    @if ($imma_directe->next_step == 'Etat de cession enregistré auprès du géomètre')
        <a href="#" data-bs-placement="top" title="Enregistrer Le Geometre"
            wire:click.prevent="initData({{ $imma_directe->id }})" data-bs-toggle="modal" data-bs-target="#GeometreModal"
            draggable="false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-xs" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
            </svg>
        </a>
    @endif
@endcan

@can('imma_directe.avis', $imma_directe)
    @if ($imma_directe->next_step == 'Enregistrement du PV de Bornage')
        <a href="#" data-bs-placement="top" title="Enregistrer Le Pv de Bornage"
            wire:click.prevent="initData({{ $imma_directe->id }})" data-bs-toggle="modal" data-bs-target="#PvBornageModal"
            draggable="false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-xs" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
            </svg>
        </a>
    @endif
@endcan

@can('imma_directe.avis', $imma_directe)
    @if ($imma_directe->next_step == 'Mise en Forme du Dossier Technique')
        <a href="#" data-bs-placement="top" title="Mise en Forme du Dossier Technique"
            wire:click.prevent="initData({{ $imma_directe->id }})" data-bs-toggle="modal" data-bs-target="#DossierTechniqueModal"
            draggable="false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-xs" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
            </svg>
        </a>
    @endif
@endcan

@can('imma_directe.avis', $imma_directe)
    @if ($imma_directe->next_step == 'Mise en Forme du Dossier Administratif')
        <a href="#" data-bs-placement="top" title="Mise en Forme du Dossier Administratif"
            wire:click.prevent="initData({{ $imma_directe->id }})" data-bs-toggle="modal" data-bs-target="#DossierAdministratifModal"
            draggable="false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-xs" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
            </svg>
        </a>
    @endif
@endcan

@can('imma_directe.avis', $imma_directe)
    {{-- @if ($imma_directe->next_step == 'Mise en Forme du Dossier Administratif') --}}
        <a href="#" data-bs-placement="top" title="Creation Dossier Technique"
            wire:click.prevent="initData({{ $imma_directe->id }})" data-bs-toggle="modal" data-bs-target="#DossierTechniqueModal"
            draggable="false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-xs" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
            </svg>
        </a>
    {{-- @endif --}}
@endcan

@can('imma_directe.avis', $imma_directe)
    {{-- @if ($imma_directe->next_step == 'Mise en Forme du Dossier Administratif') --}}
        <a href="#" data-bs-placement="top" title="Descente sur le terrain"
            wire:click.prevent="initData({{ $imma_directe->id }})" data-bs-toggle="modal" data-bs-target="#DescenteTerrainModal"
            draggable="false">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="icon icon-xs" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 13.5l3 3m0 0l3-3m-3 3v-6m1.06-4.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
            </svg>
        </a>
    {{-- @endif --}}
@endcan