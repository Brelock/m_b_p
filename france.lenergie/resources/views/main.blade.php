@extends('layouts.index')

@section('content')
    <section class="bg_main_section">
        <div class="mcontainer">
            <div class="wrap_main_titles ">
                <h1> 
                    <span class="visible-viewportchecker visibility--check hidden">DU 9 JUILLET AU</span>
                    <span class="visible-viewportchecker visibility--check hidden">28 AOÛT 2021</span>
                </h1>
                <h2> 
                    <span class="selected_title visible-viewportchecker visibility--check hidden">La Route de l’énergie</span> 
                    <span class="visible-viewportchecker visibility--check hidden">fête ses 10 ans, 1 an après</span> 
                </h2>
            </div>
        </div>
        <div class="main_img_fon">
            <!-- <img src="/img/main-background-fon.svg" alt=""> -->
        </div>
    
    </section>

    <section class="ledito_block">
        <div class="mcontainer">
            <h2 class="ledito_title visible-viewportchecker visibility--check hidden">L’ÉDITO</h2>
            <p class="ledito_suptitle visible-viewportchecker visibility--check hidden">
                La Route de l’énergie fête ses 10 ans, 1 an après…</p>
            <p class="ledito_suptitle visible-viewportchecker visibility--check hidden">
                 … et pour l’occasion, elle vous propose, 
                le temps d’un été, de la redécouvrir.</p>

            <p class="ledito_comments visible-viewportchecker visibility--check hidden">Comment ? En associant dans un programme événementiel,
             Aveyron et Cantal, barrages et territoires, énergie renouvelable et énergie artistique, 
             énergie hydraulique et énergie sportive, lectures de paysages et transition écologique, 
             apprentissages et témoignages.</p>

             <p class="ledito_comments visible-viewportchecker visibility--check hidden">La Route de l’énergie, qu’est-ce que c’est ? C’est d’abord 
             la mobilisation d’acteurs locaux, riverains des grands barrages hydroélectriques sur 
             la rivière du Lot et son principal affluent, la Truyère. C’est aussi l’intérêt porté 
             par des contemporains, attachés à l’épopée humaine et industrielle qu’a représenté 
             presque un siècle d’édification de ces ouvrages en béton. De l’inauguration de la 
             centrale de Brommat par le président Albert Lebrun en 1933 à la mise en service en 1982 
             de Montézic, deuxième site hydroélectrique le plus puissant de France, huit autres grands 
             barrages ont vu le jour, consacrant pour toujours les vallées Lot et Truyère, comme un 
             outil industriel stratégique pour le système électrique national et européen.</p>

             <p class="ledito_comments visible-viewportchecker visibility--check hidden">Autour de ces barrages, sur leurs lacs, de nouvelles activités 
             de pleine nature se sont développées, des animations et évènements se sont organisés, des 
             circuits de visite se sont multipliés pour découvrir et comprendre le fonctionnement de 
             l’eau-énergie.</p>

             <p class="ledito_comments visible-viewportchecker visibility--check hidden"> Pour fêter les 10 ans (+1) de cette démarche de mise en valeur 
             de ce patrimoine industriel exceptionnel, les quatre Communautés de communes et leurs Offices 
             de Tourisme (Saint-Flour Communauté ; Aubrac, Carladez et Viadène ; Comtal, Lot, Truyère ; 
             Des Causses à l’Aubrac), le Parc naturel régional de l’Aubrac, le Pôle d’équilibre territorial 
             et rural du Haut-Rouergue et EDF vous ont concocté un programme autour de quatre temps forts. </p>
             
             <p class="ledito_comments visible-viewportchecker visibility--check hidden">Savourez-le au fil des pages comme on déambule au fil de l’eau… </p>

             <p class="ledito_bel-ete visible-viewportchecker visibility--check hidden">Bel été !</p>
             <div class="inaguration">
                <img class="default_img" src="/img/Inaguration.svg" alt="">
                <img class="hover_img" src="/img/Inaguration2.svg" alt="">
                <a href="{{ route('inoguration')}}"></a>
             </div>
        </div>
    </section>
    <section class="les_grands" id="grands">
        <div class="mcontainer">
            <div class="wrap_les_grand_card">
                <div class="left_les_block">
                    <div class="title_les_grands visible-viewportchecker visibility--check hidden">Les 4 grands rendez-vous</div>
                    <div class="les_card visible-viewportchecker visibility--check hidden">
                        <div class="les_img">
                            <a class="link_pages" href="{{ route('barragesDeMontezic')}}"></a>
                            <img src="/img/people-1.svg" alt="">
                        </div>
                        <a href="{{ route('barragesDeMontezic')}}">
                            <div class="title_card">BARRAGES DE MONTÉZIC, GOLINHAC ET CAMBEYRAC  </div>
                        </a>
                        <div class="description_card">samedi 17 et dimanche 18 juillet 2021 </div>
                    </div>

                    <div class="les_card visible-viewportchecker visibility--check hidden">
                        <div class="les_img">
                            <a class="link_pages" href="{{ route('barragesDeSarrans')}}"></a>
                            <img src="/img/hands.svg" alt="">
                        </div>
                        <a href="{{ route('barragesDeSarrans')}}">
                            <div class="title_card">Barrage de Sarrans </div>
                        </a>
                        <div class="description_card">vendredi 27 et samedi 28 août 2021  </div>
                    </div>
                </div>
                <div class="right_les_block">
                    <div class="les_card visible-viewportchecker visibility--check hidden">
                        <div class="les_img">
                            <a class="link_pages" href="{{ route('barragesDeCastelnau')}}"></a>
                            <img src="/img/Musicians.svg" alt="">
                        </div>
                        <a href="{{ route('barragesDeCastelnau')}}">
                            <div class="title_card">BARRAGE DE CASTELNAU-LASSOUTS </div>
                        </a>
                        <div class="description_card"> jeudi 29 juillet 2021 </div>
                    </div>

                    <div class="les_card visible-viewportchecker visibility--check hidden">
                        <div class="les_img">
                            <a class="link_pages" href="{{ route('barragesDeLanau')}}"></a>
                            <img src="/img/labels.svg" alt="">
                        </div>
                        <a href="{{ route('barragesDeLanau')}}">
                            <div class="title_card">BARRAGES DE Lanau et Grandval </div>
                        </a>
                        <div class="description_card">du 9 au 15 août 2021 </div>
                    </div>
                </div>
            </div>
            <div class="les_partners">
               <div class="partners_title visible-viewportchecker visibility--check hidden">LES PARTENAIRES</div>
                <div class="partner_list">
                    <div class="top_line_list visible-viewportchecker visibility--check hidden">
                        <div class="partner_logo">
                            <img src="/img/p_lenergie.svg" alt="">
                        </div>
                        <div class="partner_logo">
                            <img src="/img/p_acv.svg" alt="">
                        </div>
                        <div class="partner_logo">
                            <img src="/img/p_ca.svg" alt="">
                        </div>
                        <div class="partner_logo">
                            <img src="/img/p_CLT.png" alt="">
                        </div>
                        <div class="partner_logo">
                            <img src="/img/p_saint_flour.svg" alt="">
                        </div>
                    </div>
                    <div class="botton_line_list visible-viewportchecker visibility--check hidden">
                        <div class="partner_logo">
                            <img src="/img/pb_petr.png" alt="">
                        </div>
                        <div class="partner_logo">
                            <img src="/img/pb_paint.svg" alt="">
                        </div>
                        <div class="partner_logo">
                            <img src="/img/pb_edf.svg" alt="">
                        </div>
                        <div class="partner_logo">
                            <img src="/img/pb_aubra.svg" alt="">
                        </div>
                        <div class="partner_logo">
                            <img src="/img/pb_causses.svg" alt="">
                        </div>
                        <div class="partner_logo">
                            <img src="/img/pb_terre.png" alt="">
                        </div>
                        <div class="partner_logo">
                            <img src="/img/pb_paes.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


   


