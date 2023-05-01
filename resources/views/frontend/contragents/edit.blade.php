@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    Редактирование контрагента
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.contragents.update", [$contragent->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="surname">{{ trans('cruds.contragent.fields.surname') }}</label>
                            <input class="form-control" type="text" name="surname" id="surname" value="{{ old('surname', $contragent->surname) }}" required>
                            @if($errors->has('surname'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('surname') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.surname_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.contragent.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $contragent->name) }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fathername">{{ trans('cruds.contragent.fields.fathername') }}</label>
                            <input class="form-control" type="text" name="fathername" id="fathername" value="{{ old('fathername', $contragent->fathername) }}">
                            @if($errors->has('fathername'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fathername') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.fathername_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="berthday">{{ trans('cruds.contragent.fields.berthday') }}</label>
                            <input class="form-control date" type="text" name="berthday" id="berthday" value="{{ old('berthday', $contragent->berthday) }}" required>
                            @if($errors->has('berthday'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('berthday') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.berthday_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.contragent.fields.gender') }}</label>
                            @foreach(App\Models\Contragent::GENDER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', $contragent->gender) === (string) $key ? 'checked' : '' }} required>
                                    <label for="gender_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('gender'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gender') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.gender_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="address">{{ trans('cruds.contragent.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $contragent->address) }}" required>
                            @if($errors->has('address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="telephone">{{ trans('cruds.contragent.fields.telephone') }}</label>
                            <input class="form-control" type="text" name="telephone" id="telephone" value="{{ old('telephone', $contragent->telephone) }}">
                            @if($errors->has('telephone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('telephone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.telephone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="snils">{{ trans('cruds.contragent.fields.snils') }}</label>
                            <input class="form-control" type="text" name="snils" id="snils" value="{{ old('snils', $contragent->snils) }}">
                            @if($errors->has('snils'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('snils') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.snils_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="insurance_id">{{ trans('cruds.contragent.fields.insurance') }}</label>
                            <select class="form-control select2" name="insurance_id" id="insurance_id" required>
                                @foreach($insurances as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('insurance_id') ? old('insurance_id') : $contragent->insurance->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('insurance'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('insurance') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.insurance_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="polis">{{ trans('cruds.contragent.fields.polis') }}</label>
                            <input class="form-control" type="text" name="polis" id="polis" value="{{ old('polis', $contragent->polis) }}" required>
                            @if($errors->has('polis'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('polis') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.polis_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="insertion_id">{{ trans('cruds.contragent.fields.insertion') }}</label>
                            <select class="form-control select2" name="insertion_id" id="insertion_id">
                                @foreach($insertions as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('insertion_id') ? old('insertion_id') : $contragent->insertion->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('insertion'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('insertion') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.insertion_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="spasport">{{ trans('cruds.contragent.fields.spasport') }}</label>
                            <input class="form-control" type="text" name="spasport" id="spasport" value="{{ old('spasport', $contragent->spasport) }}">
                            @if($errors->has('spasport'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('spasport') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.spasport_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="npasport">{{ trans('cruds.contragent.fields.npasport') }}</label>
                            <input class="form-control" type="text" name="npasport" id="npasport" value="{{ old('npasport', $contragent->npasport) }}">
                            @if($errors->has('npasport'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('npasport') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.npasport_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pasportvudan">{{ trans('cruds.contragent.fields.pasportvudan') }}</label>
                            <input class="form-control" type="text" name="pasportvudan" id="pasportvudan" value="{{ old('pasportvudan', $contragent->pasportvudan) }}">
                            @if($errors->has('pasportvudan'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pasportvudan') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.pasportvudan_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="datepasport">{{ trans('cruds.contragent.fields.datepasport') }}</label>
                            <input class="form-control date" type="text" name="datepasport" id="datepasport" value="{{ old('datepasport', $contragent->datepasport) }}">
                            @if($errors->has('datepasport'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('datepasport') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.datepasport_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="codepasport">{{ trans('cruds.contragent.fields.codepasport') }}</label>
                            <input class="form-control" type="text" name="codepasport" id="codepasport" value="{{ old('codepasport', $contragent->codepasport) }}">
                            @if($errors->has('codepasport'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('codepasport') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contragent.fields.codepasport_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
