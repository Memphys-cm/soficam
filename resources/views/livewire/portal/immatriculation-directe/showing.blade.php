<div>

    <nav aria-label="breadcrumb" class="py-3">
        <ol class="breadcrumb bg-white px-3 py-2 rounded-pill shadow-lg">
            <li class="breadcrumb-item">
                <a href="#" class="text-decoration-none text-secondary d-flex align-items-center">
                    <i class="bi bi-house-door-fill me-2"></i>
                    <span class="fw-semibold">Accueil</span>
                </a>
            </li>
            <li class="breadcrumb-item active text-primary d-flex align-items-center" aria-current="page">
                <i class="bi bi-journal-text me-2"></i>
                <span class="fw-bold">Immatriculation Directe : {{ $imma_direct->reference }}</span>

                @if (!$imma_direct)
                    <span class="badge bg-secondary ms-3 d-flex align-items-center">
                        <i class="bi bi-hourglass-split me-1"></i> Non commencé
                    </span>
                @elseif($imma_direct->is_complete === 0)
                    <span class="badge bg-warning text-dark ms-3 d-flex align-items-center">
                        <i class="bi bi-hourglass-split me-1"></i> Procédure En Cours ...
                    </span>
                @elseif($imma_direct->is_complete === 1)
                    <span class="badge bg-success ms-3 d-flex align-items-center">
                        <i class="bi bi-check-circle me-1"></i> Terminée
                    </span>
                @endif
            </li>
        </ol>
    </nav>

    <x-alert />

    <livewire:checkout-imma_direct-wizard show-step="imma_direct-information-step" :imma_direct_id="$imma_direct->id" />
    {{-- Success is as dangerous as failure. --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('show-error-modal', event => {
                var evaluationReminderModal = new bootstrap.Modal(document.getElementById(
                    'errorModal'));
                evaluationReminderModal.show();
            });
        });
    </script>
</div>
