@extends('layouts.client')

@section('content')
<div class="container mt-5 p-5">
    <div class="">
        <h2 style="text-transform: uppercase; margin-left: 15%; margin-top:15px;">{{ $formation->f_title }}</h2>
    </div>

    <div class="row">
        <div class='' style="background-size:cover; display flex; justify-content:center;">
            <center>
                <img src="/storage/cover_images/{{ $formation->f_cover }}" style="width:75%; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);border-radius:  0.25rem;" class='img-fluid' alt="Bootcamp entre digiteuz" />
                <div>
                    <h4 class="mt-2 text-center">PROGRAMME</h4>
                    <p class='text-center'>{{ $formation->f_desc }}</p>
                    <table width="70%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="10%" style='font-weight:bold;'>Session1</td>
                            <td width="90%">: : En cours de programmation</td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold;'>Heure</td>
                            <td>: 09h-15h</td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold;'>Lieu Prévu</td>
                            <td>: Salle de Formation du GPE (Gestion de la Politique Economique) à Cocody</td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold;'>Cible</td>
                            <td>: 100 Jeunes femmes entrepreneures</td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold;'>Objectif</td>
                            <td>: Recruter, former et accompagner des femmes qui veulent bâtir un business numérique</td>
                        </tr>

                        <tr>
                            <td style='font-weight:bold;'>Programme</td>
                            <td> : Bientôt disponible</td>
                        </tr>
                        <tr>
                        <td style='font-weight:bold;'><p><strong>Programme Post-Formation </strong></p></td>
                        <td><table border='0' style='border:0;' cellpadding="0" cellspacing="0">
                        <tr>
                            <td> - Soumission d’un formulaire en ligne par les participantes</td>
                        </tr>
                        <tr>
                            <td> - Publication d’un pitch par les participantes</td>
                        </tr>
                        <tr>
                            <td> - Sélection des 30 meilleures candidates pour une formation et un accompagnement dans le cadre de notre incubateur-accélérateur </td>
                        </tr>
                        </table></td>
                        </tr>
                        <tr>
                            <td style='font-weight:bold;'>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </center>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
@endsection
