@extends('layouts.client')

@section('calltoaction')
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="home-banner">
        <img src="{{ asset('images/entredigiteuz.jpeg') }}" alt="Plus de 200 formations à distance" width="600" height="383">
        <div class="content panel tertiary">
            <div class="title upper">
            <div style="text-align:center;"> <a href="#">BOOTCAMP ENTRE DIGITEUZ</a> </div>
            </div>
            <div class="text primary">
            <div> Utiliser le digital comme levier pour booster votre business. </div>
            </div>
            <div class="form-actions a-center"> <a href="register.php" class="button btn">Inscrivez-vous maintenant !</a> </div>
        </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var modal = document.getElementById("myModal");

    var span = document.getElementsByClassName("close")[0];

    span.onclick = function () {
        modal.style.display = "none";
        modal.style.backgroundColor = 'rgba(032, 032, 032, 0.7)';
    };

    window.onload = function () {
        modal.style.display = "block";
    }
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    };
</script>
@endsection

@section('content')
   {{-- bloc slides --}}
   <div class="slide_bg">
    <div class="wrapper_home">

        {{-- slide content --}}
        <div class="slide_content">
            <div id="home-slider">
                <div class="home-banner"> <img src="{{ asset('images/entredigiteuz.jpeg') }}" alt="Plus de 200 formations à distance" width="600" height="383" />
                    <div class="content panel tertiary">
                        <div class="title upper">
                            <div style="text-align:center;"> <a href="#">BOOTCAMP ENTRE DIGITEUZ</a> </div>
                        </div>
                        <div class="text primary">
                            <div> Inscrivez vous dès maintenant pour béneficier de cette formation. </div>
                        </div>
                        <div class="form-actions a-center"> <a href="register.php" class="button btn">S'inscrire</a> </div>
                    </div>
                </div>
            </div>
            <div id="pager"></div>
        </div>
        {{-- end slide content --}}

        {{-- bloc candidater --}}
        <div class="bloc-search">
            <div class="search">
                <div class="search-item search-title"><span class="search-title_big">Candidatez</span> </div>
                <div class="search-item search-formation">
                    <form action="" id="doc_express" novalidate method="POST" accept-charset="utf-8">
                        <input name="query" placeholder="Votre Nom " class="radius field" id="query" type="text" />
                        <input name="query" placeholder="Votre Prènom " class="radius field" id="query" type="text" />
                        <input name="query" placeholder="Téléphone" class="radius field" id="query" type="text" />
                        <input name="query" placeholder="Email" class="radius field" id="query" type="text" />
                        <div class="search-item ">
                            <button class="search-action" type="submit">Valider l'inscription</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- end bloc candidater --}}
    </div>
</div>
    {{-- end bloc slides --}}

    {{-- boutton vert --}}
<div class="row collapse">
    <div class="large-12 columns">
        <ul class="small-block-grid-1 medium-block-grid-1 large-block-grid-3 block-type-formations mb-medium">
            <li>
                <a href="#" class="btn button full secondary type-formations">
                    <img src="{{ asset('images/icones/icon-elearning.png') }}" class="icon" alt="elearning" width="31" height="31" />
                    <span class="upper text-icon ml-large">
                        <span class="text">Avec nous donnez vie à </span><br />
                        <span class="text small bold">votre projet d’entreprise</span>
                    </span>
                </a>
            </li>

            <li>
                <a href="#" class="btn button full secondary-lt type-formations">
                    <img src="{{ asset('images/icones/icon-on-spot-formation.png') }}" class="icon" alt="Stage sur place" width="31" height="31" />
                    <span class="upper text-icon ml-large">
                        <span class="text">Des Professionnels aguerris pour</span><br />
                        <span class="text small bold"> vous encadrer</span>
                    </span>
                </a>
            </li>

            <li>
                <a href="#" class="btn button full secondary-lt2 type-formations">
                    <img src="{{ asset('images/icones/icon-entreprise-formation.png') }}" class="icon" alt="" width="31" height="31" />
                    <span class="upper text-icon ml-xlarge">
                        <span class="text">Avec nos partenaires, augmentez</span><br />
                        <span class="text small bold">vos chances de Financement</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
    {{-- end bouton vert --}}

    {{-- formation a la une --}}
<div class="row collapse row-pad">
    <div class="medium-12 columns">
        <div class="events_title"> Nos formations à la une <a class="title_home_link" href="#">Toutes nos formations</a> </div>
        <ul class="formations_home" data-equalizer data-equalizer-mq="large-only">
            @foreach ($formations as $formation)
            <li class="formation_item">
            <div class="formation_item-body" data-equalizer-watch>
                <a href="#" class="formation_item_img">
                    <img src="/storage/cover_images/{{ $formation->f_cover }}" alt="" />
                </a>
                <div class="formation_home">
                    <div class="formation_home-title">
                        <a href="#">{{ $formation->f_title }}</a></div>
                    <div class="formation_home-chapo text-justify"> {{ $formation->f_desc }}</div>
                    <a href="{{ route('client-see-formation', $formation->id) }}" class="formation_link">Découvrir cette formation</a>
                </div>
            </div>
            </li>
            @endforeach
            {{-- <!--<li>-->
            <!--  <div class="bloc_financement" data-equalizer-watch>-->
            <!--    <div class="bloc_financement_title"> Prochain <br />-->
            <!--      <span class="bold">Recrutement</span> </div>-->
            <!--    <div class="bloc_financement_img"> <img src="images/img-finance.png" class="mb-large" alt="" width="235" height="100" /> </div>-->
            <!--    <div class="bloc_financement_content"> <span class="bold">Accélérez des maintenant </span> votre carrière professionnelle </div>-->
            <!--    <div class="bloc_financement_action">-->
            <!--      <a href="#" class="bloc_financement_btn">En savoir plus</a> </div>-->
            <!--  </div>-->
            <!--</li>--> --}}
        </ul>
        </div>
    </div>
</div>
    {{-- fin formation a la une --}}

    {{-- bloc videos --}}
<div class="bloc_video">
    <div class="bloc_video_title">Formez-vous <strong>à distance</strong> et <strong>à votre rythme</strong> ! </div>
    <div class="wrapper_bloc_video">
        <div class="video_wrapper">
            <div class="flex-video">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/qC3hzkRP_ms" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="bloc_video_content">
            <div class="bloc_video_text">
                <p>
                    PERFORMER est une plateforme créée spécialement par le groupe AMIRA GLOBAL TECHNOLOGES pour accompagner les porteurs de projet en les aidant à optimiser leur chance d’atteindre leur objectif entrepreneurial.
                </p>
                <p>
                    Cet incubateur, accélérateur est motivé par une volonté d’aider les jeunes entrepreneurs en phase création à passer le cap du démarrage dans les meilleures des conditions.
                    Nous mettons donc à leur disposition, des outils permettant entre autres de convaincre les investisseurs, d’apprendre à pitcher ou encore un accompagnement pour une levé de fonds. Les programmes de formations durent environ trois mois.
                </p>
            </div>
            <div class="bloc_video_doc">
                <div class="accroche">
                    <span class="accroche_yellow"></span>
                    Vous êtes interessé  par un accompagnement ?
                </div>
                <div class="img_video_doc">
                    <a href="#"><img src="{{ asset('images/doc_now.png') }}" alt="" /></a>
                </div>
                <a href="#" class="bloc_financement_btn">Inscrivez vous<br />dès à présent</a>
            </div>
        </div>
    </div>
</div>
    {{-- end bloc videos --}}

    {{-- bloc news --}}
<div class="row blogs">
    <div class="small-12 large-5 columns">
        <div class="events_title">Agenda des Formations<a href="#">Voir tous les évènements</a></div>
        <div class="events">
            @foreach ($events as $event)
            <li class="event">
                <a href="{{ route('see-this-event', $event->id) }}" class="event_title">Le {{ $event->e_date }} :  {{ $event->e_title }} </a>
                <div class="event_resume">{{ $event->e_desc }} </div>
            </li>
            @endforeach
        </div>
    </div>
    <div class="small-12 large-7 columns">
        <div class="events_title">Actualités</div>
        <div class="events">
            <li class="event">
                <div class="event_img">
                    <a href="#"><img src="{{ asset('images/entredigiteuz.jpeg') }}" class="img-thrumnail" alt="" /></a>
                </div>
                <div class="event_body">
                    <a href="#" class="event_title">{{ $event->e_date }}: {{ $event->e_title }}</a>
                    <div class="event_resume">{{ $event->e_desc }}</div>
                </div>
            </li>
        </div>
    </div>
</div>
    {{-- end bloc news --}}
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
{{-- <!-- <script type="text/javascript" src="js/modernizr.min.js"></script>
<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/foundation/js/foundation.min.js"></script>
<script type="text/javascript" src="bower_components/jquery.cookie/jquery.cookie.min.js"></script> --> --}}
<script type="text/javascript" src="{{ asset('js/caroufredsel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@endsection
