@extends('layouts.base')

@section('content')
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
                        data-bs-target="#staticBackdrop">
                        <i class="mdi mdi-plus"></i>Ajouter une marque
                    </button>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                            data-search="true" data-detail-formatter="detailFormatter" data-show-export="true"
                            data-export-types="['csv', 'excel', 'pdf', 'json']">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOM</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-primary btn-icon edit-brand"
                                                data-id="{{ $brand->id }}" style="margin-right: 1em"
                                                title="Modifier">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-inverse-danger btn-icon delete-brand"
                                                data-id="{{ $brand->id }}" title="Supprimer">
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

    <!-- Modal pour ajouter une marque -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter une marque</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="storeBrandForm">
                        @csrf
                        <div class="form-group">
                            <label for="nom">Nom de la marque</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
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

    <!-- Modal pour modifier une marque -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Modifier une marque</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editBrandForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="brand_id" name="brand_id">
                        <div class="form-group">
                            <label for="nom_edit">Nom de la marque</label>
                            <input type="text" class="form-control" id="nom_edit" name="nom" required>
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
            // Ajouter une marque
            $('#storeBrandForm').submit(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    url: "{{ route('brands.store') }}",
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#staticBackdrop').modal('hide');
                        Swal.fire('Succès', 'Marque ajoutée avec succès.', 'success');
                        location.reload();
                    },
                    error: function(xhr) {
                        Swal.fire('Erreur', 'Une erreur est survenue.', 'error');
                    }
                });
            });

            // Récupérer les données pour la modification
            $('.edit-brand').click(function() {
                var brandId = $(this).data('id');
                $.ajax({
                    url: "/brands/" + brandId + "/edit",
                    method: 'GET',
                    success: function(response) {
                        $('#brand_id').val(response.brand.id);
                        $('#nom_edit').val(response.brand.name);
                        $('#editModal').modal('show');
                    }
                });
            });

            // Modifier une marque
            $('#editBrandForm').submit(function(e) {
                e.preventDefault();
                var brandId = $('#brand_id').val();
                $.ajax({
                    url: "/brands/" + brandId,
                    method: 'PUT',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#editModal').modal('hide');
                        Swal.fire('Succès', 'Marque mise à jour.', 'success');
                        location.reload();
                    },
                    error: function(xhr) {
                        Swal.fire('Erreur', 'Une erreur est survenue.', 'error');
                    }
                });
            });

            // Supprimer une marque
            $('.delete-brand').click(function() {
                var brandId = $(this).data('id');
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
                            url: "/brands/" + brandId,
                            method: 'DELETE',
                            success: function(response) {
                                Swal.fire('Supprimé !', 'La marque a été supprimée.', 'success');
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
                    '<button type="button" class="btn btn-inverse-primary btn-icon edit-brand" data-id="' + row.id + '" style="margin-right: 1em" title="Modifier">',
                    '<i class="mdi mdi-pencil"></i>',
                    '</button>',
                    '<button type="button" class="btn btn-inverse-danger btn-icon delete-brand" data-id="' + row.id + '" title="Supprimer">',
                    '<i class="mdi mdi-trash-can-outline"></i>',
                    '</button>'
                ].join('');
            }

            // Événements pour les boutons d'actions
            window.operateEvents = {
                'click .edit-brand': function(e, value, row, index) {
                    e.preventDefault();
                    var brandId = row.id;
                    $.ajax({
                        url: "/brands/" + brandId + "/edit",
                        method: 'GET',
                        success: function(response) {
                            $('#').val(response.brand.id);
                            $('#nom_edit').val(response.brand.nom);
                            $('#editModal').modal('show');
                        }
                    });
                },
                'click .delete-brand': function(e, value, row, index) {
                    e.preventDefault();
                    var brandId = row.id;
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
                                url: "/brands/" + brandId,
                                method: 'DELETE',
                                success: function(response) {
                                    Swal.fire('Supprimé !', 'La marque a été supprimée.', 'success');
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
