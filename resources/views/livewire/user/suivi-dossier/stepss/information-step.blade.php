<div>
    <div class="container my-5 mx-2 rounded" style="background: white;">
        <div class="row g-4">
            <!-- Référence -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-upc-scan display-6 text-success"></i>
                    </div>
                    <h5 class="fw-bold">Référence</h5>
                    <p class="mb-0">{{ $immatriculations->reference }}</p>
                </div>
            </div>

            <!-- Statut -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-bookmark-star display-6 text-warning"></i>
                    </div>
                    <h5 class="fw-bold">Statut</h5>
                    <p class="mb-0">
                        <span class="badge bg-{{ $immatriculations->StatutStyle }}">{{ $immatriculations->statut }}</span>
                    </p>
                </div>
            </div>

            <!-- Prochaine Étape -->
            <div class="col-md-6 col-lg-4">
                <div class="p-4 bg-light rounded shadow-sm h-100 d-flex flex-column">
                    <div class="mb-3 text-primary">
                        <i class="bi bi-arrow-right-circle display-6 text-info"></i>
                    </div>
                    <h5 class="fw-bold">Prochaine Étape</h5>
                    <p class="mb-0 badge bg-primary">{{ $immatriculations->next_step }}</p>
                </div>
            </div>

            @error('service_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="d-flex justify-content-start ms-2">
    </div>
</div>
