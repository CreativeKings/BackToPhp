<?php 
    class Vues{
        
        function generateView($data, $vues = "index"){
            $template = file_get_contents("Vues/template.tpl");

            $ContentView = "";

            switch($vues){
                case "jeu":
                    $journal = file_get_contents("Vues/journal.tpl");
                
                    // foreach($data as $jeu){
                    $c = str_replace("[Journal_TitrePrincipal]", $data->Journal_TitrePrincipal, $journal);
                    $c = str_replace("[Journal_SousTitrePrincipal]", $data->Journal_SousTitrePrincipal, $c);
                    $c = str_replace("[Journal_Id]", $data->Journal_Id, $c);
                    $c = str_replace("[Journal_ArticlePrincipal]", $data->Journal_ArticlePrincipal, $c);
                    $c = str_replace("[Journal_Titre1]", $data->Journal_Titre1, $c);
                    $c = str_replace("[Journal_Article1]", $data->Journal_Article1, $c);
                    $c = str_replace("[Journal_Titre2]", $data->Journal_Titre2, $c);
                    $c = str_replace("[Journal_SousTitre2]", $data->Journal_SousTitre2, $c);
                    $c = str_replace("[Journal_Article2]", $data->Journal_Article2, $c);                 
                    $c = str_replace("[Journal_Titre3]", $data->Journal_Titre3, $c);
                    $c = str_replace("[Journal_Article3]", $data->Journal_Article3, $c);                
                    $c = str_replace("[Journal_Titre4]", $data->Journal_Titre4, $c);
                    $c = str_replace("[Journal_SousTitre4]", $data->Journal_SousTitre4, $c);
                    $c = str_replace("[Journal_Article4]", $data->Journal_Article4, $c);                  
                    $c = str_replace("[Journal_Titre5]", $data->Journal_Titre5, $c);
                    $c = str_replace("[Journal_Article5]", $data->Journal_Article5, $c);                
    
                    $ContentView .= $c;
                    // }
                    break;
                default:
                    $listing = file_get_contents("Vues/template.tpl");
                    $listingPartTpl = file_get_contents("Vues/listing.part.tpl");
                    $listingPart = "";
                    // $listingImgTpl = '<img src="img/[Jeux_Id].jpg" alt="Jaquette du jeu [Jeux_Titre]" id="Jeux_[Jeux_Id]">';
                    $listingImg = "";
                    foreach($data as $jeu){
                        $listingImgTpl = '<img src="img/[Jeux_Id].jpg" alt="Jaquette du jeu [Jeux_Titre]" id="Jeux_[Jeux_Id]">';
                        $c = str_replace("[Jeux_Titre]", $jeu->Jeux_Titre, $listingPartTpl);
                        $c = str_replace("[Jeux_DateSortie]", $jeu->Jeux_DateSortie, $c);
                        $c = str_replace("[Jeux_Id]", $jeu->Jeux_Id, $c);
                        
                        $listingImgTpl = str_replace("[Jeux_Id]", $jeu->Jeux_Id, $listingImgTpl);
                        $listingImgTpl = str_replace("[Jeux_Titre]", $jeu->Jeux_Titre, $listingImgTpl);
                        $listingPart .= $c;
                        $listingImg .= $listingImgTpl;
                    }

                    $ContentView = str_replace("[listingPart]", $listingPart, $listing);
                    $ContentView = str_replace("[listingImg]", $listingImg, $ContentView);

                    break;
            }

            
            return str_replace("[ContentView]", $ContentView, $template);
        }
    }