
    @php
        $nom_agent = \App\Models\Agent::where('id', $id_agent)->pluck('name');
        $prenom_agent = \App\Models\Agent::where('id', $id_agent)->pluck('prenom');
    @endphp
    {{ $nom_agent[0] }} {{ $prenom_agent[0] }}