@extends('layouts.index')

@section('content')

  <section class="top_section_page barrages barrages_castelnau_top">
    <div class="mcontainer">
      <h1 class="title_page visible-viewportchecker visibility--check hidden">
        BARRAGE DE CASTELNAU-LASSOUTS
      </h1>
      <div class="description">
        <div class="desc_title visible-viewportchecker visibility--check hidden"> 
          JEUDI 29 JUILLET 2021
        </div>
        <div class="desc_text visible-viewportchecker visibility--check hidden">
          Remontons le Lot, passons sous le Pont Vieux d’Espalion 
          et contournons Saint-Côme-d’Olt, classé Plus Beau Village 
          de France, pour rejoindre le barrage de Castelnau-Lassouts 
          et les musiciens du Festival en Vallée d’Olt. 
        </div>
      </div>
    </div>
  </section>

  <section class="disclosed_info barrages_castelnau_disclosed">
  <div class="mcontainer">
      <div class="info_wrapper">
        <div class="left_section">

          <img class="cambeyrac visible-viewportchecker visibility--check hidden" src="/img/castelnauPeople.svg" alt="">
          <div class="les_partners disclosed_partners">
            <div class="partners_title visible-viewportchecker visibility--check hidden">LES PARTENAIRES</div>
              <div class="partner_list">
                  <div class="top_line_list visible-viewportchecker visibility--check hidden">
                    <div class="partner_logo">
                      <img src="/img/Logo_FEVO_Vecto.svg" alt="">
                    </div>
                  </div>
              </div>
          </div>
         
        </div>
        <div class="right_section">

          <div class="minors_i_title visible-viewportchecker visibility--check hidden">jeudi 29 JUILLET </div>
          <div class="minors_sub_i_title visible-viewportchecker visibility--check hidden">
            <span> VISITES GUIDÉES DU BARRAGE EDF </span>
            <span> DE CASTELNAU-LASSOUTS </span>
            
          </div>
            <p class="i_text visible-viewportchecker visibility--check hidden">
              Par les équipes d’EDF de 8h30 à 18h30. 
             <span class="italic"><b>L’inscription aux visites est OBLIGATOIRE</b> auprès 
              des Offices de Tourisme DES CAUSSES A L’AUBRAC au 
              05 65 70 43 42  et TERRES D’AVEYRON au 05 65 44 10 63 
              et soumise à conditions  </span>
              (<a href="{{ route('infos')}}"><i>voir la rubrique INFOS PRATIQUES</i></a>). 
              L’accueil des visiteurs se fait en rive gauche 
              du barrage de Castelnau-Lassouts. La route qui passe 
              sur le barrage sera interdite aux voitures. Aussi, 
              le public est invité à emprunter la route du barrage 
              par la commune de Lassouts (Hameau du Lac) et non 
              celle de Mandailles. 
            </p>
            <p class="i_text visible-viewportchecker visibility--check hidden">
              Gratuit. 
            </p>
          <div class="i_location visible-viewportchecker visibility--check hidden">
            <a target="blank" href="https://www.google.fr/maps/place/Barrage+de+Castelnau-Lassouts,+12500+Castelnau-de-Mandailles/@44.3393328,2.3331329,9z/data=!4m5!3m4!1s0x12b2f1e63fd21eb1:0xa2412a1a543b35b6!8m2!3d44.505774!4d2.873957?shorturl=1">
              <img src="/img/Google-map.png" alt="">
              <span>Localisation</span> 
            </a>
          </div>
          

          <div class="minors_sub_i_title visible-viewportchecker visibility--check hidden">
            <span> INTERLUDES MUSICAUX DES ÉTUDIANTS DE L’ACADÉMIE DU FESTIVAL EN VALLÉE D’OLT</span>
          </div>
          <p class="i_text visible-viewportchecker visibility--check hidden">Par les équipes d’EDF de 8h30 à 18h30. </p>
          <p class="i_text visible-viewportchecker visibility--check hidden">   
            A partir de 14h30, prenez place sur la crête du barrage, 
            près de l’ancienne maison du barragiste, devenue 
            belvédère, pour écouter le répertoire musical des 
            étudiants de l’Académie du Festival en Vallée d’Olt.
          </p>
          <p class="i_text visible-viewportchecker visibility--check hidden"> Gratuit. </p>
          <div class="i_location visible-viewportchecker visibility--check hidden">
            <a target="blank" href="https://www.google.fr/maps/place/Belv%C3%A9d%C3%A8re+du+Barrage+de+Castelnau-Lassouts/@44.506514,2.8717233,17z/data=!3m1!4b1!4m5!3m4!1s0x12b2f17be55f1e43:0x91063601abfa4437!8m2!3d44.506514!4d2.873912?shorturl=1">
              <img src="/img/Google-map.png" alt="">
              <span>Localisation</span> 
            </a>
          </div>

          <div class="minors_i_title visible-viewportchecker visibility--check hidden">DU 20 AU 30 JUILLET </div>
          <div class="minors_sub_i_title visible-viewportchecker visibility--check hidden">
            <span> 27E ÉDITION FESTIVAL EN VALLÉE D’OLT 2021 – LE SONGE D’UNE NUIT D’ÉTÉ… ! </span>
          </div>
            <p class="i_text visible-viewportchecker visibility--check hidden">
              Le programme complet du festival est 
              disponible sur : 
              <a target="blank" class="side_links" href="https://www.festivalolt.com/">www.festivalolt.com</a>
              <br>
              Le Festival est organisé par l’association Orgues & 
              Musiques à Saint-Geniez-d’Olt – Festival en Vallée 
              d’Olt. EDF est partenaire du Festival. 
            </p>

            <div class="les_partners disclosed_partners">
            <div class="partners_title visible-viewportchecker visibility--check hidden">LES PARTENAIRES</div>
              <div class="partner_list">
                  <div class="top_line_list visible-viewportchecker visibility--check hidden">
                    <div class="partner_logo">
                      <img src="/img/Logo_FEVO_Vecto.svg" alt="">
                    </div>
                  </div>
              </div>
          </div>
          
        </div>
      </div>
   
    </div>
  </section>
@endsection