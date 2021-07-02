@extends('layouts.index')

@section('content')

  <section class="top_section_page barrages barrages_montezic_top">
    <div class="mcontainer">
      <h1 class="title_page visible-viewportchecker visibility--check hidden">
         <span>BARRAGES DE MONTÉZIC,</span>  
         <span>GOLINHAC ET CAMBEYRAC</span> 
      </h1>
      <div class="description">
        <div class="desc_title visible-viewportchecker visibility--check hidden"> 
          SAMEDI 17 ET DIMANCHE 
          18 JUILLET 2021</div>
        <div class="desc_text visible-viewportchecker visibility--check hidden">
          Située à 400 mètres sous terre, Montézic est la centrale 
          hydroélectrique la plus surprenante de la Route de 
          l’énergie et la deuxième plus puissante de France. 
          <br>
          Les centrales de Golinhac et de Cambeyrac ont séduit 
          le temps d’un week-end, 
          <br>
          les organisateurs du premier 
          Challenge Énergie Trail.
        </div>
      </div>
    </div>
  </section>

  <section class="disclosed_info barrages_montezic_disclosed">
    <div class="mcontainer">
      <div class="info_wrapper">
        <div class="left_section">

          <div class="wrap_visites">
            <div class="minors_i_title visible-viewportchecker visibility--check hidden">Samedi 17 JUILLET </div>
            <div class="minors_sub_i_title visible-viewportchecker visibility--check hidden">VISITES GUIDÉES DE LA 
              CENTRALE SOUTERRAINE EDF DE MONTÉZIC</div>
              <p class="i_text visible-viewportchecker visibility--check hidden">Par les équipes d’EDF de 8h30 à 18h30.  </p>
              <p class="i_text italic visible-viewportchecker visibility--check hidden">
                <b>L’inscription aux visites est OBLIGATOIRE</b>  auprès de 
                 l’Office de Tourisme à SAINT-AMANS-DES-CÔTS au 
                 05 65 44 81 61, et soumise à conditions 
                 (<a href="{{ route('infos')}}"><i>voir la rubrique INFOS PRATIQUES </i></a>). 
                 L’accueil des visiteurs 
                 se fait au niveau de l’usine de Montézic, D621 – 12460 
                 Montézic. Se présenter 20 minutes avant l’heure de la 
                 visite (possibilité de venir en navette depuis le 
                 centre-bourg de Montézic – voir ci-après). 
              </p>

            <div class="i_location visible-viewportchecker visibility--check hidden">
              <a target="blank" href="https://www.google.fr/maps/place/EDF+Electricit%C3%A9+de+France/@44.7348427,2.6332629,1851m/data=!3m1!1e3!4m6!3m5!1s0x12b2bce0236ed1e5:0x96febbf30fb0a607!8m2!3d44.7372359!4d2.6431974!15sChVjZW50cmFsZSBkZSBtb250w6l6aWOSARhlbGVjdHJpY191dGlsaXR5X2NvbXBhbnk?shorturl=1">
                <img src="/img/Google-map.png" alt="">
                <span>Localisation</span> 
              </a>
            </div>
          </div>
          <img class="cambeyrac visible-viewportchecker visibility--check hidden" src="/img/people-1.svg" alt="">
          <div class="les_partners disclosed_partners">
               <div class="partners_title visible-viewportchecker visibility--check hidden">LES PARTENAIRES</div>
                <div class="partner_list">
                    <div class="top_line_list visible-viewportchecker visibility--check hidden">
                      <div class="partner_logo">
                        <img src="/img/line12.png" alt="">
                      </div>
                      <div class="partner_logo">
                        <img src="/img/tropick.png" alt="">
                      </div>
                      <div class="partner_logo">
                          <img src="/img/egtp.png" alt="">
                      </div>
                    </div>
                </div>
          </div>
        </div>
        <div class="right_section">

          <div class="minors_sub_i_title visible-viewportchecker visibility--check hidden">
            <span> MONTÉZIC FÊTE LA ROUTE </span>
            <span>DE L’ÉNERGIE  </span>
          </div>
          <p class="i_text visible-viewportchecker visibility--check hidden">
              Animations toute la journée : randonnée à la cascade du Saut 
              du Chien ; projection du film « Electro Stock » (1983)  ; 
              stand découverte « Un barrage, comment ça marche ? ». 
              Buvette et restauration sur place animées par le groupe 
              <a target="blank" class="side_links" href="http://www.lousoyolos.fr/public/">LOUS OYOLOS</a> 
              , et proposées par l’Association des Parents d’Elèves. 
              Navettes gratuites en partenariat avec la société FABRE au départ 
              de la Salle des Fêtes de Montézic pour la visite de la centrale 
              hydroélectrique ou pour la randonnée commentée.
              </p>
            <p class="i_text visible-viewportchecker visibility--check hidden italic">
              <b>Réservation</b>  des activités, horaires et renseignements 
              auprès de l’Office de Tourisme à SAINT-AMANS-DES-CÔTS au 05 65 44 81 61. 
              Activités gratuites. Cette journée découverte est proposée avec le 
              soutien de la commune de Montézic. 
          </p>
          <div class="i_location visible-viewportchecker visibility--check hidden">
            <a target="blank" href="https://www.google.com/maps/place/44%C2%B042'32.7%22N+2%C2%B038'28.7%22E/@44.7088436,2.6412801,97m/data=!3m1!1e3!4m5!3m4!1s0x0:0x0!8m2!3d44.7090833!4d2.6413056?shorturl=1">
              <img src="/img/Google-map.png" alt="">
              <span>Localisation</span> 
            </a>
          </div>
          
          <div class="minors_i_title mt_20 visible-viewportchecker visibility--check hidden">Dimanche 18 JUILLET </div>
          <div class="minors_sub_i_title visible-viewportchecker visibility--check hidden">
            <span> CHALLENGE ÉNERGIE TRAIL</span>
          </div>
          <p class="i_text visible-viewportchecker visibility--check hidden">Deux courses nature ascensionnelles… et exceptionnelles :</p>
          <p class="i_text visible-viewportchecker visibility--check hidden">10H - Départ de la centrale hydroélectrique</p>
          <p class="i_text visible-viewportchecker visibility--check hidden">EDF de Golinhac- 12140 Golinhac</p>
          <p class="i_text visible-viewportchecker visibility--check hidden">Parcours de 5 km et 450 m D+.</p>
          <p class="i_text visible-viewportchecker visibility--check hidden"> 15H - Départ de la centrale hydroélectrique EDF de Cambeyrac 
              – 12140 Entraygues-sur-Truyère </p>
          <p class="i_text visible-viewportchecker visibility--check hidden">Parcours de 4,5 km et 500 m D+.</p>
          <p class="i_text visible-viewportchecker visibility--check hidden italic">   
              <b>Inscriptions</b> : 
              <a target="blank" class="side_links" href="https://www.chronometrage.com/">www.chronometrage.com</a> 
              <br>
              Trails proposés par Nicolas Cantagrel et organisés par la 
              Communauté des communes Comtal, Lot, Truyère avec le soutien de 
              la société EGTP Espalion sur le territoire de <b>Trail d’Aqui :
              <a target="blank" class="side_links nowrap_num" href="https://www.traildaqui.fr/">  www.traildaqui.fr  </a> 
          </p>
          <div class="i_location visible-viewportchecker visibility--check hidden">
            <a target="blank" href="https://www.google.fr/maps/place/Barrage+de+Golinhac+-+Usine/@44.6035549,2.596602,15z/data=!4m5!3m4!1s0x0:0xafeae56c48fc8eaf!8m2!3d44.605745!4d2.605231?shorturl=1">
              <img src="/img/Google-map.png" alt="">
              <span>Localisation</span> 
            </a>
          </div>
          <div class="les_partners disclosed_partners">
               <div class="partners_title visible-viewportchecker visibility--check hidden">LES PARTENAIRES</div>
                <div class="partner_list">
                    <div class="top_line_list visible-viewportchecker visibility--check hidden">
                      <div class="partner_logo">
                        <img src="/img/tropick.png" alt="">
                      </div>
                      <div class="partner_logo">
                        <img src="/img/line12.png" alt="">
                      </div>
                      <div class="partner_logo">
                          <img src="/img/egtp.png" alt="">
                      </div>
                    </div>
                </div>
           </div>
        </div>
      </div>
    </div>
  </section>
@endsection