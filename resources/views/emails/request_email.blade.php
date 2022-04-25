<p style="font-size: 1.17em;"><b>Typ:</b> {{ config('property.' . $project->type) }}</p>

@if($project->surface)
    <p style="font-size: 1.17em;"><b>Fläche:</b> {{ $project->surface }} m²</p>
@endif

@if($project->construction_year)
    <p style="font-size: 1.17em;"><b>Baujahr:</b> {{ $project->construction_year }}</p>
@endif

@if(!is_null($project->is_leasehold))
    <p style="font-size: 1.17em;"><b>Erbpacht:</b> {{ $project->is_leasehold ? 'Ja' : 'Nein' }}</p>
@endif

@if($project->rooms)
    <p style="font-size: 1.17em;"><b>Zimmer:</b> {{ $project->rooms }}</p>
@endif

@if($project->floors)
    <p style="font-size: 1.17em;"><b>Stockwerke:</b> {{ $project->floors }}</p>
@endif

@if($project->apartment_count)
    <p style="font-size: 1.17em;"><b>Einheiten:</b> {{ $project->apartment_count }}</p>
@endif

@if(!is_null($project->is_declaration_of_division))
    <p style="font-size: 1.17em;"><b>Teilungserklärung:</b> {{ $project->is_declaration_of_division ? 'Ja' : 'Nein' }}</p>
@endif

@if(!is_null($project->is_development_possible))
    <p style="font-size: 1.17em;"><b>Bebauung möglich:</b> {{ $project->is_development_possible ? 'Ja' : 'Nein' }}</p>
@endif

@if(!is_null($project->state))
    <p style="font-size: 1.17em;"><b>Bundesland:</b> {{ $project->state }}</p>
@endif

@if(!is_null($project->comment))
    <p style="font-size: 1.17em;"><b>Kommentar:</b> {{ $project->comment }}</p>
@endif

@if(!is_null($project->postal_code))
    <p style="font-size: 1.17em;"><b>Postleitzahl:</b> {{ $project->postal_code }}</p>
@endif

@if(!is_null($project->address))
    <p style="font-size: 1.17em;"><b>Straße und hausnummer:</b> {{ $project->address }}</p>
@endif

@if(!is_null($project->email))
    <p style="font-size: 1.17em;"><b>Email:</b> {{ $project->email }}</p>
@endif

@if(!is_null($project->phone_number))
    <p style="font-size: 1.17em;"><b>Telefonnummer:</b> {{ $project->phone_number }}</p>
@endif

@if(!is_null($project->price))
    <p style="font-size: 1.17em;"><b>Preis:</b> {{ $project->price }}</p>
@endif

@if(!$project->floor_plans->isEmpty())
    <h3 style="margin-bottom: 5px">Grundrisse</h3>
    @foreach($project->floor_plans as $floor_plan)
        <div>
            <a href="{{ $floor_plan->file_path }}">{{ $floor_plan->file_path }}</a>
        </div>
    @endforeach
@endif

@if(!$project->photos->isEmpty())
    <h3 style="margin-bottom: 5px">Fotos</h3>
    @foreach($project->photos as $photo)
        <div>
            <a href="{{ $photo->file_path }}">{{ $photo->file_path }}</a>
        </div>
    @endforeach
@endif

@if(!$project->attachments->isEmpty())
    <h3 style="margin-bottom: 5px">Anhänge</h3>
    @foreach($project->attachments as $attachment)
        <div>
            <a href="{{ $attachment->file_path }}">{{ $attachment->file_path }}</a>
        </div>
    @endforeach
@endif

