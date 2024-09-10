<div>

    <main class="container text-center mt-5">
        <h1>AUTHENTIFICATION DES DOCUMENTS</h1>
        <a href="#" class="btn  text-primary pt-0 mt-0 fs-4 fw-bold  w-100">
            Vérifier un paiement eGUCE</a>
        <a href="#" class="btn text-primary pt-0 mt-0 fs-4 fw-bold  w-100">
            Vérifier un paiement Orange Money</a>
        <a href="#" class=" pt-0 btn text-primary mt-0 fs-4 fw-bold  w-100">
            Vérifier un paiement Mobile Money (Bientôt)</a>

        <x-form-items.form wire:submit="store" class="d-flex align-items-center justify-content-center pt-3">
            <div class="form-group mb-3">
                <label for="" class="fs-4">Type de document :</label>
                <select name=""  class="form-control" id="">
                    <option value="">Avis D'imposition validé</option>
                    <option value="">Paiement/Quittance</option>
                    <option value="">Decompte</option>
                    <option value="">Attestion d'immatriculation</option>
                    <option value="">Numero d'etablissement</option>
                    <option value="">Taxe Fonciere</option>
                </select>
            </div>
            <div class="form-group px-4 mb-3">
                <label for="" class="fs-4">N° de référence :</label>
                <input type="text" class="form-control"/>
            </div>
            <a href="{{route('impot.certificat_pay')}}"  class="btn btn-primary " style="height: 50px" wire:loading.attr="disabled">Verifier </a>
        </x-form-items.form>
    </main>
</div>
