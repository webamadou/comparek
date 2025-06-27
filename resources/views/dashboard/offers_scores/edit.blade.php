@extends('layouts.dashboard')

@section('content')
<div class="body flex-grow-1">
    <div class="container-lg px-4">
        <div class="card mb-4">
            <div class="card-body">
                <h1 class="display-4">{{ "Edit des Comparek Scores de {$offer->name}" }} </h1>

                <form method="POST" action="{{ route('offer_scores.update', $offer) }}">
                    @csrf
                    @method('PUT')

                    <div class="d-flex justify-content-center">
                    @foreach($criteria as $k => $c)
                        <div class="mb-3 mx-2">
                            <label>{{ $c }}</label>
                            <input type="float" name="score[{{$k}}]" value="{{ old('score_.' . $k, $offer->scoreValues->where('score_criteria_id', $k)?->first()?->value) }}" class="form-control">
                        </div>
                    @endforeach
                    </div>
                        <span class="score-badge" style="background-color: {{ $offer->currentScoreGrade()->color() }}; color: #fff">
                            {{ $offer->currentScoreGrade() }}<br>{{ $offer->currentScore() }}
                        </span>
                        <div class="float-end"><button type="submit" class="btn btn-primary mt-3">Enregistrer</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
