<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Acces Patenaire - MIC</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    @include('components.css')
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/5.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @include('components.nav')
    <main id="main">
        <div class="text-center container p-5">
            @if (session('success'))
                <div class="alert alert-success text-start" role="alert"><strong>{{ session('success') }}</strong>
                </div>
            @endif
            @error('titre')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
            @error('resume')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
            @error('date')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
            @error('importance')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
            @error('type')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
            @error('img')
                <div class="alert alert-danger text-start" role="alert"><strong>{{ $message }}</strong></div>
            @enderror
            <div class="justify-content-center row">
                <div class="card card-body col-sm-12 col-md-10 bg-light align-self-center">
                    <h1 class="m-md-5" style="font-size: 40px;">Actualit??s</h1>
                    <div class="row pb-5">
                        <div class="pb-3 align-self-center col-sm-12 col-md-8 offset-md-1">
                            <form action="/acces_partenaire/actualites" method="get">
                                <input class="form-control" type="text" name="q"
                                    placeholder="Rechercher une actualit??">
                            </form>
                        </div>
                        <div class="pb-3 col-sm-12 col-md-2 d-grid gap-2">
                            <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-toggle="modal"
                                data-bs-target="#add_actualite">
                                Ajouter une actualit??
                            </button>
                        </div>
                    </div>


                    <div class="modal fade" id="add_actualite" tabindex="-1" aria-labelledby="add_actualite_label"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="add_actualite_label"><b>Ajouter une nouvelle
                                            actualite</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="container-fluid" id="grad1">
                                    <div class="row justify-content-center w-100 mt-0">
                                        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center px-5 mt-3 mb-2 w-100">
                                            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                                {{-- <h2><strong>Remplissez tous les champs du formulaire pour passer ??
                                                        l'??tape suivante</strong></h2> --}}
                                                <div class="row">
                                                    <div class="col-md-12 mx-0">
                                                        <form id="msform" class="msform" method="post"
                                                            action="/acces_partenaire/actualites/create"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <ul id="progressbar" class="d-flex justify-content-center">

                                                                <li class="fas fa-edit active">

                                                                    <strong>Ajouter
                                                                        titre</strong>
                                                                </li>
                                                                <li class="fas fa-edit"><strong>Ajouter
                                                                        resume</strong></li>
                                                                <li class="fas fa-edit"><strong>Ajouter plus
                                                                        d'info</strong>
                                                                </li>

                                                            </ul>


                                                            <!-- fieldsets -->
                                                            <fieldset>
                                                                <div class="">
                                                                    <h2 class="fs-title">Titre</h2>
                                                                    <div class="mb-3 row">

                                                                        <div class="">
                                                                            <input type="text" name="titre"
                                                                                id="add_titre" class="form-control"
                                                                                placeholder="enter le titre">
                                                                        </div>
                                                                        <div class="alert alert-danger"
                                                                            id="add_titre_err" role="alert">
                                                                            Veulliez saisir le titre !
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <input type="button" name="next"
                                                                    onclick="validerTitre()" class="next action-button"
                                                                    value="Suivant" />
                                                            </fieldset>

                                                            <fieldset>
                                                                <div class="">
                                                                    <h2 class="fs-title">resume</h2>
                                                                    <div class="alert alert-danger" id="add_resume_err"
                                                                        role="alert">
                                                                        Le r??sum?? doit contenir au moins
                                                                        130??caract??res!!
                                                                    </div>
                                                                    <div class="">
                                                                        <textarea type="text" name="resume"
                                                                            id="add_resume"
                                                                            class="form-control"></textarea>

                                                                        <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
                                                                        <script>
                                                                            tinymce.init({
                                                                                selector: '#add_resume',
                                                                                entity_encoding: 'raw',
                                                                                height: 300,
                                                                                plugins: [
                                                                                    'advlist autolink lists link charmap print preview anchor',
                                                                                    'searchreplace visualblocks code fullscreen',
                                                                                    'insertdatetime media table paste code help wordcount'
                                                                                ],
                                                                                toolbar: 'undo redo | formatselect | ' +
                                                                                    'bold italic backcolor | alignleft aligncenter ' +
                                                                                    'alignright alignjustify | bullist numlist outdent indent | ' +
                                                                                    'removeformat | help',
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                                <input type="button" name="previous"
                                                                    class="previous action-button-previous"
                                                                    value="Pr??c??dent" />
                                                                <input type="button" name="next"
                                                                    onclick="validerResume()" class="next action-button"
                                                                    value="Suivant" />
                                                            </fieldset>
                                                            <fieldset>
                                                                <div class="">
                                                                    <h2 class="fs-title">info</h2>
                                                                    <div class="mb-3 row">
                                                                        <div class="alert alert-danger" id="add_img_err"
                                                                            role="alert">
                                                                            Ajouter une image !
                                                                        </div>

                                                                        <label
                                                                            class="col-sm-3 col-form-label">Image</label>
                                                                        <div class="col-sm-8">
                                                                            <input class="form-control mb-0"
                                                                                accept="image/*" id="add_img"
                                                                                type="file" name="img" required>
                                                                            <small>Il est pr??f??rable d'ajouter une image
                                                                                de taille (1280x720) !</small>
                                                                            {{-- <small style="font-size: 10px;">Veulliez
                                                                                utiliser des photos de dimention
                                                                                1028px*720px</small> --}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Type</label>



                                                                        <div class="col-sm-8">

                                                                            <div class="row">
                                                                                <div class="col-1">

                                                                                    <input id="actualite" checked
                                                                                        class="custom-control-input "
                                                                                        type="radio" name="type"
                                                                                        value="actualite">
                                                                                </div>
                                                                                <div class="col-5 text-start">
                                                                                    <label
                                                                                        class="form-label ">Actualit??</label>
                                                                                </div>

                                                                                <div class="col-1">
                                                                                    <input id="evenement"
                                                                                        class="custom-control-input"
                                                                                        type="radio" name="type"
                                                                                        value="evenement">
                                                                                </div>
                                                                                <div class="col-5 text-start">
                                                                                    <label
                                                                                        class="form-check-label">??v??nement</label>
                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Importance</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-select"
                                                                                name="importance">
                                                                                <option value="1" selected>1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="3">4</option>
                                                                                <option value="3">5</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Date</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="date" name="date"
                                                                                class="form-control"
                                                                                value="<?php echo date('Y-m-d'); ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input type="button" name="previous"
                                                                    class="previous action-button-previous"
                                                                    value="Pr??c??dent" />
                                                                <button type="submit" onclick="return verifierImg();"
                                                                    class="next action-button w-25">Ajouter
                                                                    l'actualit??</button>
                                                            </fieldset>
                                                            {{-- <fieldset>
                                                                <div class="form-card">
                                                                    <h2 class="fs-title text-center">Success !</h2>
                                                                    <br><br>
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-3"> <img
                                                                                src="https://img.icons8.com/color/96/000000/ok--v2.png"
                                                                                class="fit-image"> </div>
                                                                    </div> <br><br>
                                                                    <div class="row justify-content-center">
                                                                        <div class="col-7 text-center">
                                                                            <h5>You Have Successfully Signed Up</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset> --}}
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- update actualite Modal -->

                    <div class="modal fade" id="update_actualite" tabindex="-1"
                        aria-labelledby="update_actualite_label" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="add_actualite_label"><b>Modifier l'actualite</b></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="container-fluid" id="grad1">
                                    <div class="row justify-content-center w-100 mt-0">
                                        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center px-5 mt-3 mb-2 w-100">
                                            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                                <h2><strong>Remplissez tous les champs du formulaire pour passer ??
                                                        l'??tape suivante</strong></h2>
                                                <div class="row">
                                                    <div class="col-md-12 mx-0">
                                                        <form id="update_form" class="form-outline msform" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <ul id="progressbar" class="d-flex justify-content-center">

                                                                <li class="active fas fa-edit" id="titre_li">
                                                                    <strong>Modifier
                                                                        titre</strong>
                                                                </li>
                                                                <li id="resume_li" class="fas fa-edit">
                                                                    <strong>Modifier resume</strong>
                                                                </li>
                                                                <li id="info_li" class="fas fa-edit"><strong>Modifier
                                                                        les infos</strong>
                                                                </li>

                                                            </ul>
                                                            <!-- fieldsets -->
                                                            <fieldset id="f_titre">
                                                                <div class="">
                                                                    <h2 class="fs-title">Titre</h2>
                                                                    <div class="mb-3 row">

                                                                        <div class="">
                                                                            <input type="text" id="edit_titre"
                                                                                name="titre" class="form-control"
                                                                                placeholder="enter le titre">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <input type="button" name="next"
                                                                    class="next action-button" value="Suivant" />
                                                            </fieldset>

                                                            <fieldset id="f_resume">
                                                                <div class="">
                                                                    <h2 class="fs-title">resume</h2>
                                                                    <div class="">
                                                                        <textarea type="text" id="edit_resume"
                                                                            name="resume"
                                                                            class="form-control"></textarea>

                                                                        {{-- <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script> --}}
                                                                        <script>
                                                                            tinymce.init({
                                                                                selector: '#edit_resume',
                                                                                entity_encoding: 'raw',
                                                                                height: 300,
                                                                                plugins: [
                                                                                    'advlist autolink lists link charmap print preview anchor',
                                                                                    'searchreplace visualblocks code fullscreen',
                                                                                    'insertdatetime media table paste code help wordcount'
                                                                                ],
                                                                                toolbar: 'undo redo | formatselect | ' +
                                                                                    'bold italic backcolor | alignleft aligncenter ' +
                                                                                    'alignright alignjustify | bullist numlist outdent indent | ' +
                                                                                    'removeformat | help',
                                                                            });
                                                                        </script>
                                                                    </div>
                                                                </div> <input type="button" name="previous"
                                                                    class="previous action-button-previous"
                                                                    value="Pr??c??dent" /> <input type="button"
                                                                    name="next" class="next action-button"
                                                                    value="Suivant" />
                                                            </fieldset>

                                                            <fieldset id="f_info">
                                                                <div class="">
                                                                    <h2 class="fs-title">info</h2>
                                                                    <div class="mb-3 row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Image</label>
                                                                        <div class="col-sm-8">
                                                                            <input class="form-control mb-0"
                                                                                id="edit_img" type="file" name="img">
                                                                            {{-- <small style="font-size: 10px;">Veulliez
                                                                                utiliser des photos de dimention
                                                                                1028px*720px</small> --}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Type</label>



                                                                        <div class="col-sm-8">

                                                                            <div class="row">
                                                                                <div class="col-1">

                                                                                    <input id="edit_actualite"
                                                                                        class="custom-control-input "
                                                                                        type="radio" name="type"
                                                                                        value="actualite">
                                                                                </div>
                                                                                <div class="col-5 text-start">
                                                                                    <label
                                                                                        class="form-label ">Actualit??</label>
                                                                                </div>

                                                                                <div class="col-1">
                                                                                    <input id="edit_evenement"
                                                                                        class="custom-control-input"
                                                                                        type="radio" name="type"
                                                                                        value="evenement">
                                                                                </div>
                                                                                <div class="col-5 text-start">
                                                                                    <label
                                                                                        class="form-check-label">??v??nement</label>
                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Importance</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-select"
                                                                                id="edit_importance" name="importance">
                                                                                <option value="1" selected>1</option>
                                                                                <option value="2">2</option>
                                                                                <option value="3">3</option>
                                                                                <option value="3">4</option>
                                                                                <option value="3">5</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3 row">
                                                                        <label
                                                                            class="col-sm-3 col-form-label">Date</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="date" name="date"
                                                                                id="edit_date" class="form-control"
                                                                                value="">
                                                                        </div>
                                                                    </div>
                                                                </div> <input type="button" name="previous"
                                                                    class="previous action-button-previous"
                                                                    value="Pr??c??dent" /><button type="submit"
                                                                    class="next action-button w-25">Modifier
                                                                    l'actualit??</button>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- delete actualite confirmation Modal -->
                    <div class="modal fade" id="delete_actualite" tabindex="-1"
                        aria-labelledby="delete_actualite_label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="delete_actualite_label"><b>Supprimer Actualite</b>
                                    </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body ml-5">
                                    <div class="row">
                                        <span>??tes vous s??r que vous vouliez suprrimer l'actualit??</span><span>"<b
                                                id="actualite_title"></b>" ?</span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a id="delete_actualite_button" role="button" class="btn btn-primary">Suprimmer la
                                        actualite</a>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (!$actualites->count())
                        <div class='row align-self-center m-5'>
                            <div class="p-5 border-5">
                                <h1>Aucune actualit?? ?? afficher</h1>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-12 col-md-12 p-1">
                            <table class="col-sm-12 col-md-12 table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Resume</th>
                                        <th scope="col">Importance</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actualites as $actualite)
                                        <tr class="align-middle">
                                            <th scope="row">{{ $actualite->id }}</th>
                                            <td><img src="<?php echo url('/'); ?>/{{ $actualite->img }}"
                                                    style="width: 100px; height: 100px;"></td>
                                            <td>{{ $actualite->titre }}</td>
                                            <td>{{ $actualite->date }}</td>
                                            <td class="w-25 text-start">
                                                {{ strip_tags(implode(' ', array_slice(explode(' ', $actualite->resume), 0, 30))) }}
                                            </td>
                                            <td>{{ $actualite->importance }}</td>
                                            <td>{{ $actualite->type == 'evenement' ? '??v??nement' : 'Actualit??' }}
                                            </td>
                                            <td class="alt">
                                                <center>
                                                    <a style="width: 100px;" href="/actualites/{{ $actualite->id }}">
                                                        <img src="{{ url('img/actualites/oeil.png') }}"
                                                            alt="display details" class="image" />
                                                        <span>visualiser</span>
                                                    </a> <br /><br />
                                                    <a style="width: 100px;" name="edit_actualite_btn"
                                                        data-bs-toggle="modal" data-bs-target="#update_actualite"
                                                        onclick="getUpdatingActualite({{ $actualite }}); ">
                                                        <img src="{{ url('img/actualites/edit.png') }}"
                                                            alt="edit actualite" class="image" />
                                                        <span> modifier </span>
                                                    </a><br /> <br />
                                                    <a style="width: 100px;" data-bs-toggle="modal"
                                                        data-bs-target="#delete_actualite"
                                                        onclick="getDeletingActualite({{ $actualite->id }},'{{ $actualite->titre }}')">
                                                        <img src="{{ url('img/actualites/delete.png') }}"
                                                            alt="delete actualite" class="image" />
                                                        <span> supprimer</span>
                                                    </a><br /> <br />
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if ($actualites->hasPages())
                            <div class="blog-pagination">
                                <ul class="pagination justify-content-center">
                                    @if ($actualites->onFirstPage())
                                        <li class="disabled" aria-disabled="true"
                                            aria-label="@lang('pagination.previous')">
                                            <span aria-hidden="true">
                                                <i class="icofont-rounded-left"></i>
                                            </span>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ $actualites->previousPageUrl() }}" rel="prev"
                                                aria-label="@lang('pagination.previous')">
                                                <i class="icofont-rounded-left"></i>
                                            </a>
                                        </li>
                                    @endif
                                    <li class="active">
                                        <a>
                                            {{ $actualites->currentPage() }}
                                        </a>
                                    </li>
                                    @if ($actualites->hasMorePages())
                                        <li>
                                            <a href="{{ $actualites->nextPageUrl() }}" rel="next"
                                                aria-label="@lang('pagination.next')">
                                                <i class="icofont-rounded-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="disabled" aria-disabled="true"
                                            aria-label="@lang('pagination.next')">
                                            <span aria-hidden="true">
                                                <i class="icofont-rounded-right"></i>
                                            </span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </main>
    @include('components.js')
</body>

</html>
<style>
    * {
        margin: 0;
        padding: 0
    }

    html {
        height: 100%;
    }

    #grad1 {
        background-color: : #ffffff;
        background-image: linear-gradient(120deg, #ffffff, #ffffff);
        width: 100%
    }

    a {
        cursor: pointer !important;
    }

    .msform {
        text-align: center;
        position: relative;
        margin-top: 20px;
    }

    .msform fieldset .form-card {
        background: white;
        border: 0 none;
        border-radius: 0px;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        padding: 20px 40px 30px 40px;
        box-sizing: border-box;
        width: 200%;
        margin: 0 10% 20px 10%;
        position: relative
    }

    .msform fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    .msform fieldset:not(:first-of-type) {
        display: none
    }

    .msform fieldset .form-card {
        text-align: left;
        color: #9E9E9E
    }

    .msform input,
    .msform textarea {
        padding: 0px 8px 4px 8px;
        border: none;
        border-bottom: 1px solid #ccc;
        border-radius: 0px;
        margin-bottom: 25px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        font-family: montserrat;
        color: #2C3E50;
        font-size: 16px;
        letter-spacing: 1px
    }

    .msform input:focus,
    .msform textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: none;
        font-weight: bold;
        border-bottom: 2px solid skyblue;
        outline-width: 0
    }

    .msform .action-button {
        width: 100px;
        background: #2F4F4F;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px
    }

    .msform .action-button:hover,
    .msform .action-button:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #2F4F4F
    }

    .msform .action-button-previous {
        width: 100px;
        background: #616161;
        font-weight: bold;
        color: white;
        border: 0 none;
        border-radius: 0px;
        cursor: pointer;
        padding: 10px 5px;
        margin: 10px 5px
    }

    .msform .action-button-previous:hover,
    .msform .action-button-previous:focus {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
    }

    select.list-dt {
        border: none;
        outline: 0;
        border-bottom: 1px solid #ccc;
        padding: 2px 5px 3px 5px;
        margin: 2px
    }

    select.list-dt:focus {
        border-bottom: 2px solid
    }

    .card {
        border: none;
        border-radius: 0.5rem;
        position: relative
    }

    .fs-title {
        font-size: 25px;
        color: #2C3E50;
        margin-bottom: 10px;
        font-weight: bold;
        text-align: left
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #000000;

    }

    #progressbar li {
        list-style-type: none;
        font-size: 12px;
        width: 25%;
        float: left;
        position: relative
    }

    #progressbar .step1:before {
        font-family: FontAwesome;
        content: "\f023"
    }

    #progressbar .step2:before {
        font-family: FontAwesome;
        content: "\f007"
    }

    #progressbar .step3:before {
        font-family: FontAwesome;
        content: "\f09d"
    }

    #progressbar #confirm:before {
        font-family: FontAwesome;
        content: "\f00c"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 18px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #2F4F4F;
    }

    .radio-group {
        position: relative;
        margin-bottom: 25px
    }

    .radio {
        display: inline-block;
        width: 204;
        height: 104;
        border-radius: 0;
        background: lightblue;
        box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
        cursor: pointer;
        margin: 8px 2px
    }

    .radio:hover {
        box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
    }

    .radio.selected {
        box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
    }

    .fit-image {
        width: 100%;
        object-fit: cover
    }

    .image {
        width: 12%;
        height: 12%;
    }

    .alt {
        color: #616161;
        text-align: justify;
    }

</style>
<script>
    var move = true;
    var count = 1;

    function validerTitre(i) {
        if (document.getElementById("add_titre").value.length == 0) {
            move = false;
        } else {
            move = true;
            count = 2
        }

    }

    function validerResume() {
        var body = tinymce.get("add_resume").getBody(),
            text = tinymce.trim(body.innerText || body.textContent);
        if (text.length < 130) {
            move = false;
        } else {
            move = true;
            count = 3;
        }

    }

    function verifierImg() {

        var formData = new FormData();
        var file = document.getElementById("add_img").files[0];
        formData.append("Filedata", file);

        if (!file) {
            move = false;
            return false;
        }

        move = true;
        count = 1;
        return true;
    }

    function resetCount() {
        move = true;
    }
    $(document).ready(function() {

        // Alerts :
        $("#add_titre_err").hide();
        $("#add_resume_err").hide();
        $("#add_img_err").hide();


        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        var add_titre;
        if ($('#update_actualite').hasClass('show')) {
            alert("Modal is open");
        }


        $("a[name='edit_actualite_btn']").click(function() {
            $("#f_resume , #f_info").css({
                'display': 'none',
                'position': 'relative',
                'opacity': 0
            });
            $("#f_titre").css({
                'display': 'block',
                'position': 'relative',
                'opacity': 1
            });
            $("#resume_li , #info_li").removeClass('active')
        })

        $(".next").click(function() {
            if (!move) {
                switch (count) {
                    case 1:
                        $("#add_titre_err").show();
                        break;
                    case 2:
                        $("#add_resume_err").show();
                        break;
                    case 3:
                        $("#add_img_err").show();
                        break;
                    default:
                        break;
                }

            } else {
                $("#add_titre_err").hide();
                $("#add_resume_err").hide();
                $("#add_img_err").hide();

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");


                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            }
        });
        $(".previous").click(function() {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });

        $('.radio-group .radio').click(function() {
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });

        $(".submit").click(function() {
            return false;
        })

    });
</script>
