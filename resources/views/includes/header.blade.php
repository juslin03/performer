
{{-- MENU VERSION MOBILE --}}
<aside class="right-off-canvas-menu">
  <ul class="off-canvas-list">
    <li>
      <label>Présentation</label>
      <div class="container-link">
      <a href="presentation.php" class="sub-navigation-link" title="">Apropos de nous</a>
      <a href="presentation.php" class="sub-navigation-link" title="">Objectifs</a>
      <a href="presentation.php" class="sub-navigation-link" title="">Organisation de la formation</a> </li>
    <li>
      <label>Nos Formations</label>
      <div class="container-link">
        @foreach ($formations   as $formation)
        <a href="{{ route('client-see-formation', $formation->id) }}" class="sub-navigation-link" title="">{{ $formation->f_title }}</a>
        @endforeach
       </li>
    <li>

      <label>Accompagnement</label>
      <div class="container-link">
      <a href="presentation.php" class="sub-navigation-link">Séance de Coaching</a>
      <a href="presentation.php" class="sub-navigation-link">Financement</a> </li>
    <li>
      <label>Nos Partenaires</label>
      <div class="container-link">
      <a href="#" class="sub-navigation-link">Partenaires</a> </li>
    <li>
      <label>Nous Contacter</label>
      <div class="container-link">
      <a href="contacts.php" class="sub-navigation-link">Contacts</a> </li>
  </ul>
</aside>
{{-- FIN MENU VERSION MOBILE --}}

{{-- HEADER LOGO --}}
<div class="wrap-header">
  <div class="row row-top">
    <div class="row-top_item item_phone">Infoline : <span class="header-phone">+225 77 43 15 63 / +225 21 37 63 62</span></div>
    <div class="row-top_item item_student"> <a href="#" class="sub-navigation-link">FOAD</a> </div>
  </div>
  <div class="row row-header"> <a class="right-off-canvas-toggle right hide-for-large-up" href="#" > MENU
    <div> <span></span> <span></span> <span></span> </div>
    </a>
    <div class="bloc_home"> <a href="/" class="logo" title="Accueil"> <img src="{{ asset('images/logo_performer.png') }}" class="logo" alt="Logo"  /> </a>
      <div class="fede-wrap"> <span class="fede" ><img src="{{ asset('images/armoirie.jpeg') }}" class="logo_fede" style='width:56px;' alt="" /><span style='position: relative; top: 10px;'>Ministère de la Promotion des<br/> PME - MPPME</span>
      </span> </div>
    </div>
    <div class="signature" style='position: relative; left: 4.5rem;' > <img src="{{ asset('images/signature.jpeg') }}" class="signature" alt="Prenez un nouveau départ" width="250" height="55" /> </div>
    <!--<div class="tagline"> Depuis plus de 10 ans nous vous accompagnons dans vos formations. <br>-->
    <!--  Avec plus de 10 000 étudiants formés </div>-->
  </div>
</div>
{{-- <!-- FIN HEADER LOGO --> --}}

{{-- <!-- MENU PRINCIPAL --> --}}
<div class="navigation_wrapper">
  <ul class="navigation" style="font-weight: 500;">
    <li class="navigation-item"> <span class="navigation-link default "><a href="{{ route('welcome') }}" class="sub-navigation-link text-blanc" title="">Accueil</a></li>
    <li class="navigation-item">
        <a class="navigation-link " href="#" title="">Présentation</a>
        <div class="container-sub-navigation">
          <ul class="sub-navigation">
            <li class="sub-navigation-item"><a href="presentation.php" class="sub-navigation-link" title="">A propos de nous </a></li>
            <li class="sub-navigation-item"><a href="objectifs.php" class="sub-navigation-link" title="">Objectifs</a></li>
            <li class="sub-navigation-item"><a href="organisation.php" class="sub-navigation-link" title="">Organisation de la formation</a></li>
          </ul>
        </div>
      </li>

      <li class="navigation-item"> <a class="navigation-link " href="nos-formations-a-distance.html" title="Nos formations à distance">Formations</a>
          <div class="container-sub-navigation">
              <ul class="sub-navigation">
                  @foreach ($formations ?? '' as $formation)
                  <li class="sub-navigation-item"><a href="{{ route('client-see-formation', $formation->id) }}" class="sub-navigation-link" title="">{{ $formation->f_title }}</a></li>
                  @endforeach
              </ul>
          </div>
      </li>
      <li class="navigation-item"> <a class="navigation-link" href="#" title="Nos formations à distance">Accompagnement</a>
        <div class="container-sub-navigation">
          <ul class="sub-navigation one-column">
            <li class="sub-navigation-item"> <a href="#" class="sub-navigation-link" title="">Séance de Coaching</a> </li>
            <li class="sub-navigation-item"> <a href="#" class="sub-navigation-link" title="">Financement</a> </li>
          </ul>
        </div>
      </li>
      <li class="navigation-item"> <span class="navigation-link default "><a href="#" class="sub-navigation-link text-blanc" title="">Partenaires</a></li>
        <li class="navigation-item"> <span class="navigation-link default "><a href="contacts.php" class="sub-navigation-link text-blanc" title="">Contacts</a></span></li>
        <li class="navigation-item"> <a href="#" class="addDoc" title="Demande de doc"></a> </li>
  </ul>
</div>
{{-- FIN MENU PRINCIPAL --}}
