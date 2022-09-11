<?php
header('Content-Encoding: UTF-8');
header('Content-type: text/xls; charset=UTF-8');
header('Content-Transfer-Encoding: binary');
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=rapport.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo "\xEF\xBB\xBF"; // UTF-8 BOM



?>

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <style>
        table, tr, td {
            border: 1px solid black;
            padding: 7px;
        }

        table{
            width: 100%;
            font-size: 18px;
        }

        td {
            padding: 8px;
        }
        .bcolor{
            background-color: #696969;
        }
        thead{
            background-color: #696969;
        }
        .tstyle{
            border: 1px solid black;
        }

    </style>
</head>
<body>
@php

    $nameagent=[];
    $idagent=[];
    $total=[];
    $total_nbre_impc=[];
    $total_nbre_insc=[];
    $total_nbre_tf=[];

@endphp


@foreach ($data_export as $key => $dat)

    @php

        $nom_agent = \App\Models\Agent::where('id', $dat->id_agent)->pluck('name');
        $prenom_agent = \App\Models\Agent::where('id', $dat->id_agent)->pluck('prenom');
        $val = $nom_agent[0].' '.$prenom_agent[0];
        array_push($nameagent,$val);
        array_push($idagent,$dat->id);

      //  array_push($idagent,$dat->id_agent);

   @endphp
@endforeach

<div style="display: flex;flex-direction: row">
    <h3 style="text-transform: uppercase;text-align: left;font-size: 16px;">
        <p style="text-align: center">MINISTERE DU BUDGET</p>
        <p style="text-align: center">ET DU PORTEFEUILLE DE L'ETAT</p>
        <p style="text-align: center">--------</p>
        <p style="text-align: center">DIRECTION GENERALE DES IMPOTS</p>
        <p style="text-align: center">--------</p>
        <p style="text-align: center"><strong> DIRECTION DU DOMAINE, DE </strong></p>
        <p style="text-align: center"><strong> LA CONSERVATION FONCIERE, DE L'ENREGISTREMENT ET DU TIMBRE </strong></p>
        <p style="text-align: center">--------</p>
    </h3>
</div>

<h3 class="tstyle">SUIVI  DES TITRES FONCIERS DU LIVRE FONCIER ELECTRONIQUE <?php if(!empty($from) && !empty($to)){ ?> DU <?=date("d-m-Y",strtotime($from))?> AU <?=date("d-m-Y",strtotime($to))?> <?php }else{ } ?>   <?php if(!empty($nom_agent_complet)){ ?> POUR <?php echo '<span style="text-transform: uppercase;">'.$nom_agent_complet.'</span>'; ?> <?php }else{ ?> POUR TOUS LES AGENTS <?php } ?>  </h3>

<table>
    <thead>
    <tr>
        <th>Date</th>
        <th>Agent</th>
        <th>Nbres de TF impactés par les inscriptions</th>
        <th>Nbres d'inscriptions</th>
        <th>Nbres de TF</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($data_export as $key => $dat)
        <tr>
            <td style="text-align: center;horiz-align: center"><?php echo date("d-m-Y",strtotime($dat->date)); ?></td>
            <td style="text-align: center;horiz-align: center">
                <?php

                $nom_agent = \App\Models\Agent::where('id', $dat->id_agent)->pluck('name');
                $prenom_agent = \App\Models\Agent::where('id', $dat->id_agent)->pluck('prenom');
                $val_name = $nom_agent[0].' '.$prenom_agent[0];

                ?>
                {{$val_name}}
            </td>
            <td style="text-align: center;horiz-align: center"> @php  array_push($total_nbre_impc,$dat->nbre_tf_impactes); @endphp {{$dat->nbre_tf_impactes}}</td>
            <td style="text-align: center;horiz-align: center"> @php  array_push($total_nbre_insc,$dat->nbre_inscription); @endphp {{$dat->nbre_inscription}}</td>
            <td style="text-align: center;horiz-align: center"> @php  array_push($total_nbre_tf,$dat->nbre_tf_crees); @endphp {{$dat->nbre_tf_crees}}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <th>TOTAL<?php if(!empty($from) && !empty($to)){ echo ' DU '.date("d-m-Y",strtotime($from)).' AU '.date("d-m-Y",strtotime($to)).' '; }else{ } ?> </th>
        <th></th>
        <th>
            @php $somme_nbre_tf_impactes=0; @endphp
            @foreach($total_nbre_impc as $total_nbre_impcs)
                @php  $somme_nbre_tf_impactes = $somme_nbre_tf_impactes + $total_nbre_impcs; @endphp
            @endforeach
            <?=$somme_nbre_tf_impactes?>
        </th>
        <th>
            @php $somme_nbre_inscription=0; @endphp
            @foreach($total_nbre_insc as $total_nbre_inscs)
                @php  $somme_nbre_inscription = $somme_nbre_inscription + $total_nbre_inscs; @endphp
            @endforeach
            <?=$somme_nbre_inscription?>
        </th>
        <th>
            @php $somme_nbre_tf_crees=0; @endphp
            @foreach($total_nbre_tf as $total_nbre_tfs)
                @php  $somme_nbre_tf_crees = $somme_nbre_tf_crees + $total_nbre_tfs; @endphp
            @endforeach
            <?=$somme_nbre_tf_crees?>
        </th>
    </tr>
    </tfoot>
</table>
</body>
</html>
