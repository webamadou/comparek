<div>
    <section id="list-operators py-0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="form-wrapper filter-form-wrapper">
                        <h1><span class="bi bi-sliders"> </span>{{ __('offers.filter') }}</h1>
                        <div id="filter-wrapper" class="php-email-form">
                            <div class="row">
                                <div class="col-md-12 mt-4 form-group">
                                    <h3 class="m-0"><span class="bi bi-filter"></span> {{__('offers.operators')}}</h3>
                                    <div class="custom-checkbox-group">
                                        @foreach($operators as $op)
                                            <label class="custom-checkbox">
                                                <input type="radio" name="operator" wire:model.change="operator" value="{{ $op->id }}">
                                                <span>{{ $op->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12 mt-2 form-group">
                                    <div class="custom-checkbox-group">
                                        <h3 class="m-0"><span class="bi bi-filter"></span> Comparek Score</h3>
                                        @foreach($scores as $score)
                                            <label for="{{ "score_{$score->value}" }}" class="custom-checkbox">
                                                <input id="{{ "score_{$score->value}" }}" type="radio" name="score" value="{{ $score->value }}" wire:model.change="score">
                                                <span>{{ $score->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                                {{--<div class="col-md-12 mt-2 form-group sorting mb-1">
                                    <div class="custom-checkbox-group">
                                        <h3 class="m-0"><span class="bi bi-filter"></span> {{ __('commons.sort') }}</h3>
                                        <label for="sort_note" class="custom-checkbox">
                                            <input id="sort_note" type="radio" name="sortBy" value="sort_note" wire:model.change="sortBy">
                                            <span>{{ __('commons.sort') }}</span>
                                        </label>
                                    </div>
                                </div>--}}
                                <div class="col-md-12 mt-2 form-group reset-filter-wrapper d-flex justify-content-center align-content-center">
                                    <button type="button" wire:click="resetFilter" class="reset-filter">{{ __('commons.reset-filter') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    @foreach($offers as $offer)
                        <div class="col-lg-12 col-md-12 row my-3 mobile-offer-row">
                            <div class="col-sm-1 col-md-2 col-lg-2 m-0 p-0 logo-n-name-wrapper">
                                <div class="offer-column offer-operator text-center">
                                    {{ $offer->name }} <br>
                                    <img src="{{ Storage::disk('public')->url($offer->operator->images->thumb_path) }}"
                                         alt="{{ $offer->operator->name }}"
                                         width="55" height="55">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7 col-lg-8 row telecom-scores">
                                <div class="scores col-12">
                                    <ul>
                                        @foreach($scoreCriterias as $name => $id)
                                            @php
                                            $note = $offer->scoreValues()->where('score_criteria_id', $id)?->first()?->value;
                                            @endphp
                                            <li class="my-2">
                                                {!! "<strong>{$name}</strong> : {$note}" !!}
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" aria-label="Segment one" style="width: {{$note*10}}%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-2 col-lg- telecom-score-badge">
                                <div class="offer-score">
                                    <x-comparek-score-badge :grade="$offer->currentScoreGrade()" size="medium"/>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
