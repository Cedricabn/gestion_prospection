@extends('layouts.master')
@section('contenu')

<center> Ajouter un nouveau prospect</center>
<div class="border border-dark rounded">
    <div class="border border-dark rounded mx-2 my-2">
        <br>
        <center>
            <div class="fas fa-info text-primary justify-content-center"> Informations du nouveau prospect</div>
        </center>
        <br>
        <form method="post" action="#">
            @csrf
            @method('PUT')
            <div class="border border-dark rounded mx-2 my-2">
                <br>
                <center> Entrez les informations suivantes: </center>
                <br>
                <br>
                <div class="row">
                    <div class="col-6">
                        <label for="NomAgent" class="form-label col-12">
                            <input type="text" class="form-control" name="agent_nom" id="agent_nom"
                                value="">
                        </label>
                    </div>
                    <div class="col-6">
                        <label for="NomClient" class="form-label col-12">
                            <input type="text" class="form-control" name="client_nom" id="client_nom"
                                value="">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="AdresseClient" class="form-label col-12">
                            <input type="text" class="form-control" name="client_adresse" id="client_adresse"
                                value="">
                        </label>
                    </div>
                    <div class="col-6">
                        <label for="Date" class="form-label col-12">
                            <input type="date" class="form-control" name="date" id="date" value="">
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="Heure de debut" class="form-label col-12"> Heure de début
                            <input type="time" class="form-control" name="heure_debut" id="heure_debut"
                                value="">
                        </label>
                    </div>
                    <div class="col-6">
                        <label for="Heure de fin" class="form-label col-12"> Heure de fin
                            <input type="time" class="form-control" name="heure_fin" id="heure_fin"
                                value="">
                        </label>
                        <span id="heure-fin-error" class="text-danger"></span>

                    </div>
                </div>


                <div class="row">
                    <div class="col-6">
                        <label for="Produit" class="form-label col-12">
                            <select name="produit_presente" id="produit_presente" class="form-control" required>
                                <option value="}"></option>
                                <option value="Table">Table</option>
                                <option value="Chaise">Chaise</option>
                                <option value="Ordinateur">Ordinateur</option>
                                <option value="Ecran">Ecran</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="observations" class="form-label col-12">
                            <textarea name="observations" id="observations" class="form-control" rows="3"
                                placeholder=""></textarea>
                        </label>
                    </div>

                    <div class="col-6">
                        <label for="vente-conclue" class="form-label col-12">Vente conclue ?</label> <br>
                        <input type="checkbox" id="vente-oui" name="vente-conclue" value="oui"
                            @if(1 === 1) checked @endif
                        onclick="uncheckOther(this)">
                        <label for="vente-oui">Oui</label> <br>
                        <input type="checkbox" id="vente-non" name="vente-conclue" value="non"
                            @if(0 === 0) checked @endif
                        onclick="uncheckOther(this)">
                        <label for="vente-non">Non</label>
                    </div>
                </div>
                <br>
            </div>
            <script>
                function uncheckOther(checkbox) {
                    var checkboxes = document.getElementsByName(checkbox.name);
                    checkboxes.forEach(function (item) {
                        if (item !== checkbox) {
                            item.checked = false;
                        }
                    });
                }

            </script>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    var heureDebutInput = document.getElementById("heure_debut");
                    var heureFinInput = document.getElementById("heure_fin");
                    var heureFinError = document.getElementById("heure-fin-error");

                    heureDebutInput.addEventListener("change", function () {
                        if (heureFinInput.value !== "" && heureDebutInput.value > heureFinInput.value) {
                            heureFinInput.value = "";
                            heureFinError.textContent =
                                "L'heure de fin doit être supérieure à l'heure de début.";
                        } else {
                            heureFinError.textContent = "";
                        }
                        heureFinInput.min = heureDebutInput.value;
                    });

                    heureFinInput.addEventListener("change", function () {
                        if (heureDebutInput.value !== "" && heureFinInput.value < heureDebutInput
                            .value) {
                            heureFinInput.value = "";
                            heureFinError.textContent =
                                "L'heure de fin doit être supérieure à l'heure de début.";
                        } else {
                            heureFinError.textContent = "";
                        }
                    });
                });

            </script>

            <div class="col-md-12 d-flex justify-content-end">
                <a href="javascript:history.back()">
                    <button type="" class="bg-danger border border-dark rounded mx-4 pt-1 pb-1 fas fa-times ">
                        Annuler
                    </button> </a>
                <button type="submit" class="bg-primary border border-dark rounded pt-1 pb-1 fas fa-save">
                    Enregistrer</button>
            </div>
        </form>
    </div>
    <br>
</div>
<br>

@endsection
