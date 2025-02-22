@extends('main')
@section('layout')
    <div class="row">
        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="d-flex align-items-center align-self-start">
                                <h1 class="mb-0">GESTION DES MARQUES</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des marques</h4>
                    <button type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal"
                        data-bs-target="#createModal">
                        <i class="mdi mdi-plus"></i> Enregistrer une marque
                    </button>

                    <div class="table-responsive">
                        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                            data-search="true" data-detail-formatter="detailFormatter">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th data-sortable="true"> NOM </th>
                                    <th> ACTIONS </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand['id'] }}</td>
                                        <td>{{ $brand['nom_marque'] }}</td>
                                        <td> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal d'ajout -->
    <div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createModalLabel">Enregistrement d'une marque</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-sample" id="store">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nom</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nom_marque" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" id="valider_store" class="btn btn-inverse-success">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de modification -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Modification d'une marque</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-sample" id="edit">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="id_edit" name="id_edit" />
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nom</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nom_marque_e" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" id="valider_edit" class="btn btn-inverse-primary">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $('#store').submit(function(e) {
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: "{{ route('brands.store') }}",
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({ icon: "success", title: "Enregistrement effectué.", timer: 4000 });
                    location.reload(true);
                },
                error: function() {
                    Swal.fire({ title: "Erreur lors de l'enregistrement", icon: "error", timer: 1500 });
                },
            });
        });

        $('#edit').submit(function(e) {
            e.preventDefault();
            var brandId = $('#id_edit').val();
            $.ajax({
                method: 'PUT',
                url: '/brands/' + brandId,
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({ icon: "success", title: "Mise à jour effectuée.", timer: 4000 });
                    location.reload(true);
                },
                error: function() {
                    Swal.fire({ title: "Erreur lors de la mise à jour", icon: "error", timer: 1500 });
                }
            });
        });

        function edit(id) {
            $.ajax({
                method: 'GET',
                url: '/brands/' + id + '/edit',
                success: function(response) {
                    var brand = response.brand;
                    $('#id_edit').val(brand.id);
                    $('#edit input[name="nom_marque_e"]').val(brand.nom_marque);
                    $('#editModal').modal('show');
                },
                error: function() {
                    Swal.fire({ title: "Erreur lors de la récupération des données", icon: "error", timer: 1500 });
                }
            });
        }

        function deleteBrand(id) {
            $.ajax({
                method: 'DELETE',
                url: '/brands/' + id,
                success: function(response) {
                    Swal.fire({ icon: "success", title: "Suppression effectuée.", timer: 3000 });
                    location.reload(true);
                },
                error: function() {
                    Swal.fire({ title: "Erreur lors de la suppression", icon: "error", timer: 1500 });
                }
            });
        }

        window.operateEvents = {
            'click #edit': function(e, value, row, index) { edit(row.id) },
            'click #delete': function(e, value, row, index) { deleteBrand(row.id) }
        };
    </script>
@endpush
