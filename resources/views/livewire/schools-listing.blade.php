<section class="p-0">
    <div class="container">
        <div class="row justify-content-between gy-4">
            <div class="col-lg-12 school-filter-wrapper">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#schools-filters" type="button" role="tab" aria-controls="schools-filters" aria-selected="true">Filtres par l’établissement</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#programs-filter" type="button" role="tab" aria-controls="programs-filter" aria-selected="false">Filtres des programmes</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Filtres qualité</button>
                    </li>
                </ul>
                <div class="tab-content" id="filterTabsContent">
                    <div class="tab-pane fade show active" id="schools-filters" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="row">
                            <div class="col-2 my-4 form-group">
                                <h3><span class="bi bi-filter"></span> {{__('filters.cities')}}</h3>
                                <div class="custom-checkbox-group">
                                    <select name="city" class="form-select" wire:model.live="city">
                                        <option value=""> --- </option>
                                        @foreach(\App\Enums\SenegalCityEnum::cases() as $city)
                                            <option value="{{ $city->value }}">{{ $city->label() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-5 my-4 form-group">
                                {{--<h3><span class="bi bi-filter"></span> {{ __('filters.private_school') }}</h3>--}}
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="accept_foreign" wire:model.live="accept_foreign">
                                        <label class="form-check-label" for="accept_foreign">{{ __('schools.accept_foreign_students') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5 my-4 form-group">
                                {{--<h3><span class="bi bi-filter"></span> {{ __('filters.private_school') }}</h3>--}}
                                <div class="d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_private" id="is_private1" value="1" wire:model.live="is_private">
                                        <label class="form-check-label" for="is_private1">{{ __('schools.is_a_private') }}</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="is_private" id="is_private2" value="2" wire:model.live="is_private">
                                        <label class="form-check-label" for="is_private2">{{ __('schools.is_a_public') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 my-4 form-group">
                                <h3><span class="bi bi-filter"></span> {{ __('filters.accreditations') }}</h3>
                                <div class="d-flex justify-content-between">
                                    @foreach($accreditations as $id => $name)
                                        <div class="form-check">
                                            <input class="form-check-input" name="accreditations" type="checkbox" value="{{$id}}" id="{{ "accred{$id}" }}" wire:model.live="picked_accreds">
                                            <label class="form-check-label" for="{{ "accred{$id}" }}">{{ $name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="programs-filter" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">2</div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">3</div>
                </div>
            </div>
            <div class="col-lg-12" data-aos="fade-up">
                <div class="portfolio-description">
                    <p class="mb-0">
                        list here
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
