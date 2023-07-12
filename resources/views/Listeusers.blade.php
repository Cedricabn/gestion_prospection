@extends('layouts/master')
@section('contenu')

<div class="container">
    <div class="border border-dark mx-3 text-dark rounded shadow-lg justify-content-between">
        <div>
        </div>
        <div>
            <br>
            <div class="align-items-center mb-2">
                <center>
                    <h3 class="text-decoration-underline">Liste des utilisateurs</h3>
                </center>
            </div>

            <br> <br>
            <div class="row justify-content-center">
                @foreach($liste_users as $user)

                <div class="col-md-6 ">
                    <div class="border border-dark rounded p-4">
                        <div class="row">
                            <div class="col-4 text-center align-self-center">
                                <i class="fas fa-user-secret fa-5x text-primary"></i>
                            </div>
                            <div class="col-8">
                                <div class="text-primary">
                                    <i class="fas fa-info-circle"></i>&nbsp; Nom de l'utilisateur:
                                    <br>
                                    {{  $user->name }}
                                </div>

                                <br>
                                <br>
                                <br>
                                <br>
                                <div class="text-primary" style="word-break: break-word;">
                                    <i class="fas fa-info-circle"></i>&nbsp; Email de l'utilisateur:
                                    <br>
                                    {{  $user->email }}
                                </div>
                                <br>
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modifyModal">Modifier</button>
                            </div>
                        </div>
                    </div> <br>
                </div>
                <br> <br>
                @endforeach
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modifyModal" tabindex="-1" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <form method="post" action='{{ route('user.editer',['user'=>$user->id]) }}'>
    @csrf
    @method('PUT')
  <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modifyModalLabel">Administrateur?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <input type="checkbox" name="is_admin" value="1" {{ $user->administrateur ? 'checked' : '' }}  onclick="uncheckOther(this)"> Oui
                    <input type="checkbox" name="is_admin" value="0" {{ !$user->administrateur ? 'checked' : '' }}  onclick="uncheckOther(this)"> Non
            </div>
           
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
           
        </div>
    </div>
  </form>
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

@endsection
