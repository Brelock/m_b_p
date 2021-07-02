@extends('layouts.index')

@section('content')

  <section class="top_section_page barrages barrages_sarrans_top">
    <div class="mcontainer">
      <h1 class="title_page visible-viewportchecker visibility--check hidden">
          BARRAGE DE SARRANS
      </h1>
      <div class="description">
        <div class="desc_title visible-viewportchecker visibility--check hidden"> 
          VENDREDI 27 ET SAMEDI 28 AOÛT 2021
        </div>
        <div class="desc_text visible-viewportchecker visibility--check hidden">
            Du haut de ses 105 mètres, le 
            barrage de Sarrans s’impose dans 
            ce paysage qu’il a contribué à façonner. 
            Ouvrage historique des gorges de la Truyère 
            (1934), avec celui de Brommat (1933), il 
            accueillera, dans sa salle des machines au 
            style Art déco, un concert inédit. 
        </div>
      </div>
    </div>
  </section>

  <section class="disclosed_info barrages_sarrans_disclosed">
    <div class="mcontainer">
      <div class="info_wrapper">
        <div class="left_section">
          
          <div class="wrap_visites">
            <div class="minors_i_title visible-viewportchecker visibility--check hidden">VENDREDI 20 AOÛT </div>
            <div class="minors_sub_i_title visible-viewportchecker visibility--check hidden">LA NUIT DES BURONS À BROMMAT </div>
            <p class="i_text visible-viewportchecker visibility--check hidden">
              Rendez-vous au Nomad Bar en fin d’après-midi pour une déambulation 
              artistique proposée par la Cie Ktaclop, une création 
              originale autour de l’histoire des barrages et de la fée 
              électricité. Le soir venu, à partir de 19h, venez écouter 
              Yarglaa (Rock Old School) & DWWF (Naughty R’n’R). 
              Nomad Bar - Lieu-dit Conilhergue – 12600 Brommat. 
            </p>
            <p class="i_text visible-viewportchecker visibility--check hidden italic"> <b>Renseignements et réservations :</b>  
            <a target="blank" class="side_links" href="https://lanuitdesburons@gmail.com /">  lanuitdesburons@gmail.com   </a> 
            </p>
            <div class="i_location visible-viewportchecker visibility--check hidden">
              <a target="blank" href="https://www.google.com/maps/place/44%C2%B049'14.2%22N+2%C2%B040'30.2%22E/@44.8206248,2.6728533,17z/data=!3m1!4b1!4m6!3m5!1s0x0:0x0!7e2!8m2!3d44.8206206!4d2.6750416?shorturl=1">
                <img src="/img/Google-map.png" alt="">
                <span>Localisation</span> 
              </a>
            </div>
          </div>
          <img class="cambeyrac visible-viewportchecker visibility--check hidden" src="/img/hands.svg" alt="">
          <div class="les_partners disclosed_partners">
               <div class="partners_title visible-viewportchecker visibility--check hidden">LES PARTENAIRES</div>
                <div class="partner_list">
                    <div class="top_line_list visible-viewportchecker visibility--check hidden">
                      <div class="partner_logo">
                        <img src="/img/blues.png" alt="">
                      </div>
                      <div class="partner_logo">
                        <img src="/img/symfonix.png" alt="">
                      </div>
                      <div class="partner_logo">
                          <img src="/img/agrences.png" alt="">
                      </div>
                    </div>
                </div>
          </div>
        </div>
        <div class="right_section">

          <div class="minors_i_title visible-viewportchecker visibility--check hidden">Vendredi 27 AOÛT </div>
          <div class="minors_sub_i_title visible-viewportchecker visibility--check hidden">
            <span> CONCERT EXCEPTIONNEL DE FABRICE 
              EULRY ET DE H2O TRIO DANS LA  
              CENTRALE HYDROÉLECTRIQUE DE SARRANS 
            </span>
          </div>
          <p class="i_text visible-viewportchecker visibility--check hidden">Accueil du public à 18H.</p>
          <p class="i_text visible-viewportchecker visibility--check hidden">
           <span class="italic">
           <b>Les réservations sont OBLIGATOIRES</b>  
            auprès de l’Office de Tourisme à ARGENCES-EN-AUBRAC au 05 65 66 19 75 ou à MUR-DE-BARREZ au 05 65 66 10 16. 
            L’accès à la centrale hydroélectrique de SARRANS se fait dans les mêmes conditions de sécurité que les visites guidées 
            (<a href="{{ route('infos')}}"><i>voir la rubrique INFOS PRATIQUES</i></a>). 
            Toute personne ne respectant pas scrupuleusement 
            ces conditions se verra refuser l’accès. 
           </span> 
            Le concert est organisé par l’association Blues en Aveyron, avec le soutien de la Communauté des communes Aubrac, Carladez et Viadène et EDF.  
          </p>
          <div class="i_location visible-viewportchecker visibility--check hidden">
            <a target="blank" href="https://www.google.fr/maps/place/44%C2%B049'42.9%22N+2%C2%B044'23.2%22E/@44.8285801,2.7391283,233m/data=!3m2!1e3!4b1!4m6!3m5!1s0x0:0x0!7e2!8m2!3d44.8285788!4d2.7397794?shorturl=1">
              <img src="/img/Google-map.png" alt="">
              <span>Localisation</span> 
            </a>
          </div>
          
          <div class="minors_i_title mt_20 visible-viewportchecker visibility--check hidden">Samedi 28 AOÛT </div>
          <div class="minors_sub_i_title visible-viewportchecker visibility--check hidden">
            <span> VISITES GUIDÉES DU BARRAGE </span>
            <span>EDF DE SARRANS</span>
          </div>
          <p class="i_text visible-viewportchecker visibility--check hidden">Par les équipes d’EDF de 8h30 à 18h30.</p>
          <p class="i_text visible-viewportchecker visibility--check hidden italic">   
              <b>L’inscription aux visites est OBLIGATOIRE</b> 
               auprès de l’Office de Tourisme à ARGENCES-EN-AUBRAC 
               au 05 65 66 19 75 ou à MUR-DE-BARREZ au 05 65 66 10 16 
               et soumise à conditions
          <span class="i_text handler_visible_content italic inline">
              (<a href="{{ route('infos')}}"><i>voir la rubrique INFOS PRATIQUES</i></a>). 
               L’accueil des visiteurs se fait au niveau du terrain de quilles de huit 
               à Sainte-Geneviève-sur-Argence – 12420 Argences-en-Aubrac. 
               Chaque visiteur est invité à se présenter 20 minutes avant 
               l’heure de la visite.  
          </span>
          </p>
          

          <div class="i_location handler_visible_content">
            <a target="blank" href="https://www.google.fr/maps/place/44%C2%B047'36.6%22N+2%C2%B045'35.9%22E/@44.7934988,2.7577943,466m/data=!3m2!1e3!4b1!4m6!3m5!1s0x0:0x0!7e2!8m2!3d44.7934951!4d2.7599827?shorturl=1">
              <img src="/img/Google-map.png" alt="">
              <span>Localisation</span> 
            </a>
          </div>

          <div class="minors_sub_i_title handler_visible_content">
            <span> ACTIVITÉS LUDIQUES ET SPORTIVES AUTOUR DU LAC DE SAINTE-GENEVIÈVE-SUR-ARGENCE </span>
          </div>
          <p class="i_text handler_visible_content">Par les équipes d’EDF de 8h30 à 18h30.</p>
          <p class="i_text handler_visible_content">   
              Avant et après la visite, venez découvrir et essayer 
              le sport de quilles de huit et profiter des activités 
              nautiques proposées à la base de loisirs de 
              Sainte-Geneviève-sur-Argence.    
             <span class="italic">
              <b>Renseignements</b> au 05 65 66 19 75.
                Cette journée découverte est proposée  
                avec le soutien de la commune 
                d’Argences-en-Aubrac. 
             </span> 
          </p>

          <div class="btn_lare_la_suite">
            <span class="arrow_down"></span>
            <span>Lire la suite</span>
          </div>

          <div class="les_partners disclosed_partners">
               <div class="partners_title visible-viewportchecker visibility--check hidden">LES PARTENAIRES</div>
                <div class="partner_list">
                    <div class="top_line_list visible-viewportchecker visibility--check hidden">
                      <div class="partner_logo">
                        <img src="/img/blues.png" alt="">
                      </div>
                      <div class="partner_logo">
                        <img src="/img/symfonix.png" alt="">
                      </div>
                      <div class="partner_logo">
                          <img src="/img/agrences.png" alt="">
                      </div>
                    </div>
                </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection