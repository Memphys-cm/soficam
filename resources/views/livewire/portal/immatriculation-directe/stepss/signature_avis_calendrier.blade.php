<div class="container my-4">
    <div class="shadow-lg rounded p-4 bg-white">
        <h4 class="mb-4 fw-bold text-primary">{{ __('Statut après publication d\'avis') }}</h4>

        @php
            $visibility = '';
        @endphp

        @if (!$imma_directe->numero_ordre_versement)
            @php
                $visibility = 'disabled';
            @endphp
        @endif

        <x-form-items.form wire:submit="signatureAvisCalendrier">

            <div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="statusSwitch" wire:model="status_apres_publication" {{ $visibility }}>
                    <label class="form-check-label" for="statusSwitch">Statut après publication d'avis</label>
                    @error('status_apres_publication')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="statusDate" class="form-label">Date du Statut après publication d'avis</label>
                    <input type="date" class="form-control" id="statusDate" wire:model="status_apres_publication_date" {{ $visibility }}>
                    @error('status_apres_publication_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="calendarSwitch" wire:model="calendarDecision" @if(!$status_apres_publication) disabled @endif>
                    <label class="form-check-label" for="calendarSwitch">Décision portant calendrier de descente sur terrain</label>
                    @error('calendarDecision')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="calendarDecisionDate" class="form-label">Date de la Décision concernant le calendrier</label>
                    <input type="date" class="form-control" id="calendarDecisionDate" wire:model="calendarDecision_date" @if(!$status_apres_publication) disabled @endif>
                    @error('calendarDecision_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

        </x-form-items.form>

        <!-- Script pour activer les tooltips Bootstrap -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });
        </script>

        <div class="d-flex justify-content-end">
            <button class="btn btn-secondary" wire:click.prevent="prevStep"> {{ __('<< Précedent') }} </button>
            <button class="btn btn-primary mx-2" wire:click.prevent="signatureAvisCalendrier" {{ $visibility }}> {{ __('Enregistrer') }} </button>
            <button class="btn btn-info" wire:click.prevent="nextStep"> {{ __('Suivant >>') }} </button>
        </div>
    </div>
</div>

<!-- Script pour activer les tooltips Bootstrap -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
