@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="d-flex align-items-center align-self-start">
                                <h1 class="mb-0">GESTION DES SÉRIES</h1>
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
                    <h4 class="card-title">Liste des séries</h4>
                    <button type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <i class="mdi mdi-plus"></i>Ajouter une série
                    </button>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                            data-search="true" data-detail-formatter="detailFormatter" data-show-export="true"
                            data-export-types="['csv', 'excel', 'pdf', 'json']">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOM</th>
                                    <th>RECETTE</th>
                                    <th>MARQUE</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($series as $serie)
                                    <tr>
                                        <td>{{ $serie->id }}</td>
                                        <td>{{ $serie->name }}</td>
                                        <td>{{ $serie->recipe }}</td>
                                        <td>{{ $serie->brand->name }}</td> <!-- Afficher le nom de la marque -->
                                        <td>
                                            <button type="button" class="btn btn-inverse-primary btn-icon edit-serie"
                                                data-id="{{ $serie->id }}" style="margin-right: 1em"
                                                title="Modifier">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-inverse-danger btn-icon delete-serie"
                                                data-id="{{ $serie->id }}" title="Supprimer">
                                                <i class="mdi mdi-trash-can-outline"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour ajouter une série -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter une série</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="storeSerieForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="name">Nom</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="recipe">Recette</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="recipe" id="recipe" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="brand">Marque</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single" id="brand" name="brand" style="width:100%">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-inverse-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-inverse-success">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour modifier une série -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Modifier une série</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editSerieForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="serie_id" name="serie_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="name_e">Nom de la série</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name_e" id="name_e" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="recipe_e">Recette</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="recipe_e" name="recipe_e" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="brand_e">Marque</label>
                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single" id="brand_e" name="brand_e" style="width:100%">
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-inverse-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-inverse-primary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#brand_e').select2({
                dropdownParent: $('#staticBackdrop')
            });
            $('#brand_e').select2({
                dropdownParent: $('#editModal')
            });

            // Ajouter une série
        $('#storeSerieForm').submit(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $.ajax({
                url: "{{ route('series.store') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#staticBackdrop').modal('hide');
                    Swal.fire('Succès', 'Série ajoutée avec succès.', 'success');
                    location.reload();
                },
                error: function(xhr) {
                    Swal.fire('Erreur', 'Une erreur est survenue.', 'error');
                }
            });
        });

        $('.edit-serie').click(function() {
            var serieId = $(this).data('id');
            $.ajax({
                url: "/series/" + serieId + "/edit",
                method: 'GET',
                success: function(response) {
                    $('#serie_id').val(response.serie.id);
                    $('#name_e').val(response.serie.name);
                    $('#recipe_e').val(response.serie.recipe);
                    $('#brand_e').val(response.brand.name);
                    $('#editModal').modal('show');
                }
            });
        });

        // Modifier une série
        $('#editSerieForm').submit(function(e) {
            e.preventDefault();
            var serieId = $('#serie_id').val();
            $.ajax({
                url: "/series/" + serieId,
                method: 'PUT',
                data: $(this).serialize(),
                success: function(response) {
                    $('#editModal').modal('hide');
                    Swal.fire('Succès', 'Série mise à jour.', 'success');
                    location.reload();
                },
                error: function(xhr) {
                    Swal.fire('Erreur', 'Une erreur est survenue.', 'error');
                }
            });
        });
        $('.delete-serie').click(function() {
            var serieId = $(this).data('id');
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Vous ne pourrez pas revenir en arrière !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer !'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        }
                    });
                    $.ajax({
                        url: "/series/" + serieId,
                        method: 'DELETE',
                        success: function(response) {
                            Swal.fire('Supprimé !', 'La série a été supprimée.', 'success');
                            location.reload();
                        }
                    });
                }
            });
        });

         // Initialisation du tableau avec Bootstrap Table
         function initTable() {
            $('#table').bootstrapTable('destroy').bootstrapTable({
                pagination: true,
                search: true,
                showExport: true,
                exportTypes: ['csv', 'excel', 'pdf', 'json'],
                columns: [{
                        field: 'id',
                        title: 'ID',
                        align: 'center',
                        sortable: true
                    },
                    {
                        field: 'nom',
                        title: 'NOM',
                        align: 'center',
                        sortable: true
                    },
                    {
                        field: 'recette',
                        title: 'RECETTE',
                        align: 'center',
                        sortable: true
                    },
                    {
                        field: 'marque',
                        title: 'MARQUE',
                        align: 'center',
                        sortable: true
                    },
                    {
                        field: 'actions',
                        title: 'ACTIONS',
                        align: 'center',
                        formatter: operateFormatter,
                        events: operateEvents
                    }
                ]
            });
        }

        // Formatter pour les boutons d'actions
        function operateFormatter(value, row, index) {
            return [
                '<button type="button" class="btn btn-inverse-primary btn-icon edit-serie" data-id="' + row.id + '" style="margin-right: 1em" title="Modifier">',
                '<i class="mdi mdi-pencil"></i>',
                '</button>',
                '<button type="button" class="btn btn-inverse-danger btn-icon delete-serie" data-id="' + row.id + '" title="Supprimer">',
                '<i class="mdi mdi-trash-can-outline"></i>',
                '</button>'
            ].join('');
        }
        // Événements pour les boutons d'actions
        window.operateEvents = {
            'click .edit-serie': function(e, value, row, index) {
                e.preventDefault();
                var serieId = row.id;
                $.ajax({
                    url: "/series/" + serieId + "/edit",
                    method: 'GET',
                    success: function(response) {
                        $('#').val(response.brand.id);
                        $('#serie_id').val(response.serie.id);
                        $('#name_e').val(response.serie.name);
                        $('#recipe_e').val(response.serie.recipe);
                        $('#brand_e').val(response.brand.name);
                        $('#editModal').modal('show');
                    }
                });
            },
            'click .delete-serie': function(e, value, row, index) {
                e.preventDefault();
                var serieId = row.id;
                Swal.fire({
                    title: 'Êtes-vous sûr ?',
                    text: "Vous ne pourrez pas revenir en arrière !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, supprimer !'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/series/" + serieId,
                            method: 'DELETE',
                            success: function(response) {
                                Swal.fire('Supprimé !', 'La série a été supprimée.', 'success');
                                location.reload();
                            }
                        });
                    }
                });
            }
        };
         // Initialiser le tableau au chargement de la page
         initTable();
        });
    </script>
@endpush
