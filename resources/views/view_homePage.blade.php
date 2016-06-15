@extends('view_master')

@section('title', 'Accueil')

@section('content')

		<div class="container article">
            
           
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('assets/img/homePage6.jpg') }}" alt="ciao" class="imgHome">
                <h2 class="titreImageHome">Plateforme d’information, d’aide et d’échanges pour les 11-20 ans.</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6 descriptionCiao">
                <span class="titreCiao">ciao.ch</span> est destiné aux jeunes romands de 11 à 20 ans
                12 rubriques et plus de 1700 fiches d’information rédigées pour toi sur des thématiques qui t’intéressent (clique sur les onglets du menu pour y accéder).

            </div>
        </div>

        

        <div class="col-md-12">
            <div class="row containerEnglobeDiv">
                <div class="col-md-4">
                <div class="col-md-12 homeSecondContainer">
                    <div class="homeSecondContainer2">
                    <img src="{{ asset('assets/img/quiz.png') }}" alt="question" class="iconContainerHome">
                    <h2>Questions</h2><p> Anonyme et gratuit : tu peux poser tes questions, nous y répondrons dans les deux jours.</p>
                        <p>Pour ceci, rends-toi dans le domaine qui t'intéresse et pose ta question.</p>
                     
                    </div>
  
                </div>

                </div>
                 <div  class="col-md-4">
                <div class="col-md-12 homeSecondContainer">
                    <div class="homeSecondContainer2">
                    <img src="{{ asset('assets/img/forumPink.png') }}" alt="forum" class="iconContainerHome">
                    <h2>Forum</h2><p> C'est quelque chose que tu vis, un sujet que te concerne, dont tu parles avec tes ami-es, pour lequel tu t'engages ? Viens en discuter sur ciao avec d'autres.</p>
                        <p>Pour ceci, rends-toi dans un domaine qui t'intéresse, et propose ton sujet de discussions. Tu peux aussi voir les autres discussions et y participer. </p>
                     </div>
                    </div>
            
    
                </div>
                
                
                
                <div class="col-md-4">
                <div class="col-md-12 homeSecondContainer">
                    <div class="homeSecondContainer2">
                    <img src="{{ asset('assets/img/userPink.png') }}" alt="question" class="iconContainerHome">
                    <h2>Espace personnel</h2>  
                        <p>
                        Crée ton espace perso pour avoir accès aux fonctionnalités proposées
                            Ta partie privée te permet de: </p>   
                            <ul class="listeAPuce">
                            <li>poser anonymement des questions</li>
                            <li>créer et participer à des discussions</li>
                            <li>poster des témoignages</li>
                            </ul>
 <p> <a href="/user/create"><button type="submit" class="btn btn-m btnEspacePerso" name="compte">Créer un compte</button></a>
                            </p>        	  

                     </div>

                        
                </div>

                </div>
                
            </div>
        </div>

            <div class="col-md-12 barre">
                         <div class="row">
                             <hr></hr>
                </div>
            </div>
            
        
        
         
            <div class="col-md-12">
                         <div class="row">
                             
                            <div class="col-md-offset-2 col-md-3 iphoneApp">
                            <img src="{{ asset('assets/img/iphone.png') }}" alt="iphone" class="imgIphone">
                                </div>
                             <div class="col-md-4 iphonePar">
                                 <h2>Ciao a une toute nouvelle app pour Iphone.</h2>
        
        <p>Comme le site ciao.ch, cette application te permet d'accéder à:</p>
    <ul class="listeAPuce">
<li>les 100 dernières Questions Réponses</li>
<li>la possibilité de poser une question et de recevoir une réponse personnalisée</li>
<li>l'accès à des adresses du réseau d'aide et de soutien en fonction de ta localisation et de mots-clé</li>
<li>l'accès aux numéros d'urgence</li>
<li>l'accès aux actualités de ciao.ch</li>
</ul>
                                 <p class="imgDownload">
                            <a><img src="{{ asset('assets/img/apple.png') }}" alt="apple" class="imgAppTel"></a>
                            </p>
                            </div>
                             


                        </div>
            </div>
        
               <div class="col-md-12 barre">
                         <div class="row">
                             <hr></hr>
                </div>
            </div>
        
            
            <div class="col-md-12 actualites">
                         <div class="row">
                             <h2>Actualités</h2>
                            
            <div class="col-md-3 articleActualites"><a class="lienArticle">
                <img src="{{ asset('assets/img/racisme.jpg') }}" alt="racisme" class="imgActualite">
               <h3 class="titreImgArticle">Semaine contre le racisme</h3>
                </a>
               
            </div>
                <div class="col-md-3 articleActualites">
                <a class="lienArticle"><img src="{{ asset('assets/img/citron.jpg') }}" alt="citron" class="imgActualite">
                <h3 class="titreImgArticle">Les 3 faux effets du citron</h3></a>
            </div>
             <div class="col-md-3 articleActualites">
                <a class="lienArticle"><img src="{{ asset('assets/img/cancer.jpg') }}" alt="cancer" class="imgActualite">
               <h3 class="titreImgArticle">Qu’est-ce que le cancer?</h3></a>
            </div>
          

           <div class="col-md-3 articleActualites">
                 <a class="lienArticle"><img src="{{ asset('assets/img/radio.jpg') }}" alt="radio" class="imgActualite">
                <h3 class="titreImgArticle">Journée mondiale de la radio</h3></a>
                </div>
            </div>
        </div>
                </div>



   

        @stop
